var options = {
  series: [75],
  chart: {
    height: 240,
    type: 'radialBar',
    toolbar: {
      show: false
    }
  },
  plotOptions: {
    radialBar: {
      startAngle: -135,
      endAngle: 225,
      hollow: {
        margin: 0,
        size: '60%',
        background: 'transparent',
        image: undefined,
        imageOffsetX: 0,
        imageOffsetY: 0,
        position: 'front',
        dropShadow: {
          enabled: true,
          top: 3,
          left: 0,
          blur: 4,
          opacity: 0.3
        }
      },
      track: {
        background: 'transparent',
        strokeWidth: '60%',
        margin: 0, // margin is in pixels
        dropShadow: {
          enabled: true,
          top: -3,
          left: 0,
          blur: 14,
          opacity: 0.2,
        }
      },

      dataLabels: {
        show: true,
        name: {
          offsetY: -5,
          show: true,
          color: '#FFFFFF',
          fontSize: '16px'
        },
        value: {
          formatter: function (val) {
            return parseInt(val) + '%';
          },
          color: '#dec21c',
          fontSize: '30px',
          fontWeight: 'bold',
          show: true,
        }
      }
    }
  },
  fill: {
    type: 'gradient',
    gradient: {
      shade: 'light',
      type: 'horizontal',
      shadeIntensity: 0.5,
      gradientToColors: [],
      inverseColors: true,
      opacityFrom: 1,
      opacityTo: 1,
      stops: [0, 100],
      colorStops: [
        {
          offset: 0,
          color: "#fb3a7aff",
          opacity: 1
        },
        {
          offset: 20,
          color: "#22acf7ff",
          opacity: 1
        },
        {
          offset: 60,
          color: "#36e166ff",
          opacity: 1
        },
        {
          offset: 100,
          color: "#f57d2dff",
          opacity: 1
        }
      ],
    }
  },
  stroke: {
    lineCap: 'round'
  },
  labels: ['Uploads'],
};

var chart = new ApexCharts(document.querySelector("#uploads"), options);
chart.render();