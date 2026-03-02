var options = {
  series: [
    {
      name: "Tickets",
      data: [200, 330, 548, 740, 880, 1100],
    },
  ],
  chart: {
    type: "bar",
    height: 300,
    toolbar: {
      show: false,
    },
  },
  dataLabels: {
    enabled: false,
  },
  plotOptions: {
    bar: {
      borderRadius: 0,
      horizontal: true,
      distributed: true,
      barHeight: "80%",
      isFunnel: true,
    },
  },
  colors: [
    "#26be77", "#edae49", "#f39147", "#d1495b", "#00798c", "#30638e"
  ],
  dataLabels: {
    enabled: true,
    formatter: function (val, opt) {
      return opt.w.globals.labels[opt.dataPointIndex];
    },
    dropShadow: {
      enabled: true,
    },
  },
  xaxis: {
    categories: ["Closed", "Hold", "Resolved", "Waiting", "On Going", "Total"],
  },
  legend: {
    show: true,
  },
  tooltip: {
    theme: "dark",
  },
};

var chart = new ApexCharts(document.querySelector("#pyramid"), options);
chart.render();
