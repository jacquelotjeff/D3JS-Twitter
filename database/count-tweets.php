<?php

function getCountTweets ($manager) {

    $cmd = new MongoDB\Driver\Command([
        // build the 'count' command
        'count' => 'tweets'
    ]);

    $cursor = $manager->executeCommand('db', $cmd); // retrieve the results

    foreach ($cursor as $document) {
        return $document->n;
    }
}

/*
db.tweets.count()
*/