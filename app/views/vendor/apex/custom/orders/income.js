var options = {
  series: [
    {
      name: "2024",
      data: [1000, 2000, 1000, 3000, 2000, 5000, 3000],
    },
    {
      name: "2023",
      data: [-2000, -1000, -2000, -1000, -4000, -2000, -1000],
    },
  ],
  chart: {
    toolbar: {
      show: !1,
    },
    type: "bar",
    height: 407,
    stacked: true,
  },
  colors: [
    "#3bcaca", "#3ce2a0", "#a6e65c", "#e6d146", "#e49c3f", "#e2613f"],
  plotOptions: {
    bar: {
      horizontal: false,
      columnWidth: "40%",
      borderRadius: [8],
      borderRadiusApplication: "end",
      borderRadiusWhenStacked: "all",
    },
  },
  stroke: {
    show: true,
    width: 5,
    colors: ["#3bcaca", "#3ce2a0", "#a6e65c", "#e6d146", "#e49c3f", "#e2613f"]
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
    borderColor: "rgba(255, 255, 255, 0.3)",
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
    min: -5000,
    max: 5000,
  },
  tooltip: {
    y: {
      formatter: function (val) {
        return '$' + val + '' + 'k';
      },
    },
    theme: 'dark',
  },
};

var chart = new ApexCharts(document.querySelector("#income"), options);

chart.render();