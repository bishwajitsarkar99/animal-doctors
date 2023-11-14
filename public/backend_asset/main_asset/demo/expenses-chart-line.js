// const xValues = [50,60,70,80,90,100,110,120,130,140,150];
const yValues = [70000,80000,88000,55000,60000,65000,100000,75000,56000,49000,15000,95000,100000];

new Chart("myChartexp", {
  type: "line",
  data: {
    labels: ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
    datasets: [{
      label: "Expenses",
      fill: false,
      lineTension: 0,
      backgroundColor: "red",
      borderColor: "rgba(255, 99, 132, 0.2)",
      // borderColor: "rgba(0,0,255,0.1)",
      data: yValues
    }]
  },
  options: {
    legend: {display: true},
    scales: {
      yAxes: [{ticks: {min: 0, max:100000}}],
    },
    gridlines:{
      display:false
    }
  }
});
