const xValues = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];

new Chart("myOrder", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{ 
      label: "Orders",
      data: [500,8000,2000,3000,8000,4000,12000,1600,7500,5500,1800,11000],
      borderColor: "darkblue",
      fill: false
    }, { 
      label: "Pending",
      data: [300,700,2000,5000,6000,4000,2000,1000,200,100,6000,10000],
      borderColor: "orange",
      fill: false
    }, { 
      label: "Complete",
      data: [1600,1700,1700,1900,2000,2700,4000,5000,6000,7000,10000,12000],
      borderColor: "darkgreen",
      fill: false
    },{ 
      label: "Reject",
      data: [860,1140,1060,1060,1070,1110,1330,2800,8500,2478,0,4500],
      borderColor: "orangered",
      fill: false
    }]
  },
  options: {
    legend: {display: true},
    gridLines: {
      display: true
    }
  }
});
