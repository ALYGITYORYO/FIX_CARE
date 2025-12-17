// Fuel Consumption Graph
document.addEventListener("DOMContentLoaded", function () {
  var options = {
    series: [
      {
        name: "Fuel",
        data: [100, 200, 100, 300, 200, 500, 300],
      }
    ],
    chart: {
      toolbar: {
        show: false,
      },
      type: "bar",
      height: 200,
      stacked: true,
    },
    colors: [
      "#4584eb",
      "#92bbff",
      "#8FE6E4"],
    plotOptions: {
      bar: {
        horizontal: false,
        barHeight: "60%",
        columnWidth: "16%",
        borderRadius: [5],
        borderRadiusApplication: "end",
        borderRadiusWhenStacked: "all",
      },
    },
    dataLabels: {
      enabled: false,
    },
    legend: {
      show: false,
    },
    grid: {
      show: true,
      padding: {
        top: 0,
        bottom: 0,
        right: 10,
      },
      borderColor: "#dee5f3",
      xaxis: {
        lines: {
          show: false,
        },
      },
      yaxis: {
        lines: {
          show: true,
        },
      },
    },
    xaxis: {
      axisBorder: {
        show: false,
      },
      axisTicks: {
        show: false,
      },
      categories: [
        "Sun",
        "Mon",
        "Tue",
        "Wed",
        "Thu",
        "Fri",
        "Sat",
      ],
    },
    yaxis: {
      tickAmount: 4,
    },
    tooltip: {
      y: {
        formatter: function (val) {
          return val + 'gallon';
        },
      },
      theme: 'dark',
    },
  };
  var chart = new ApexCharts(document.querySelector("#fuel-consumption-chart"), options);
  chart.render();
});


// Expenses Tracking Graph
document.addEventListener("DOMContentLoaded", function () {
  var options = {
    series: [{
      name: "Expenses",
      data: [360, 280, 230]
    }],
    chart: {
      toolbar: {
        show: false,
      },
      type: 'bar',
      height: 200
    },
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: '60px',
        borderRadius: [5],
        borderRadiusApplication: "end",
        borderRadiusWhenStacked: "all"
      },
    },
    dataLabels: {
      enabled: true,
      formatter: function (val) {
        return "$" + val;
      },
      offsetY: -20,
      style: {
        fontSize: '12px',
        colors: ["#FFFFFF"]
      }
    },
    xaxis: {
      categories: ["KG-656-LS9", "VR-639-JS6", "HY-987-G66"],
    },
    fill: {
      opacity: 1
    },
    tooltip: {
      y: {
        formatter: function (val) {
          return "$" + val;
        }
      }
    }
  };
  var chart = new ApexCharts(document.querySelector("#expenses-tracking-chart"), options);
  chart.render();
});