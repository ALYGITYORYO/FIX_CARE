var options = {
  chart: {
    height: 380,
    type: "line",
    toolbar: {
      show: false,
    },
  },
  dataLabels: {
    enabled: false,
  },
  stroke: {
    curve: "smooth",
    width: [0, 3, 5],
  },
  series: [{
    name: 'Deliveries',
    type: 'column',
    data: [23, 11, 22, 27, 13, 22, 37, 21, 44, 22, 30]
  }, {
    name: 'Returns',
    type: 'area',
    data: [44, 55, 41, 67, 22, 43, 21, 41, 56, 27, 43]
  }, {
    name: 'In Transit',
    type: 'line',
    data: [30, 25, 36, 30, 45, 35, 64, 52, 59, 36, 39]
  }],
  plotOptions: {
    bar: {
      columnWidth: '30',
      borderRadius: 6,
      colors: {
        backgroundBarColors: ['transparent'],
      },
    }
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
  colors: ["#4584eb", "#8FE6E4", "#4ed582"],
};

var chart = new ApexCharts(document.querySelector("#deliveryPerformance"), options);

chart.render();
