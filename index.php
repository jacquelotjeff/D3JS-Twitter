<?php

require 'config.php';


$jsonTweets = file_get_contents('data.json');
$tweets = json_decode($jsonTweets);

//var_dump($tweets);

include 'templates/index.html';