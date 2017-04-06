var ctx = document.getElementById("tweetsByHour");

labels = tweetsOnTime.map(function (item, index) {
    return item._id.tweeted_at_day + "/" + item._id.tweeted_at_month + " " + item._id.tweeted_at_hour + "h";
});

counts = tweetsOnTime.map(function (item, index) {
    return item.count;
});

var data = {
    labels: labels,
    datasets: [
        {
            label: "Popularité de "+ subject +" dans le temps (Par heure)",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "rgba(75,192,192,0.4)",
            borderColor: "rgba(75,192,192,1)",
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'miter',
            pointBorderColor: "rgba(75,192,192,1)",
            pointBackgroundColor: "#fff",
            pointBorderWidth: 1,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(75,192,192,1)",
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointHoverBorderWidth: 2,
            pointRadius: 1,
            pointHitRadius: 10,
            data: counts,
            spanGaps: false,
        }
    ]
};

var baguettesOnTimeline = new Chart(ctx, {
    type: 'line',
    data: data
});