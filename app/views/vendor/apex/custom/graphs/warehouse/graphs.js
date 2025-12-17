// Example ApexCharts configurations for each chart
const options1 = {
  chart: {
    type: 'line',
    height: 100,
    sparkline: { enabled: true }
  },
  series: [{ name: 'Inventory Turnover', data: [10, 15, 14, 20, 18, 25] }],
  colors: ['#007bff'],
  dataLabels: { enabled: true },
  grid: {
    padding: {
      left: 10,
      right: 10
    }
  }
};
const options2 = {
  chart: {
    type: 'line',
    height: 100,
    sparkline: { enabled: true }
  },
  series: [{ name: 'Demand Forecasting', data: [30, 40, 35, 50, 49, 60] }],
  colors: ['#28a745'],
  dataLabels: { enabled: true },
  grid: {
    padding: {
      left: 10,
      right: 10
    }
  }
};
const options3 = {
  chart: {
    type: 'line',
    height: 100,
    sparkline: { enabled: true }
  },
  series: [{ name: 'Shrinkage Reports', data: [5, 7, 6, 8, 7, 9] }],
  colors: ['#ffc107'],
  dataLabels: { enabled: true },
  grid: {
    padding: {
      left: 10,
      right: 10
    }
  }
};
const options4 = {
  chart: {
    type: 'line',
    height: 100,
    sparkline: { enabled: true }
  },
  series: [{ name: 'Cost Analysis', data: [100, 120, 110, 130, 125, 140] }],
  colors: ['#dc3545'],
  dataLabels: { enabled: true },
  grid: {
    padding: {
      left: 10,
      right: 10
    }
  }
};

new ApexCharts(document.querySelector("#inventory-turnover-chart"), options1).render();
new ApexCharts(document.querySelector("#demand-forecasting-chart"), options2).render();
new ApexCharts(document.querySelector("#shrinkage-reports-chart"), options3).render();
new ApexCharts(document.querySelector("#cost-analysis-chart"), options4).render();