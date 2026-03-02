// Morris Donut
Morris.Donut({
  element: "donutColors",
  data: [
    { value: 30, label: "foo" },
    { value: 15, label: "bar" },
    { value: 10, label: "baz" },
    { value: 5, label: "A really really long label" },
  ],
  backgroundColor: "#d0daf5",
  labelColor: "#d0daf5",
  colors: ["#3bcaca", "#3ce2a0", "#a6e65c", "#e6d146", "#e49c3f", "#e2613f"],
  resize: true,
  hideHover: "auto",
  gridLineColor: "rgba(255, 255, 255, 0.3)",
  formatter: function (x) {
    return x + "%";
  },
});
