// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun","Jul","Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [{
      label: "Sales",
      backgroundColor: [
        // 'rgba(255, 99, 132, 0.2)',
        // 'rgba(255, 159, 64, 0.2)',
        // 'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(75, 192, 192, 0.2)'
        // 'rgba(54, 162, 235, 0.2)',
        // 'rgba(153, 102, 255, 0.2)',
        // 'rgba(201, 203, 207, 0.2)'
      ],
      borderColor: [
        // 'rgb(255, 99, 132)',
        // 'rgb(255, 159, 64)',
        // 'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(75, 192, 192)',
        'rgb(75, 192, 192)',
        'rgb(75, 192, 192)',
        'rgb(75, 192, 192)',
        'rgb(75, 192, 192)',
        'rgb(75, 192, 192)',
        'rgb(75, 192, 192)',
        'rgb(75, 192, 192)',
        'rgb(75, 192, 192)',
        'rgb(75, 192, 192)',
        'rgb(75, 192, 192)'
        // 'rgb(54, 162, 235)',
        // 'rgb(153, 102, 255)',
        // 'rgb(201, 203, 207)'
      ],
      borderWidth: 0.9,
      data: [50000, 55000, 16251, 67841, 30821, 24984,95000,47000,50000,80000,20000,32000,50000,100000],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false
        },
        grid: {
          offset: true
        },
        ticks: {
          maxTicksLimit: 12
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 100000,
          maxTicksLimit: 7,
          label:"Sales"
        },
        beginAtZero: true,
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: true
    }
  }
});
