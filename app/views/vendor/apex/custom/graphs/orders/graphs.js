// Average Delivery Time Chart
var averageDeliveryTimeOptions = {
  chart: { type: 'line', height: 320, toolbar: { show: false } },
  colors: ['#3facff'],
  series: [{ name: 'Delivery Time', data: [30, 25, 28, 35, 40, 32, 29] }],
  xaxis: { categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'] }
};
var averageDeliveryTimeChart = new ApexCharts(document.querySelector("#averageDeliveryTimeChart"), averageDeliveryTimeOptions);
averageDeliveryTimeChart.render();

// Fulfillment Rate Chart
var fulfillmentRateOptions = {
  chart: { type: 'radialBar', height: 300 },
  series: [85],
  plotOptions: {
    radialBar: {
      dataLabels: {
        name: {
          fontSize: '16px',
          fontWeight: 'bold'
        },
        value: {
          fontSize: '21px',
          fontWeight: 'bold'
        }
      }
    }
  },
  labels: ['Fulfillment Rate']
};
var fulfillmentRateChart = new ApexCharts(document.querySelector("#fulfillmentRateChart"), fulfillmentRateOptions);
fulfillmentRateChart.render();

// Orders by Status Chart
var ordersByStatusOptions = {
  chart: {
    type: 'pie',
    height: 300,
    animations: { enabled: true }
  },
  series: [2090, 419, 1050, 120, 260, 220],
  labels: ['Total Orders', 'Pending', 'Completed', 'In Transit', 'Canceled', 'Delayed'],
  legend: {
    position: 'bottom',
    fontSize: '14px',
    markers: { radius: 12 }
  },
  dataLabels: {
    enabled: true,
    style: {
      fontSize: '12px',
      colors: ['#ffffff']
    }
  },
  colors: ['#3facff', '#ff7f3f', '#28a745', '#ffc107', '#dc3545', '#6c757d']
};
var ordersByStatusChart = new ApexCharts(document.querySelector("#ordersByStatusChart"), ordersByStatusOptions);
ordersByStatusChart.render();

// Top Customers / Frequent Destinations Chart
var topCustomersOptions = {
  chart: { type: 'bar', height: 300, toolbar: { show: false } },
  series: [{ name: 'Orders', data: [120, 90, 75, 60, 50] }],
  xaxis: { categories: ['Destination A', 'Destination B', 'Destination C', 'Destination D', 'Destination E'] }
};
var topCustomersChart = new ApexCharts(document.querySelector("#topCustomersChart"), topCustomersOptions);
topCustomersChart.render();