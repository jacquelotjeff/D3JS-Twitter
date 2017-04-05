<?php

include('database/connection.php');

$query   = new \MongoDB\Driver\Query([]);
$results = $manager->executeQuery('db.tweets', $query);

foreach ($results as $result) {
    var_dump($result);
}

die('aaa');

