document.addEventListener("DOMContentLoaded", function () {
  if (typeof ApexCharts !== "undefined") {
    var options = {
      chart: {
        type: 'bar',
        height: 300,
        toolbar: { show: false }
      },
      series: [{
        name: 'Expenses',
        data: [12000, 15000, 11000, 18000, 14000, 17000, 16000, 15500, 14500, 13000, 12500, 13500]
      }],
      xaxis: {
        categories: [
          'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
          'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
        ]
      },
      colors: ['#ff5b5c'],
      grid: {
        borderColor: "rgba(255, 255, 255, 0.3)",
        strokeDashArray: 4
      },
      plotOptions: {
        bar: {
          borderRadius: 4,
          columnWidth: '45%'
        }
      },
      dataLabels: { enabled: false },
      yaxis: {
        labels: {
          formatter: function (val) {
            return '$' + val.toLocaleString();
          }
        }
      },
      tooltip: {
        theme: 'dark'
      }
    };
    var chart = new ApexCharts(document.querySelector("#monthlyExpensesChart"), options);
    chart.render();
  }
});