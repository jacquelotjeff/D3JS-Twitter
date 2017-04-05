<?php

require 'config.php';


$jsonTweets = file_get_contents('data.json');
$tweets = json_decode($jsonTweets);

//var_dump($tweets);
$langs = [];
foreach($tweets->statuses as $tweet){
    //var_dump($tweet->metadata->iso_language_code);
    $langs[] = $tweet->metadata->iso_language_code;
}
//var_dump($langs);
$datas = array_count_values($langs);
unset($datas["fr"]);
//var_dump($datas);
var_dump(array_keys($datas));
$dataLabelCountries = json_encode(array_keys($datas));
var_dump(json_encode($dataLabelCountries));
?>





<!DOCTYPE html>
<head>
    <script
            src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
</head>
<body>
    <h1>Big data</h1>

    <h2>Les pays parlant le plus de baguette</h2>
    <div style="margin-left: 100px;width:500px; height:500px">
        <canvas id="myChart" width="40" height="40"></canvas>
    </div>
    <h2>Hashtags les plus utilisés dans les tweet parlant de baguette</h2>

    <h2>Popularité de la baguette dans le temps</h2>


    <script>

        var data = {
    labels: [
        "Red",
        "Blue",
        "Yellow"
    ],
            datasets: [
                {
                    data: [300, 50, 100],
                    backgroundColor: [
                    "#FF6384",
                    "#36A2EB",
                    "#FFCE56"
                ],
                    hoverBackgroundColor: [
                    "#FF6384",
                    "#36A2EB",
                    "#FFCE56"
                ]
                }]
        };
        // And for a doughnut chart
        var ctx = document.getElementById("myChart").getContext("2d");;
        ctx.canvas.width = 300;
        ctx.canvas.height = 300;
        var myDoughnutChart = new Chart(ctx, {
    type: 'doughnut',
            data: data,
            options: {
        animation:{
            animateScale:true
                }
    }
        });
    </script>
</body>
</html>