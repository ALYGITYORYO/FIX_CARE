var options = {
  chart: {
    width: 360,
    type: "donut",
  },
  labels: ["Male", "Female", "Non-Binary", "Prefer Not to Say", "Other"],
  series: [45, 25, 15, 10, 5],
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
var chart = new ApexCharts(document.querySelector("#genderRatio"), options);
chart.render();