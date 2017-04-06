<?php

function getMostOldTweet ($manager) {

    $options = [
        'limit' => 1,
        'sort' => ['id' => 1],
    ];

    $query = new MongoDB\Driver\Query([], $options);
    $cursor = $manager->executeQuery('db.tweets', $query);

    foreach ($cursor as $document) {
        return $document;
    }
}

/*
db.tweets.find().sort( { id: 1 } ).limit( 1 )
*/