var options = {
  chart: {
    type: "bar",
    height: 256,
    toolbar: {
      show: false
    }
  },
  plotOptions: {
    bar: {
      horizontal: true,
      endingShape: "rounded",
      startingShape: "rounded",
      barHeight: "50%",
      distributed: true,
      columnWidth: "50%"
    }
  },
  dataLabels: {
    enabled: false
  },
  series: [{
    name: "Employee Experience",
    data: [4, 3, 5, 2, 4]
  }],
  xaxis: {
    categories: ["Engineering", "Sales", "HR", "Marketing", "Finance"]
  },
  colors: ["#3bcaca", "#3ce2a0", "#a6e65c", "#e6d146", "#e49c3f", "#e2613f"],
  grid: {
    borderColor: "rgba(255, 255, 255, 0.3)",
    strokeDashArray: 4
  },
  tooltip: {
    theme: "dark",
    y: {
      formatter: function (val) {
        return val + " years";
      }
    }
  },
};

var chart = new ApexCharts(document.querySelector("#employeeExperience"), options);
chart.render();
