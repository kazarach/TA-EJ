let selectedWorkforceId;
var selectedRows = [];
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

    // Append token and role to all sidebar links
    $(".dropdown-top a").each(function() {
        const targetUrl = $(this).attr('href');
        if (role) {
            const newUrl = `/${role}${targetUrl}?token=${token}`;
            $(this).attr('href', newUrl);
        } else {
            const newUrl = `${targetUrl}?token=${token}`;
            $(this).attr('href', newUrl);
        }
    });


    
    var workforceTable = $('#workforce-table').DataTable({
        ajax: {
            url: '/api/workforce/', 
            type: 'GET',
            dataSrc: function (json) {
                console.log(json.workforces);
                return json.workforces;
            }
        },
        columns: [
            { data: 'id' },
            { data: 'name' },
            { data: 'workforceposition.name' },
            { data: 'workforcestatus.name' },
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
        fetchData(WorkforceId);
    });

    $('#workforce-table tbody').on('click', 'tr', function () {
        var data = workforceTable.row(this).data();
        fetchData(data.id);
    });
});

function fetchData(WorkforceId) {
    console.log('FETCH');
    fetch(`/api/workforce/${WorkforceId}`, {
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
            document.getElementById("ID").value = "ID: " + workforceData.id;
            document.getElementById("workforceName").value = workforceData.name;
            $('#workforcePosition').val(workforceData.position_id).trigger('change');
            $('#workforceStatus').val(workforceData.status_id).trigger('change');
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
    document.getElementById("workforcePosition").value = "";
    document.getElementById("workforceStatus").value = "";

    $('#workforcePosition').val(0).trigger('change');
    $('#workforceStatus').val(0).trigger('change');
}

function createWorkforce() {
    return new Promise((resolve, reject) => {
        event.preventDefault();
        const workforceName = document.getElementById("workforceName").value;
        const workforcePosition = document.getElementById("workforcePosition").value;
        const workforceStatus = document.getElementById("workforceStatus").value;

        if (workforceName === 'Nama') {
            alert("Workforce name cannot be blank");
            return reject(new Error("Workforce name cannot be blank"));
        }
        if (workforcePosition === 'Use') {
            alert("Workforce use cannot be blank");
            return reject(new Error("Workforce use cannot be blank"));
        }
        if (workforceStatus === 'Status') {
            alert("Workforce status cannot be blank");
            return reject(new Error("Workforce status cannot be blank"));
        }

        const workforceData = {
            name: workforceName,
            position_id: workforcePosition,
            status_id: workforceStatus,
        };

        fetch(`/api/workforce`, {
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
            console.log(selectedWorkforceId);
            const workforceName = document.getElementById("workforceName").value;
            const workforcePosition = document.getElementById("workforcePosition").value;
            const workforceStatus = document.getElementById("workforceStatus").value;

            if (workforceName === 'Nama') {
                alert("Workforce name cannot be blank");
                return reject(new Error("Workforce name cannot be blank"));
            }
            if (workforcePosition === 'Use') {
                alert("Workforce use cannot be blank");
                return reject(new Error("Workforce use cannot be blank"));
            }
            if (workforceStatus === 'Status') {
                alert("Workforce status cannot be blank");
                return reject(new Error("Workforce status cannot be blank"));
            }

            const workforceData = {
                name: workforceName,
                position_id: workforcePosition,
                status_id: workforceStatus,
            };
            console.log(workforceData);
            fetch(`/api/workforce/${selectedWorkforceId}`, {
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
            fetch(`/api/workforce/${selectedWorkforceId}`, {
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

// searchbar
$(document).ready(function () {
    $("#workforcePosition").select2({
        placeholder: "Select Position",
        allowClear: true,
    });
    $("#workforceStatus").select2({
        placeholder: "Select Status",
        allowClear: true,
    });
});