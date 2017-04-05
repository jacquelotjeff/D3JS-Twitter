<?php

require 'config.php';


$jsonTweets = file_get_contents('data.json');
$tweets = json_decode($jsonTweets);
?>





<!DOCTYPE html>
<head>
    <script
            src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script type="text/javascript" src="js/tagcloud.js"></script>
</head>
<body>
    <h1>Big data</h1>

    <h2>Sujets entourant Paris</h2>
    <div style="margin-left: 100px;width:500px; height:500px">
        <canvas id="tagCloud" width="400" height="400"></canvas>
    </div>
    <h2>Les pays parlant le plus de baguette</h2>
    <div style="margin-left: 100px;width:500px; height:500px">
        <canvas id="byCountry" width="40" height="40"></canvas>
    </div>
    <h2>Le plus retweeté</h2>
    <div style="margin-left: 100px;width:500px; height:500px">
        <canvas id="mostRetweeted" width="40" height="40"></canvas>
    </div>
    <h2>Popularité de la baguette dans le temps</h2>
    <div style="width: 700px; height: 700px; position: absolute;">
        <canvas id="baguettesOnTime"></canvas>
    </div>

    <script src="/html/web/baguettes-on-time.js" charset="UTF-8"></script>
</body>
</html>