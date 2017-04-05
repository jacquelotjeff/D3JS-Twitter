console.log(tweetsByCountry);

labels = tweetsByCountry.map(function (item, index) {
    return item._id;
});

counts = tweetsByCountry.map(function (item, index) {
    return item.count;
});

// Récupération du bon nombre de clés couleurs.
colorsKey = Object.keys(Colors.names);
colorsKey = colorsKey.slice(0, tweetsByCountry.length);

colors = [];
colorsKey.forEach(function(colorKey){
    colors.push(Colors.names[colorKey]);
});

var data = {
    labels: labels,
    datasets: [
        {
            data: counts,
            backgroundColor: colors,
            hoverBackgroundColor: colors
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