document.addEventListener("DOMContentLoaded", function () {
  var calendarEl = document.getElementById("selectableCalendar");

  var calendar = new FullCalendar.Calendar(calendarEl, {
    headerToolbar: {
      left: "prev,next today",
      center: "title",
      right: "dayGridMonth,timeGridWeek,timeGridDay",
    },
    initialDate: "2025-07-12",
    navLinks: true, // can click day/week names to navigate views
    selectable: true,
    selectMirror: true,
    select: function (arg) {
      var title = prompt("Event Title:");
      if (title) {
        calendar.addEvent({
          title: title,
          start: arg.start,
          end: arg.end,
          allDay: arg.allDay,
        });
      }
      calendar.unselect();
    },
    eventClick: function (arg) {
      if (confirm("Are you sure you want to delete this event?")) {
        arg.event.remove();
      }
    },
    editable: true,
    dayMaxEvents: true, // allow "more" link when too many events
    events: [
      {
        title: "All Day Event",
        start: "2025-07-01",
        color: "#3ce2a0",
      },
      {
        title: "Long Event",
        start: "2025-07-07",
        end: "2025-07-10",
      },
      {
        groupId: 999,
        title: "Birthday",
        start: "2025-07-09T16:00:00",
        color: "#e49c3f",
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
      },
      {
        title: "Meeting",
        start: "2025-07-12T10:30:00",
        end: "2025-07-12T12:30:00",
      },
      {
        title: "Lunch",
        start: "2025-07-12T12:00:00",
        color: "#a6e65c",
      },
      {
        title: "Meeting",
        start: "2025-07-12T14:30:00",
      },
      {
        title: "Interview",
        start: "2025-07-12T17:30:00",
      },
      {
        title: "Meeting",
        start: "2025-07-12T20:00:00",
      },
      {
        title: "Birthday",
        start: "2025-07-13T07:00:00",
        color: "#e2613f",
      },
      {
        title: "Click for Google",
        url: "http://google.com/",
        start: "2025-07-28",
        color: "#1dd297",
      },
    ],
  });

  calendar.render();
});
