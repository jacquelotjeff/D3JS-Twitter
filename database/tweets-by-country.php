<?php

function getTweetsByCountries ($manager) {

    $cmd = new MongoDB\Driver\Command([
        // build the 'aggregate' command
        'aggregate' => 'tweets', // specify the collection name
        'pipeline' => [
            ['$group' => ['_id' => '$lang', 'count' => ['$sum' => 1]]],
        ],
    ]);

    $cursor = $manager->executeCommand('db', $cmd); // retrieve the results

    foreach ($cursor as $document) {
        $results = $document->result;
    }

    return $results;

}
