// Today Date
function updateTodaysDate(selector) {
  setInterval(function () {
    var momentNow = moment();
    $(selector).html(
      momentNow.format("MMMM . DD") +
      " " +
      momentNow.format(". dddd").substring(0)
    );
  }, 100);
}

// Usage
$(function () {
  updateTodaysDate("#todays-date");
});