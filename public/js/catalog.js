let selectedWorkforceId=0;
var selectedRows = [];
let dueDate;
const token = localStorage.getItem('access_token');
const role = localStorage.getItem('role');
// Set default AJAX headers
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

    $(".dropdown-top a").each(function() {
        const targetUrl = $(this).attr('href');
        $(this).attr('href', 'javascript:void(0);');
        $(this).on('click', function() {
            navigateTo(targetUrl);
        });
    });


    
    var workforceTable = $('#workforce-table').DataTable({
        ajax: {
            url: '/api/catalog/', 
            type: 'GET',
            dataSrc: function (json) {
                console.log(json.catalogs);
                return json.catalogs;
            }
        },
        columns: [
            { data: 'id' },
            { data: 'name' },
            { data: 'due_date' },
        ]
    });

    function refreshTable() {
        workforceTable.ajax.reload(null, false); // User paging is not reset on reload
    }
    $('#update-button').on('click', function() {
        updateWorkforce()
            .then(() => {
                refreshTable(); // Refresh the table after updateWorkforce is successful
            })
            .catch((error) => {
                console.error("Update failed:", error);
            });
    });
    $('#create-button').on('click', function() {
        createWorkforce()
            .then(() => {
                refreshTable(); // Refresh the table after createWorkforce is successful
            })
            .catch((error) => {
                console.error("Creation failed:", error);
            });
    });
    $('#delete-button').on('click', function() {
        deleteWorkforce()
            .then(() => {
                refreshTable(); // Refresh the table after deleteWorkforce is successful
            })
            .catch((error) => {
                console.error("Deletion failed:", error);
            });
    });

    $('#workforce-table').on('click', '.select-btn', function() {
        var WorkforceId = $(this).data('id');
        selectedWorkforceId=WorkforceId;
        console.log(WorkforceId);
        fetchData(WorkforceId);
    });

    $('#workforce-table tbody').on('click', 'tr', function () {
        var data = workforceTable.row(this).data();
        fetchData(data.id);
    });
});

$(document).ready(function () {
    $(".datepicker").datepicker({
        dateFormat: "yy-mm-dd",
        onSelect: function () {
            $(this).trigger("change");
        },
    });

    function handleInputChange() {
        endDate = $("#dueDate").val();
        console.log(endDate);
    }

    $("#dueDate").on(
        "change input",
        handleInputChange
    );
});

function fetchData(WorkforceId) {
    console.log('FETCH');
    fetch(`/api/catalog/${WorkforceId}`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': `Bearer ${token}`
        }
    })
        .then((response) => response.json())
        .then((workforceData) => {
            console.log(workforceData);
            selectedWorkforceId=workforceData.id;
            console.log(selectedWorkforceId);
            document.getElementById("ID").value = "ID: " + workforceData.id;
            document.getElementById("workforceName").value = workforceData.name;
            document.getElementById("dueDate").value = workforceData.due_date;
            changeTextColor();

        })
        .catch((error) => console.error("Error fetching Workforce data:", error));
}

function changeTextColor() {
    var inputControl = document.querySelectorAll(".form-control");
    var inputSelect = document.querySelectorAll(".form-select");

    inputControl.forEach(function (field) {
        field.style.color = "black";
    });
    inputSelect.forEach(function (field) {
        field.style.color = "black"; 
    });
}

function clearForm() {
    document.getElementById("ID").value = "";
    document.getElementById("workforceName").value = "";
    document.getElementById("dueDate").value = "";
    changeTextColor();
}

function createWorkforce() {
    return new Promise((resolve, reject) => {
        event.preventDefault();
        const workforceName = document.getElementById("workforceName").value;
        const dueDate = document.getElementById("dueDate").value;

        if (workforceName === 'Nama') {
            alert("Workforce name cannot be blank");
            return reject(new Error("Workforce name cannot be blank"));
        }
        if (dueDate === 'Use') {
            alert("Workforce use cannot be blank");
            return reject(new Error("Workforce use cannot be blank"));
        }

        const workforceData = {
            name: workforceName,
            due_date: dueDate,
        };

        fetch(`/api/catalog`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                'Authorization': `Bearer ${token}`

            },
            body: JSON.stringify(workforceData),
        })
        .then((response) => {
            if (!response.ok) {
                throw new Error('Failed to create Workforce');
            }
            return response.json();
        })
        .then((data) => {
            resolve(data);
        })
        .catch((error) => {
            console.error("Error:", error);
            reject(error);
        });
    });
}


function updateWorkforce() {
    return new Promise((resolve, reject) => {
        event.preventDefault();
        if (selectedWorkforceId) {
            const workforceName = document.getElementById("workforceName").value;
            const dueDate = document.getElementById("dueDate").value;

            if (workforceName === 'Nama') {
                alert("Workforce name cannot be blank");
                return reject(new Error("Workforce name cannot be blank"));
            }
            if (dueDate === 'Use') {
                alert("Workforce use cannot be blank");
                return reject(new Error("Workforce use cannot be blank"));
            }

            const workforceData = {
                name: workforceName,
                due_date: dueDate,
            };
            fetch(`/api/catalog/${selectedWorkforceId}`, {
                method: "PUT",
                headers: {
                    "Content-Type": "application/json",
                    'Authorization': `Bearer ${token}`
                },
                body: JSON.stringify(workforceData),
            })
            .then((response) => {
                if (!response.ok) {
                    throw new Error('Failed to update Workforce');
                }
                return response.json();
            })
            .then((data) => {
                resolve(data);
            })
            .catch((error) => {
                console.error("Error:", error);
                reject(error);
            });
        } else {
            console.error("No workforce selected for update");
            reject(new Error("No workforce selected for update"));
        }
    });
}

function deleteWorkforce() {
    return new Promise((resolve, reject) => {
        event.preventDefault();
        if (selectedWorkforceId) {
            console.log(selectedWorkforceId);
            fetch(`/api/catalog/${selectedWorkforceId}`, {
                method: "DELETE",
                headers: {
                    "Content-Type": "application/json",
                    'Authorization': `Bearer ${token}`
                },
            })
            .then((response) => {
                if (!response.ok) {
                    throw new Error('Failed to delete Workforce');
                }
                return response.json();
            })
            .then((data) => {
                clearForm();
                resolve(data);
            })
            .catch((error) => {
                console.error("Error:", error);
                reject(error);
            });
        } else {
            console.error("No workforce selected for deletion");
            reject(new Error("No workforce selected for deletion"));
        }
    });
}