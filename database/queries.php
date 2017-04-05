<?php


include('database/connection.php');


$query   = new \MongoDB\Driver\Query(['aggregate'], [
    'group' => [
        '_id' => 'lang',
        'count' => [
            'sum' => '1'
        ]
    ]
]);
$results = $manager->executeQuery('db.tweets', $query);

foreach ($results as $result) {
    var_dump($result);
}


//
//db.tweets.aggregate([
//    {"$group" : {_id:"$lang", count:{$sum:1}}}
//])

?>