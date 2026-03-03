var options = {
  chart: {
    height: 380,
    type: 'area',
    toolbar: {
      show: false,
    },
  },
  dataLabels: {
    enabled: false
  },
  stroke: {
    curve: 'smooth',
    width: 3
  },
  series: [{
    name: 'Folders',
    data: [72, 85, 95, 88, 102, 97, 110, 105, 120, 115, 130, 125]
  }, {
    name: 'Documents',
    data: [65, 78, 88, 82, 95, 90, 100, 98, 110, 108, 120, 118]
  }],
  grid: {
    borderColor: "rgba(255, 255, 255, 0.3)",
    strokeDashArray: 4,
    xaxis: {
      lines: {
        show: true
      }
    },
    yaxis: {
      lines: {
        show: false,
      }
    },
    padding: {
      top: 0,
      right: 0,
      bottom: 10,
      left: 10
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
    }
  },
  colors: ["#4181d8", "#73ca78"],
  markers: {
    size: 0,
    opacity: 0.1,
    colors: ["#4181d8", "#73ca78"],
    strokeColor: "#ffffff",
    strokeWidth: 2,
    hover: {
      size: 7,
    }
  },
  tooltip: {
    theme: 'dark'
  }
}

var chart = new ApexCharts(
  document.querySelector("#statistics"),
  options
);

chart.render();