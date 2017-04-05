<?php

$jsonTweets = file_get_contents('data.json');
$tweets = json_decode($jsonTweets);

echo "<pre>";
var_dump($tweets);
echo "</pre>";

