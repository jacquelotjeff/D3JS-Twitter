<?php

function getHashtags ($manager) {

    $cmd = new MongoDB\Driver\Command([
        // build the 'aggregate' command
        'aggregate' => 'tweets', // specify the collection name
        'pipeline' => [
            ['$unwind' => '$hashtags'],
            ['$group' => ['_id' => '$hashtags', 'count' => ['$sum' => 1]]],
            ['$match' => ['count' => ['$gte' => 10]]],
            ['$sort' => ['count' => -1]],
        ],
    ]);

    $cursor = $manager->executeCommand('db', $cmd); // retrieve the results

    foreach ($cursor as $document) {
        $results = $document->result;
    }
    return $results;

}