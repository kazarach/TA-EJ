$(document).ready(function () {
    const token = localStorage.getItem('access_token');
    if (!token) {
        window.location.href = '/login';
        return;
    }

    $("#calendar").fullCalendar({
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
                url: "/api/project/",
                type: "GET",
                dataType: "json",
                headers: {
                    'Authorization': 'Bearer ' + token
                },
                success: function (response) {
                    var events = [];
                    console.log(response);

                    var projects = response.projects;

                    $.each(projects, function (index, project) {
                        console.log(project);
                        console.log(project.name);

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

            var selectedDate = date.format("YYYY-MM-DD");
            productionTable.column(10).search(selectedDate).draw();

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
