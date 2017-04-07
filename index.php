<?php

require 'config.php';

$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

require "oauth.php";

include('database/hashtags.php');
include('database/tweets-by-country.php');
include('database/tweets-by-day.php');
include('database/tweets-by-hours.php');
include('database/count-tweets.php');
include('database/most-retweeted.php');
include('database/most-recent-tweet.php');
include('database/top-tweeters.php');

$tweetsByCountries = getTweetsByCountries($manager);
$tweetsOnTime      = getTweetsOnTime($manager);
$tweetsByHour      = getTweetsByHours($manager);
$hashtags          = getHashtags($manager);
$countTweets       = getCountTweets($manager);
$mostRetweeted     = getMostRetweeted($manager);
$mostRecentTweet   = getMostRecentTweet($manager);
$topTweeters       = getTopTweeters($manager);
?>

<?php
    include 'common/header.php';
?>
        <h1>Big data</h1>
        <h2>Sujets entourant <?php echo $params['subject'] ?></h2>
        <div style="margin-left: 100px;width:500px; height:500px">
            <canvas id="tagCloud" width="400" height="400"></canvas>
        </div>

        <h2>Répartition par langue des tweets concernants <?php echo $params['subject'] ?></h2>
        <div style="margin-left: 100px;width:500px; height:500px">
            <canvas id="byCountry" width="400" height="400"></canvas>
            <div class="clearfix"></div>
        </div>

        <h2>Le plus retweeté</h2>
        <div style="margin-left: 100px;width:500px; height:500px">
            <div style="box-shadow:0px 1px 5px -1px #000; height:auto; width:500px; margin:100px;">
                <?php $date = $mostRetweeted[0]->created_at; ?>
                <p style="padding:10px;float:left"><?php echo date("d/m/Y", intval($date->toDateTime()->format('Uu')) /
                        1000000); ?></p>
                <p style="padding:10px;float:right">Retweeté <span style="font-size:16px;"><?php echo
                        $mostRetweeted[0]->retweet_count; ?></span> fois</p>
                <p style="padding:10px;clear:both"><?php echo $mostRetweeted[0]->text; ?></p>
            </div>
        </div>

        <h2>Popularité de <?php echo $params['subject']; ?> dans le temps (Par jour)</h2>
        <div style="width: 700px; height: 700px;">
            <canvas id="tweetsOnTime" width="400" height="400"></canvas>
            <div class="clearfix"></div>
        </<div>

        <h2>Popularité de <?php echo $params['subject']; ?> dans le temps (Par heure)</h2>
        <div style="width: 700px; height: 700px;">
            <canvas id="tweetsByHour" width="400" height="400"></canvas>
            <div class="clearfix"></div>
        </div>

    <h2>Les utilisateurs parlant le plus de <?php echo $params['subject'] ?></h2>
    <div style="margin-left: 100px;width:500px; height:500px">
        <canvas id="topTweeters" width="400" height="400"></canvas>
        <div class="clearfix"></div>
    </div>

<?php
include 'common/footer.php';
?>