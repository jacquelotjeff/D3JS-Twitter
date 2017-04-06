<?php

function getMostRetweeted ($manager)
{

    $cmd = new MongoDB\Driver\Command([
        // build the 'aggregate' command
        'aggregate' => 'tweets', // specify the collection name
        'pipeline'  => [
            ['$sort' => ['retweet_count' => -1]],
            ['$limit' => 1]
        ],
    ]);

    $cursor = $manager->executeCommand('db', $cmd); // retrieve the results

    foreach ($cursor as $document) {
        $results = $document->result;
    }

    return $results;
}



//db.tweets.find().sort({"retweet_count" : -1}).limit(2)