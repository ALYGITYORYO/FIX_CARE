// Morris Negative values
var neg_data = [
  { period: "2017-02-12", a: 100 },
  { period: "2017-01-03", a: 75 },
  { period: "2016-08-08", a: 50 },
  { period: "2016-05-10", a: 25 },
  { period: "2016-03-14", a: 0 },
  { period: "2016-01-10", a: -25 },
  { period: "2005-12-10", a: -50 },
  { period: "2005-10-07", a: -75 },
  { period: "2005-09-25", a: -100 },
];
Morris.Line({
  element: "negativeValues",
  data: neg_data,
  xkey: "period",
  ykeys: ["a"],
  labels: ["Series A"],
  units: "%",
  resize: true,
  hideHover: "auto",
  gridLineColor: "rgba(255, 255, 255, 0.3)",
  pointFillColors: ["#ffffff"],
  pointStrokeColors: ["#3bcaca", "#3ce2a0", "#a6e65c", "#e6d146", "#e49c3f", "#e2613f"],
  lineColors: ["#3bcaca", "#3ce2a0", "#a6e65c", "#e6d146", "#e49c3f", "#e2613f"],
});
