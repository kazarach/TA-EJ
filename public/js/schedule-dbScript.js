$(document).ready(function () {
    $("#calendar").fullCalendar({
        // header: {
        //     left: "prev,next today",
        //     center: "title",
        //     right: "month,agendaWeek,agendaDay",
        // },
        initialDate: moment().format('YYYY-MM-DD'),
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

            // Filter the DataTable based on the clicked date
            var selectedDate = date.format("YYYY-MM-DD");
            productionTable.column(10).search(selectedDate).draw();

            // Get the filtered data and populate the project name in the form
            var filteredData = productionTable.rows({ filter: 'applied' }).data();
            if (filteredData.length > 0) {
                var projectName = filteredData[0].projects.name;
                $("#eventTitle").text(projectName);
            } else {
                $("#eventTitle").text("");
            }
        },
    });
});

var productionTable;

$(document).ready(function () {
    productionTable = $("#production-table").DataTable({
        ajax: {
            url: "/api/productions/",
            type: "GET",
            dataSrc: function (json) {
                console.log(json);
                return json.productions
            },
        },
        columns: [
            { data: "id" },
            { data: "products.name" },
            { data: "quantity" },
            { data: "products.size.name" },
            { data: "products.color.name" },
            { data: "products.code" },
            { data: "projects.name" },
            { data: "projects.projectstatus.name" },
            {
                data: "machines",
                render: function (data, type, row) {
                    return '<ul>' + data.map(machine => `<li>${machine.name}</li>`).join('') + '</ul>';
                }
            },
            {
                data: "workforces",
                render: function (data, type, row) {
                    return '<ul>' + data.map(workforce => `<li>${workforce.name}</li>`).join('') + '</ul>';
                }
            },
            { data: "production_date" },
        ],
        initComplete: function(settings, json) {
            // Remove the header row
            $('#production-table_length').remove();
            $('#production-table_filter').remove();
        }
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
// $("#addNewButton").click(function () {
//     $("#addEventModal").modal("show");
// });

// Save event
$('#saveEventButton').click(function() {
    var eventTitle = $('#eventTitle').val();
    var eventStart = $('#eventStart').val();
    var eventEnd = $('#eventEnd').val();
    var eventColor = $('#eventColor').val();
    var eventTextColor = $('#eventTextColor').val();

if(eventTitle && eventStart) {
    $('#calendar').fullCalendar('renderEvent', {
        title: eventTitle,
        start: eventStart,
        end: eventEnd,
        color: eventColor,
        textColor: eventTextColor
    }, true); // stick the event

    $('#addEventModal').modal('hide');
    $('#addEventForm')[0].reset();
} else {
        alert("Please enter the required details.");
}
});


// circle progres
const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Modeling', 'Cutting', 'Sewing', 'Finishing', 'Packing'],
                datasets: [{
                    label: 'Expenses',
                    data: [300, 50, 100, 150],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'right'
                    }
                }
            }
        });