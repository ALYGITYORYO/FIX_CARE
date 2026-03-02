// Denmark
$(function () {
  $('#mapDenmark').vectorMap({
    map: 'dk_mill',
    zoomOnScroll: false,
    regionStyle: {
      initial: {
        fill: "#e49c3f"
      },
      hover: {
        "fill-opacity": 0.8
      },
      selected: {
        fill: "#e49c3f",
      },
    },
    backgroundColor: 'transparent',
  });
});