document.addEventListener("DOMContentLoaded", function () {
  var options = {
    chart: {
      type: 'area',
      height: 300,
      toolbar: { show: false }
    },
    colors: ['#4f8aff'],
    dataLabels: { enabled: false },
    stroke: {
      curve: 'smooth',
      width: 3
    },
    markers: {
      size: 5,
      colors: ['#fff'],
      strokeColors: '#4f8aff',
      strokeWidth: 2,
      hover: { size: 7 }
    },
    series: [{
      name: 'Revenue',
      data: [12000, 14500, 13800, 15500, 17000, 16200, 18000, 21000, 19500, 22000, 24500, 26000]
    }],
    xaxis: {
      categories: [
        'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
        'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
      ],
      axisBorder: { show: false },
      axisTicks: { show: false },
    },
    yaxis: {
      labels: {
        formatter: function (val) {
          return "$" + val.toLocaleString();
        },
      }
    },
    grid: {
      borderColor: "rgba(255, 255, 255, 0.3)",
      strokeDashArray: 4
    },
    fill: {
      type: 'gradient',
      gradient: {
        shade: 'light',
        type: "vertical",
        shadeIntensity: 0.5,
        gradientToColors: ['#b3d1ff'],
        opacityFrom: 0.7,
        opacityTo: 0.1,
        stops: [0, 100]
      }
    },
    tooltip: {
      theme: 'dark',
      y: {
        formatter: function (val) {
          return "$" + val.toLocaleString();
        }
      }
    },
  };

  var chart = new ApexCharts(document.querySelector("#monthlyRevenueChart"), options);
  chart.render();
});