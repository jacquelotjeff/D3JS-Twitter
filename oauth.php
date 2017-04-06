<?php

use GuzzleHttp\Client;
use GuzzleHttp\Subscriber\Oauth\Oauth1;
use MongoDB\BSON\UTCDateTime;

$client = new Client([
    'base_url' => 'https://api.twitter.com',
    'defaults' => ['auth' => 'oauth'],
]);

$json  = file_get_contents('twitter.conf.json');
$stack = \GuzzleHttp\HandlerStack::create();

$authData   = json_decode($json, true);
$middleware = new Oauth1($authData);

$stack->push($middleware);

$client = new Client([
    'base_uri' => 'https://api.twitter.com/1.1/',
    'handler'  => $stack,
]);

/*
 * Executing a GET request on the timeline service, pass the result to the json parser
 */
$toSearch  = urlencode($params['subject']);
$maxTweets = $params['total_tweets'];

$url = 'search/tweets.json?count='.$maxTweets.'&q='.$toSearch;

include('database/most-old-tweet.php');
$mostOldTweet = getMostOldTweet($manager);

if ($mostOldTweet !== null) {
    $url .= '&max_id='.$mostOldTweet->id;
}

$res = $client->get($url, ['auth' => 'oauth']);

$bulk         = new \MongoDB\Driver\BulkWrite(['ordered' => true]);
$writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);

$response = $res->getBody()->getContents();
$results  = json_decode($response, true);

foreach ($results['statuses'] as $result) {

    $datetime  = new DateTime($result['created_at']);
    $timestamp = $datetime->getTimestamp();
    $bsonDate  = new UTCDateTime($timestamp * 1000);

    $tweet = [
        'id'            => $result['id'],
        'lang'          => $result['lang'],
        'hashtags'      => $result['entities']['hashtags'],
        'created_at'    => $bsonDate,
        'text'          => $result['text'],
        'retweet_count' => $result['retweet_count'],
    ];

    $bulk->insert($tweet);
}

try {
    $result = $manager->executeBulkWrite('db.tweets', $bulk, $writeConcern);
} catch (\Exception $e) {
    var_dump($e);
    die;
}

