document.addEventListener("DOMContentLoaded", function () {
  var options = {
    chart: {
      type: "bar",
      height: 300,
      toolbar: {
        show: false
      }
    },
    plotOptions: {
      bar: {
        endingShape: "rounded",
        startingShape: "rounded",
        distributed: true,
        columnWidth: "50%"
      }
    },
    dataLabels: {
      enabled: false
    },
    series: [
      {
        name: "Open Positions",
        data: [10, 15, 20, 25, 30],
      },
    ],
    grid: {
      borderColor: "rgba(255, 255, 255, 0.3)",
      strokeDashArray: 4
    },
    xaxis: {
      categories: [
        "Designer",
        "Frontend",
        "Backend",
        "Full Stack",
        "DevOps",
      ],
    },
    colors: ["#3bcaca", "#3ce2a0", "#a6e65c", "#e6d146", "#e49c3f", "#e2613f"],
    tooltip: {
      theme: "dark",
    },
  };

  var chart = new ApexCharts(
    document.querySelector("#topOpenPositions"),
    options
  );

  chart.render();
});