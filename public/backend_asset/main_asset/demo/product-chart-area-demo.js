// Plugin Result PieChart in Ajax ================== -->
google.charts.load("current", {
    packages: ["corechart"]
});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Product', 10],
        ['Category', 17],
        ['Sub-Category', 8],
        ['Brand', 14]
    ]);

    var options = {
        title: 'Product Position is given below - ',
        is3D: true,
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
    chart.draw(data, options);
}

