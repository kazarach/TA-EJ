$(document).ready(function () {
    $("#calendar").fullCalendar({
        header: {
            left: "prev,next today",
            center: "title",
            right: "month,agendaWeek,agendaDay",
        },
        defaultDate: "2024-03-14",
        editable: true,
        buttonText: {
            today: "Today",
            month: "Month View",
            week: "Week View",
            day: "Day View",
        },
        events: function (start, end, timezone, callback) {
            $.ajax({
                url: "/api/project/", // Replace with your actual API endpoint
                type: "GET",
                dataType: "json",
                success: function (response) {
                    var events = [];
                    console.log(response); // Log the response to see its structure

                    // Assuming projects are nested under response.projects
                    var projects = response.projects;

                    $.each(projects, function (index, project) {
                        console.log(project); // Log each project to inspect its structure
                        console.log(project.name); // Log project.name to see if it's accessible

                        // Push event data to the events array
                        events.push({
                            title: project.name,
                            start: project.start_date,
                            end: project.end_date,
                        });
                    });
                    callback(events);
                },
                error: function (xhr, status, error) {
                    console.error("Error fetching data from API: ", error);
                },
            });
        },
        dayClick: function (date) {
            $("#eventStart").val(date.format("YYYY-MM-DD"));
            $("#eventEnd").val(date.format("YYYY-MM-DD"));
            $("#addEventModal").modal("show");
        },
    });
});

// Change calendar month based on dropdown selection
$("#monthSelect").change(function () {
    var selectedMonth = $(this).val();
    var currentYear = new Date().getFullYear();
    var date = new Date(currentYear, selectedMonth, 1);

    $("#calendar").fullCalendar("gotoDate", date);
});

// Initialize datepicker
$(".datepicker").datepicker({
    dateFormat: "yy-mm-dd",
});

// Show modal on button click
$("#addNewButton").click(function () {
    $("#addEventModal").modal("show");
});

// Save event
// $('#saveEventButton').click(function() {
//     var eventTitle = $('#eventTitle').val();
//     var eventStart = $('#eventStart').val();
//     var eventEnd = $('#eventEnd').val();
//     var eventColor = $('#eventColor').val();
//     var eventTextColor = $('#eventTextColor').val();

// if(eventTitle && eventStart) {
//     $('#calendar').fullCalendar('renderEvent', {
//         title: eventTitle,
//         start: eventStart,
//         end: eventEnd,
//         color: eventColor,
//         textColor: eventTextColor
//     }, true); // stick the event

//     $('#addEventModal').modal('hide');
//     $('#addEventForm')[0].reset();
// } else {
//         alert("Please enter the required details.");
// }
// });
