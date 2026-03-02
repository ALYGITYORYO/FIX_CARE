var options = {
  series: [{
    name: 'Sales',
    data: [120, 135, 150, 145, 160, 175, 190]
  }],
  chart: {
    height: 210,
    type: 'area',
    toolbar: { show: false },
    sparkline: { enabled: false },
  },
  colors: ["#3bcaca", "#3ce2a0", "#a6e65c", "#e6d146", "#e49c3f", "#e2613f"],
  dataLabels: { enabled: false },
  stroke: { curve: 'smooth', width: 3 },
  markers: {
    size: 5,
    colors: ['#fff'],
    strokeColors: ["#3bcaca", "#3ce2a0", "#a6e65c", "#e6d146", "#e49c3f", "#e2613f"],
    strokeWidth: 2,
    hover: { size: 7 }
  },
  yaxis: {
    show: true,
    title: { text: 'Count', style: { fontWeight: 600 } },
    labels: { show: true, minWidth: 19, maxWidth: 19, offsetX: -5 }
  },
  legend: {
    show: true,
    offsetY: 10,
    itemMargin: { horizontal: 10, vertical: 10 },
    fontWeight: 600
  },
  xaxis: {
    labels: { minHeight: 22, maxHeight: 22, show: true },
    lines: { show: false },
    categories: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
  },
  grid: {
    show: true,
    borderColor: "rgba(255, 255, 255, 0.3)",
    strokeDashArray: 4,
    padding: { left: 20, right: 20 }
  },
  fill: {
    type: 'gradient',
    gradient: {
      shade: 'light',
      type: "vertical",
      shadeIntensity: 0.2,
      gradientToColors: undefined,
      inverseColors: true,
      opacityFrom: 0.5,
      opacityTo: 0.1,
      stops: [0, 90, 100]
    }
  },
  tooltip: {
    y: {
      formatter: function (val) {
        return val;
      }
    },
    theme: 'dark',
    marker: { show: true }
  },
};

var chart = new ApexCharts(document.querySelector("#salesOverTimeChart"), options);
chart.render();
