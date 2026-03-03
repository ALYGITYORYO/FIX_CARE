// World Map GDP
$(function () {
  $('#world-map-gdp').vectorMap({
    map: 'world_mill_en',
    zoomOnScroll: false,
    series: {
      regions: [{
        values: gdpData,
        scale: ["#3bcaca", "#3ce2a0", "#a6e65c", "#e6d146", "#e49c3f", "#e2613f"],
        normalizeFunction: 'polynomial'
      }]
    },
    backgroundColor: 'transparent',
    onRegionTipShow: function (e, el, code) {
      el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
    }
  });
});