const token = localStorage.getItem('access_token');
const role = localStorage.getItem('role');
$.ajaxSetup({
    headers: {
        'Authorization': 'Bearer ' + token
    }
});

$(document).ready(function () {
    
    if (!token) {
        window.location.href = '/login';
        return;
    }

    // Append token and role to all sidebar links
    $(".row a").each(function() {
        const targetUrl = $(this).attr('href');
        if (role) {
            const newUrl = `/${role}${targetUrl}?token=${token}`;
            $(this).attr('href', newUrl);
        } else {
            const newUrl = `${targetUrl}?token=${token}`;
            $(this).attr('href', newUrl);
        }
    });    

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
                    var projects = response.projects;

                    $.each(projects, function (index, project) {
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
                    console.error("Error fetching data: ", error);
                    console.log("Response: ", xhr.responseText);
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
            var projectId = calEvent.id;

            projectTable.columns().search(''); // Clear any existing filters
            projectTable.column(0).search(projectId).draw(); // Assuming column 0 is the project ID

            var filteredData = projectTable.rows({ filter: 'applied' }).data();
            if (filteredData.length > 0) {
                var projectName = filteredData[0].name;
                $("#projectTitle").text(projectName);
            } else {
                $("#projectTitle").text("");
            }

            $("#projectModal").modal("show");
        },
    });   

    // Populate production table
    productionTable = $("#production-table").DataTable({
        ajax: {
            url: "/api/productions/",
            type: "GET",
            headers: {
                'Authorization': 'Bearer ' + token
            },
            dataSrc: function (json) {
                var productions = json.productions;
            if (productions.length > 0) {
                var lastProductionId = productions[productions.length - 1].id;
                $("#total-production").text(lastProductionId);
            } else {
                $("#total-production").text('0');
            }
            return productions;
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
        initComplete: function (settings, json) {
            $('#production-table_length').remove();
            $('#production-table_filter').remove();
        }
    });

    // populate product table
    $.ajax({
        url: "/api/products/",
        type: "GET",
        success: function (json) {
            console.log(json);
            var products = json.products;
            if (products.length > 0) {
                var lastProductsId = products[products.length - 1].id;
                $("#total-product").text(lastProductsId);
            } else {
                $("#total-product").text('0');
            }
    
            var tableBody = $("#products-table tbody");
            tableBody.empty(); // Clear any existing rows
    
            products.forEach(function (product) {
                var materialsHtml = "<ul>";
                product.materials.forEach(function (material) {
                    materialsHtml += "<li>" + material.name + " (" + material.pivot.quantity + ")</li>";
                });
                materialsHtml += "</ul>";
    
                var row = `
                    <tr>
                        <td>${product.id}</td>
                        <td>${product.name}</td>
                        <td>${product.type.name}</td>
                        <td>${product.category.name}</td>
                        <td>${product.size.name}</td>
                        <td>${product.color.name}</td>
                        <td>${product.sign.name}</td>
                        <td>${product.code}</td>
                        <td>${product.purchase_price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")}</td>
                        <td>${product.selling_price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")}</td>
                        <td>${product.stock}</td>
                        <td>${materialsHtml}</td>
                    </tr>
                `;
    
                tableBody.append(row);
            });
        },
        error: function (xhr, status, error) {
            console.error("Error fetching data:", error);
            $("#total-product").text('0');
        }
    });
    
    // populate materials table
        $.ajax({
            url: "/api/materials/", // Change this to your actual endpoint
            type: "GET",
            success: function (json) {
                var materials = json.materials;
            if (materials.length > 0) {
                var lastMaterialsId = materials[materials.length - 1].id;
                $("#total-material").text(lastMaterialsId);
            } else {
                $("#total-material").text('0');
            }

                var tableBody = $("#materials-table tbody");
                tableBody.empty(); // Clear any existing rows

                materials.forEach(function (material) {
                    var row = `
                        <tr>
                            <td>${material.id}</td>
                            <td>${material.name}</td>
                            <td>${material.stock}</td>
                            <td>${material.reserved}</td>
                            <td>${material.materialunit.name}</td>
                            <td>${material.materialcategory.name}</td>
                            <td>${material.code}</td>
                            <td>${material.purchase_price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")}</td>
                        </tr>
                    `;

                    tableBody.append(row);
                });
            },
            error: function (xhr, status, error) {
                console.error("Error fetching data:", error);
            }
        });
        

    // Populate project table
    projectTable = $("#projects-table").DataTable({
        ajax: {
            url: "/api/project/",
            type: "GET",
            headers: {
                'Authorization': 'Bearer ' + token
            },
            dataSrc: function (json) {
                var projects = json.projects;
            if (projects.length > 0) {
                var lastProjectsId = projects[projects.length - 1].id;
                $("#total-project").text(lastProjectsId);
            } else {
                $("#total-project").text('0');
            }
            return projects;
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
                    var productsHtml = "<ul>";
                    data.products.forEach(function (product) {
                        productsHtml +=
                            "<li>" +
                            product.name +
                            " (" +
                            product.size.name +
                            ")"+
                            " (" +
                            product.pivot.quantity +
                            ")</li>";
                    });
                    productsHtml += "</ul>";
                    return productsHtml;
                },
            },
            {
                data: null,
                render: function (data, type, row) {
                    var productsHtml = "<ul>";
                    data.products.forEach(function (product) {
                        productsHtml +=
                            "<li>" +
                            product.name + 
                            " (" +
                            product.size.name +
                            ")"+
                            " (" +
                            product.pivot.producted +
                            ")</li>";
                    });
                    productsHtml += "</ul>";
                    return productsHtml;
                },
            },
        ],
    });

    // Change calendar month based on dropdown selection
    $("#monthSelect").change(function () {
        var selectedMonth = $(this).val();
        var currentYear = new Date().getFullYear();
        var date = new Date(currentYear, selectedMonth, 1);

        $("#calendar").fullCalendar("gotoDate", date);
    });

    // Circle progress
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
});

    // Production chart
$(document).ready(function () {
    fetchProductionDataAndPopulateTable();
});

function fetchProductionDataAndPopulateTable() {
    $.ajax({
        url: "/api/productions/",
        type: "GET",
        success: function (json) {
            console.log(json);
            var productions = json.productions;

            // Populate the DataTable
            productionTable = $("#production-table").DataTable({
                data: productions,
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
                destroy: true // Ensure the DataTable is reinitialized if it already exists
            });

            // Prepare data for the chart
            var monthlySales = {};
            var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

            // Initialize monthlySales object with all months
            months.forEach(function (month) {
                monthlySales[month] = {};
            });

            // Process the data to extract total production per product per month
            productions.forEach(function (production) {
                var date = new Date(production.production_date);
                var month = date.toLocaleString('default', { month: 'long' });

                if (!monthlySales[month][production.products.name]) {
                    monthlySales[month][production.products.name] = 0;
                }
                monthlySales[month][production.products.name] += parseInt(production.quantity);
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
                    // borderColor: getRandomColor(),
                    borderWidth: 1
                };
            });

            // Update the chart with the fetched data
            updateChart(months, datasets);
        },
        error: function (xhr, status, error) {
            console.error("Error fetching data: ", error);
            console.log("Response: ", xhr.responseText);
        },
    });
}

function updateChart(labels, datasets) {
    var ctx = document.getElementById('productionChart').getContext('2d');
    var productionChart = new Chart(ctx, {
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

function getRandomColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

// populate machine table
var machineTable = $('#machine-table-db').DataTable({
    "pageLength": 3,
    ajax: {
        url: '/api/machine/', 
        type: 'GET',
        dataSrc: function (json) {
            console.log(json.machines);
            return json.machines;
        }
    },
    columns: [
        { data: 'name' },
        { data: 'machineuse.name' },
        { data: 'machinestatus.name' },

    ]
});