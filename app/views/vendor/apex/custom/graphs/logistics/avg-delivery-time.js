document.addEventListener("DOMContentLoaded", function () {
  var options = {
    chart: {
      type: 'line',
      height: 310,
      toolbar: {
        show: false
      }
    },
    series: [{
      name: 'Average Delivery Time',
      data: [2.5, 3.0, 2.8, 3.2, 2.9, 3.1, 2.7]
    }],
    xaxis: {
      categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
    },
    colors: ['#00E396'],
    stroke: {
      width: 3
    },
    markers: {
      size: 4,
      colors: ['#00E396'],
      strokeColors: '#fff',
      strokeWidth: 2
    },
    grid: {
      borderColor: "#dfd6ff",
      strokeDashArray: 5,
      xaxis: {
        lines: {
          show: true,
        },
      },
      yaxis: {
        lines: {
          show: false,
        },
      },
    },
    tooltip: {
      theme: 'light'
    }
  };

  var chart = new ApexCharts(document.querySelector("#averageDeliveryTime"), options);
  chart.render();
});