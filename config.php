<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php';

$contentParams = file_get_contents('config/params.json');
$params        = json_decode($contentParams, true);

$nbTweets = $params['total_tweets'];
$subject  = $params['subject'];

?>
