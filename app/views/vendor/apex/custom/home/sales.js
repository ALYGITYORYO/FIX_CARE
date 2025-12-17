var options = {
  chart: {
    height: 380,
    type: "area",
    toolbar: {
      show: false,
    },
  },
  dataLabels: {
    enabled: false,
  },
  stroke: {
    curve: "smooth",
    width: [2, 1],
  },
  series: [{
    name: 'Visitors',
    data: [20, 20, 25, 25, 20, 20, 35, 35, 20, 20, 30, 30]
  },
  {
    name: 'Sales',
    data: [15, 15, 20, 20, 15, 15, 25, 25, 15, 15, 25, 25]
  }
  ],
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
  xaxis: {
    categories: [
      "Jan",
      "Feb",
      "Mar",
      "Apr",
      "May",
      "Jun",
      "Jul",
      "Aug",
      "Sep",
      "Oct",
      "Nov",
      "Dec",
    ],
  },
  yaxis: {
    labels: {
      show: false,
    },
  },
  tooltip: {
    y: {
      formatter: function (val) {
        return val + "k";
      },
    },
    theme: "dark",
  },
  colors: ["#097ce0", "#8c44aa"],
};

var chart = new ApexCharts(document.querySelector("#yearlySales"), options);

chart.render();
