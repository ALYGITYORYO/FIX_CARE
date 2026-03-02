var options = {
  series: [40, 50, 60, 70, 80],
  chart: {
    height: 240,
    type: "radialBar",
  },
  plotOptions: {
    radialBar: {
      track: {
        show: true,
        background: "rgba(0, 0, 0, 0.1)",
        strokeWidth: "100%",
        margin: 2,
        dropShadow: {
          enabled: false
        }
      },
      dataLabels: {
        name: {
          fontSize: "18px",
        },
        value: {
          fontSize: "24px",
          fontWeight: "bold"
        },
        total: {
          show: true,
          label: "GB",
          formatter: function (w) {
            return 190;
          },
        },
      },
    },
  },
  labels: ["Doc", "Files", "PDF", "Images", "Videos"],
  colors: [
    "#3bcaca", "#3ce2a0", "#a6e65c", "#e6d146", "#e49c3f", "#e2613f"
  ],
};

var chart = new ApexCharts(document.querySelector("#storage"), options);
chart.render();
