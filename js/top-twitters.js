var data = {
    labels: [
        "@OnlyVocal",
        "@Birthpath9",
        "@RadDragons",
        "@larryareathome",
        "@thesoundpIug"
    ],
    datasets: [
        {
            data: [36, 25, 18, 14, 14],
            backgroundColor: [
                "#FF6384",
                "#36A2EB",
                "#FFCE56",
                "#FF3300",
                "#0023B1"
            ],
            hoverBackgroundColor: [
                "#FF6384",
                "#36A2EB",
                "#FFCE56",
                "#FF3300",
                "#0023B1"
            ]
        }]
};

var ctx = document.getElementById("topTweeters").getContext("2d");
ctx.canvas.width = 300;
ctx.canvas.height = 300;

var myPieChart = new Chart(ctx,{
    type: 'pie',
    data: data,
});

