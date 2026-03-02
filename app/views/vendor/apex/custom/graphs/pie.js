var options = {
  chart: {
    width: 360,
    type: "pie",
  },
  labels: ["Team A", "Team B", "Team C", "Team D", "Team E"],
  series: [20, 20, 20, 20, 20],
  legend: {
    position: "bottom",
  },
  dataLabels: {
    enabled: false,
  },
  stroke: {
    width: 0,
  },
  colors: ["#3bcaca", "#3ce2a0", "#a6e65c", "#e6d146", "#e49c3f", "#e2613f"],
};
var chart = new ApexCharts(document.querySelector("#pie"), options);
chart.render();
