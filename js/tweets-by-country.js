console.log(tweetsByCountry);

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
var ctx = document.getElementById("byCountry").getContext("2d");
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