document.addEventListener("DOMContentLoaded", function () {
  var calendarEl = document.getElementById("dayGrid");
  var calendar = new FullCalendar.Calendar(calendarEl, {
    headerToolbar: {
      left: "prevYear,prev,next,nextYear today",
      center: "title",
      right: "dayGridMonth,dayGridWeek,dayGridDay",
    },
    initialDate: "2025-07-12",
    navLinks: true, // can click day/week names to navigate views
    editable: true,
    dayMaxEvents: true, // allow "more" link when too many events
    events: [
      {
        title: "All Day Event",
        start: "2025-07-01",
        color: "#3bcaca",
      },
      {
        title: "Long Event",
        start: "2025-07-07",
        end: "2025-07-10",
        color: "#3ce2a0",
      },
      {
        groupId: 999,
        title: "Birthday",
        start: "2025-07-09T16:00:00",
        color: "#a6e65c",
      },
      {
        groupId: 999,
        title: "Birthday",
        start: "2025-07-16T16:00:00",
        color: "#e6d146",
      },
      {
        title: "Conference",
        start: "2025-07-11",
        end: "2025-07-13",
        color: "#e49c3f",
      },
      {
        title: "Meeting",
        start: "2025-07-14T10:30:00",
        end: "2025-07-14T12:30:00",
      },
      {
        title: "Lunch",
        start: "2025-07-16T12:00:00",
        color: "#e2613f",
      },
      {
        title: "Meeting",
        start: "2025-07-18T14:30:00",
        color: "#e6d146",
      },
      {
        title: "Interview",
        start: "2025-07-21T17:30:00",
        color: "#a6e65c",
      },
      {
        title: "Meeting",
        start: "2025-07-22T20:00:00",
        color: "#3ce2a0",
      },
      {
        title: "Birthday",
        start: "2025-07-13T07:00:00",
        color: "#3bcaca",
      },
      {
        title: "Click for Google",
        url: "http://google.com/",
        start: "2025-07-28",
        color: "#e2613f",
      },
      {
        title: "Interview",
        start: "2025-07-20",
        color: "#e6d146",
      },
      {
        title: "Product Launch",
        start: "2025-07-29",
        color: "#3bcaca",
      },
      {
        title: "Leave",
        start: "2025-07-25",
        color: "#e49c3f",
      },
    ],
  });

  calendar.render();
});
