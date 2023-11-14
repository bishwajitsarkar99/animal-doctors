// google.charts.load('current', {'packages':['table']});
// google.charts.setOnLoadCallback(drawTable);

// function drawTable() {
//   var data = new google.visualization.DataTable();
//   data.addColumn('string', 'Name');
//   data.addColumn('number', 'Salary');
//   data.addColumn('boolean', 'Full Time Employee');
//   data.addRows([
//     ['Mike',  {v: 10000, f: '$10,000'}, true],
//     ['Jim',   {v:8000,   f: '$8,000'},  false],
//     ['Alice', {v: 12500, f: '$12,500'}, true],
//     ['Bob',   {v: 7000,  f: '$7,000'},  true]
//   ]);

//   var table = new google.visualization.Table(document.getElementById('table_div'));

//   table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
// }

// google.charts.load('current', {'packages':['bar']});
// google.charts.setOnLoadCallback(drawChart);

// function drawChart() {
//   var data = google.visualization.arrayToDataTable([
//     ['Year', 'Sales', 'Expenses', 'Profit'],
//     ['2014', 1000, 400, 200],

//   ]);

//   var options = {
//     chart: {
//       title: 'Company Performance',
//       subtitle: 'Sales, Expenses, and Profit: 2014-2017',
//     },
//     bars: 'horizontal', // Required for Material Bar Charts.
//     hAxis: {format: 'decimal'},
//     height: 187,
//     colors: ['#1b9e77', '#d95f02', '#7570b3']
//   };

//   var chart = new google.charts.Bar(document.getElementById('table_div'));

//   chart.draw(data, google.charts.Bar.convertOptions(options));

//   var btns = document.getElementById('btn-group');

//   btns.onclick = function (e) {

//     if (e.target.tagName === 'BUTTON') {
//       options.hAxis.format = e.target.id === 'none' ? '' : e.target.id;
//       chart.draw(data, google.charts.Bar.convertOptions(options));
//     }
//   }
// }