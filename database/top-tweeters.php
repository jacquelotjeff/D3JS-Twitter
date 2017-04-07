<?php

function getTopTweeters ($manager)
{

    $cmd = new MongoDB\Driver\Command([
        // build the 'aggregate' command
        'aggregate' => 'tweets', // specify the collection name
        'pipeline'  => [
            //['$match' => ['text' => new \MongoDB\BSON\Regex('/.*@(?i)G[a-b][^\s]+/')]],
            //['$group' => ['_id' => null, 'views' => ['$sum' => 1]]],
            //['$sort' => ['count' => -1]],
            //['$limit' => 5]
        ],
    ]);

    $cursor = $manager->executeCommand('db', $cmd); // retrieve the results

    foreach ($cursor as $document) {
        $results = $document->result;
    }

    return $results;
}



//db.tweets.find().sort({"retweet_count" : -1}).limit(2)