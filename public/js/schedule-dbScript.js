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
                            id: project.id,
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
            $("#addEventModal").modal("show");

            var selectedDate = date.format("YYYY-MM-DD");
            productionTable.column(10).search(selectedDate).draw();

            var filteredData = productionTable.rows({ filter: 'applied' }).data();
            if (filteredData.length > 0) {
                var projectName = filteredData[0].projects.name;
                $("#eventTitle").text(projectName);
            } else {
                $("#eventTitle").text("No data");
            }
        },
        eventClick: function (calEvent) {
            // Get the event's ID
            var projectId = calEvent.id;

            projectTable.columns().search(''); // Clear any existing filters
            projectTable.column(0).search(projectId).draw(); // Assuming column 0 is the project ID

            // Get the filtered data and populate the project name in the form
            var filteredData = projectTable.rows({ filter: 'applied' }).data();
            if (filteredData.length > 0) {
                var projectName = filteredData[0].name;
                $("#projectTitle").text(projectName);
            } else {
                $("#projectTitle").text("");
            }

            // Show the modal
            $("#projectModal").modal("show");
        },
    });
});

// populate production
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

// populate project
$(document).ready(function () {
    // Initialize the DataTable
    projectTable = $("#projects-table").DataTable({
        ajax: {
            url: "/api/project/", // Change this to your actual endpoint
            type: "GET",
            dataSrc: function (json) {
                console.log(json.projects);
                // Assuming your JSON structure, you may need to adjust the dataSrc function
                return json.projects;
            },
        },
        columns: [
            { data: "id" },
            { data: "name" },
            { data: "start_date" },
            { data: "end_date" },
            { data: "projectstatus.name" },
            {
                data: null,
                render: function (data, type, row) {
                    var productsHtml = "<ul>"; // Start unordered list
                    data.products.forEach(function (product) {
                        productsHtml +=
                            "<li>" +
                            product.name +
                            " (" +
                            product.size.name +
                            ")"+
                            " (" +
                            product.pivot.quantity +
                            ")</li>"; // List item for each product
                    });
                    productsHtml += "</ul>"; // End unordered list
                    return productsHtml;
                },
            },
            {
                data: null,
                render: function (data, type, row) {
                    var productsHtml = "<ul>"; // Start unordered list
                    data.products.forEach(function (product) {
                        productsHtml +=
                            "<li>" +
                            product.name + 
                            " (" +
                            product.size.name +
                            ")"+
                            " (" +
                            product.pivot.producted +
                            ")</li>"; // List item for each product
                    });
                    productsHtml += "</ul>"; // End unordered list
                    return productsHtml;
                },
            },
        ],
    });
});

// Change calendar month based on dropdown selection
$("#monthSelect").change(function () {
    var selectedMonth = $(this).val();
    var currentYear = new Date().getFullYear();
    var date = new Date(currentYear, selectedMonth, 1);

    $("#calendar").fullCalendar("gotoDate", date);
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

// selling chart
$(document).ready(function () {
    fetchChartDataAndPopulateTable();
});

function fetchChartDataAndPopulateTable() {
    $.ajax({
        url: "/api/archive/selling/transaction",
        type: "GET",
        success: function (data) {
            // Initialize the months array with all months from January to December
            var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
            var monthlySales = {};

            // Initialize monthlySales object with all months
            months.forEach(function (month) {
                monthlySales[month] = {};
            });

            // Process the data to extract total sales per product per month
            data.transactions.forEach(function (transaction) {
                var date = new Date(transaction.created_at);
                var month = date.toLocaleString('default', { month: 'long' });

                transaction.products.forEach(function (product) {
                    if (!monthlySales[month][product.name]) {
                        monthlySales[month][product.name] = 0;
                    }
                    monthlySales[month][product.name] += product.pivot.quantity;
                });
            });

            // Prepare the product names set
            var productNames = new Set();
            months.forEach(month => {
                Object.keys(monthlySales[month]).forEach(productName => {
                    productNames.add(productName);
                });
            });
            productNames = Array.from(productNames);

            var datasets = productNames.map(productName => {
                return {
                    label: productName,
                    data: months.map(month => monthlySales[month][productName] || 0),
                    backgroundColor: getRandomColor(),
                    borderWidth: 1
                };
            });

            // Update the chart with the fetched data
            updateChart(months, datasets);

            // Prepare transformed data for the table
            var transformedData = [];
            data.transactions.forEach(function (transaction) {
                transaction.products.forEach(function (product) {
                    transformedData.push({
                        transaction_id: transaction.id,
                        customer_name: transaction.customer.name,
                        discount: transaction.customer.customerclass ? transaction.customer.customerclass.discount : "N/A",
                        total: transaction.total,
                        paid: transaction.paid,
                        payment_method: transaction.paymentmethod.name,
                        product_name: product.name,
                        product_quantity: product.pivot.quantity,
                        created_at: transaction.created_at
                    });
                });
            });

            // Initialize the DataTable with the transformed data
            initializeDataTable(transformedData);
        },
        error: function (error) {
            console.error("Error fetching data", error);
        }
    });
}

function updateChart(labels, datasets) {
    var abc = document.getElementById('sellChart').getContext('2d');
    var sellChart = new Chart(abc, {
        type: 'bar', // Vertical bar chart
        data: {
            labels: labels,
            datasets: datasets
        },
        options: {
            plugins: {
                legend: {
                    display: false // Hide the legend above the chart
                },
                tooltip: {
                    enabled: true
                },
                datalabels: {
                    display: false // Ensure data labels are not displayed
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                },
                x: {
                    stacked: true
                },
                y: {
                    stacked: true
                }
            }
        }
    });
}


function initializeDataTable(data) {
    $('#transaction-table').DataTable({
        data: data,
        columns: [
            { data: "transaction_id", title: "ID" },
            { data: "customer_name", title: "Customer Name" },
            { data: "discount", title: "Discount (%)" },
            {
                data: "total",
                title: "Total",
                render: function (data, type, row) {
                    return data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                },
            },
            {
                data: "paid",
                title: "Paid",
                render: function (data, type, row) {
                    return data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                },
            },
            { data: "payment_method", title: "Payment Method" },
            { data: "product_name", title: "Product Name" },
            { data: "product_quantity", title: "Product Quantity" },
            {
                data: "created_at",
                title: "Created At",
                render: function (data, type, row) {
                    var date = new Date(data);
                    var options = { year: 'numeric', month: 'long', day: 'numeric' };
                    return date.toLocaleDateString(undefined, options) + ' ' + date.toLocaleTimeString();
                },
            }
        ]
    });
}

function getRandomColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

