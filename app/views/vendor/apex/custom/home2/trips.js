var options = {
  chart: {
    height: 240,
    type: "bar",
    toolbar: {
      show: false,
    },
  },
  plotOptions: {
    bar: {
      columnWidth: "60%",
      borderRadius: 5,
      distributed: true,
      dataLabels: {
        position: "top",
      },
    },
  },
  series: [
    {
      name: "Trips",
      data: [80, 30],
    },
  ],
  legend: {
    show: false,
  },
  xaxis: {
    categories: ["Completed", "Cancelled",],
    axisBorder: {
      show: false,
    },
    yaxis: {
      show: false,
    },
    tooltip: {
      enabled: true,
    },
    labels: {
      show: true,
    },
  },
  yaxis: {
    show: false,
  },
  grid: {
    show: false,
    padding: {
      top: 0,
      right: 0,
      bottom: -10,
      left: 10,
    },
  },
  tooltip: {
    y: {
      formatter: function (val) {
        return val;
      },
    },
    theme: "dark",
  },
  colors: ["#F9537B", "#00BBFF"],
};
var chart = new ApexCharts(document.querySelector("#driverGraph"), options);
chart.render();