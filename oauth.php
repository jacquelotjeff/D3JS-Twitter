<?php

use GuzzleHttp\Client;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

$client = new Client(
    ['base_url' => 'https://api.twitter.com',
     'defaults' => ['auth' => 'oauth'],
    ]);
$json   = file_get_contents('twitter.conf.json');

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

$toSearch = urlencode('imagine Dragons');
$maxTweets = 100;

//$res = $client->get('search/tweets.json?count='.$maxTweets.'&q='.$toSearch, ['auth' => 'oauth']);
//var_dump($res->getBody()->getContents()); die;
//print_r($res); //we have the parsed response in an array!