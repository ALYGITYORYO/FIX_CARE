document.addEventListener("DOMContentLoaded", function () {
  var calendarEl = document.getElementById("listView");

  var calendar = new FullCalendar.Calendar(calendarEl, {
    headerToolbar: {
      left: "prev,next today",
      center: "title",
      right: "listDay,listWeek",
    },

    // customize the button names,
    // otherwise they'd all just say "list"
    views: {
      listDay: { buttonText: "list day" },
      listWeek: { buttonText: "list week" },
    },

    initialView: "listWeek",
    initialDate: "2025-06-12",
    navLinks: true, // can click day/week names to navigate views
    editable: true,
    dayMaxEvents: true, // allow "more" link when too many events
    events: [
      {
        title: "All Day Event",
        start: "2025-06-01",
      },
      {
        title: "Long Event",
        start: "2025-06-07",
        end: "2025-06-10",
        color: "#3ce2a0",
      },
      {
        groupId: 999,
        title: "Repeating Event",
        start: "2025-06-09T16:00:00",
      },
      {
        groupId: 999,
        title: "Repeating Event",
        start: "2025-06-16T16:00:00",
      },
      {
        title: "Conference",
        start: "2025-06-11",
        end: "2025-06-13",
      },
      {
        title: "Meeting",
        start: "2025-06-12T10:30:00",
        end: "2025-06-12T12:30:00",
        color: "#a6e65c",
      },
      {
        title: "Lunch",
        start: "2025-06-12T12:00:00",
        color: "#e6d146",
      },
      {
        title: "Meeting",
        start: "2025-06-12T14:30:00",
      },
      {
        title: "Happy Hour",
        start: "2025-06-12T17:30:00",
        color: "#e49c3f",
      },
      {
        title: "Dinner",
        start: "2025-06-12T20:00:00",
      },
      {
        title: "Birthday Party",
        start: "2025-06-13T07:00:00",
        color: "#e2613f",
      },
      {
        title: "Click for Google",
        url: "http://google.com/",
        start: "2025-06-28",
      },
    ],
  });

  calendar.render();
});
