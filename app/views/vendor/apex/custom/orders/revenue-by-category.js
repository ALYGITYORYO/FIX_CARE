var options = {
  chart: {
    height: 210,
    type: 'bar',
    toolbar: { show: false }
  },
  colors: ["#3bcaca", "#3ce2a0", "#a6e65c", "#e6d146", "#e49c3f", "#e2613f"],
  plotOptions: {
    bar: {
      horizontal: false,
      columnWidth: '70%',
      endingShape: 'rounded'
    }
  },
  dataLabels: { enabled: false },
  grid: {
    borderColor: "rgba(255, 255, 255, 0.3)",
    strokeDashArray: 4
  },
  series: [
    {
      name: 'Beauty',
      data: [44, 55, 41, 67, 22, 43, 21]
    },
    {
      name: 'Food',
      data: [13, 23, 20, 8, 13, 27, 15]
    },
    {
      name: 'Living',
      data: [11, 17, 15, 15, 21, 14, 10]
    },
    {
      name: 'Sports',
      data: [21, 7, 25, 13, 22, 8, 24]
    },
    {
      name: 'Toys',
      data: [9, 5, 14, 11, 12, 9, 8]
    }
  ],
  xaxis: {
    categories: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
  },
  tooltip: {
    theme: "dark",
    shared: true,
    intersect: false,
    y: {
      formatter: function (val) {
        return '$' + val + ' revenue';
      }
    }
  }
};

var chart = new ApexCharts(document.querySelector("#RevenueByCategory"), options);
chart.render();