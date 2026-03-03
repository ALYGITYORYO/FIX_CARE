var options = {
  chart: {
    height: 280,
    type: "line",
    zoom: {
      enabled: false
    },
    toolbar: {
      show: false
    }
  },
  colors: ["#3bcaca", "#3ce2a0", "#a6e65c", "#e6d146", "#e49c3f", "#e2613f"],
  dataLabels: {
    enabled: false
  },
  stroke: {
    curve: "smooth",
    width: 2
  },
  series: [{
    name: "CTR",
    data: [5, 10, 15, 20, 25]
  }],
  grid: {
    borderColor: "rgba(255, 255, 255, 0.3)",
    strokeDashArray: 4
  },
  xaxis: {
    categories: ["Jan", "Feb", "Mar", "Apr", "May"],
    title: {
      text: "Months",
      style: { fontWeight: 500, color: "#3bcaca" }
    },
  },
  yaxis: {
    title: {
      text: "CTR (%)",
      style: { fontWeight: 500, color: "#3ce2a0" }
    }
  },
  tooltip: {
    theme: "dark",
    shared: true,
    intersect: false
  }
};

var emailCampaignChart = new ApexCharts(document.querySelector("#emailCampaign"), options);
emailCampaignChart.render();