let selectedId;
var selectedValue;
const token = localStorage.getItem('access_token');
const role = localStorage.getItem('role');
const partialTable = $("#partial-table").DataTable({
    columns: [
        { title: "ID" },
        { title: "Name" }
    ]
});
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

    $("#partial-table tbody").on("click", "tr", function () {
        var data = partialTable.row(this).data();
        console.log(data);
        selectedId = data[0];
        fetchData(data);
    });

    function refreshTable() {
        partialTable.ajax.reload(null, false);
    }
    $("#update-button").on("click", function () {
        updateData()
            .then(() => {
                populateData(selectedValue);
                clearForm();
            })
            .catch((error) => {
                console.error("Update failed:", error);
            });
    });
    $("#create-button").on("click", function () {
        createData()
            .then(() => {
                populateData(selectedValue);
                clearForm();
            })
            .catch((error) => {
                console.error("Creation failed:", error);
            });
    });
    $("#delete-button").on("click", function () {
        deleteData()
            .then(() => {
                populateData(selectedValue);
                clearForm();
            })
            .catch((error) => {
                console.error("Deletion failed:", error);
            });
    });
    
});

function fetchData(Data) {
    console.log("FETCH");
    document.getElementById("Name").value = Data[1];
}

document.getElementById("Change").addEventListener("change", function() {
    selectedValue = this.value;
    console.log(selectedValue);
    populateData(selectedValue);
});

function populateData(type) {
    fetch(`/api/partial/${type}`, {
        method: "GET",
        headers: {
            "Content-Type": "application/json",
            'Authorization': `Bearer ${token}`
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error("Failed to fetch data");
        }
        return response.json();
    })
    .then(data => {
        console.log(data);
        populateTable(data);
    })
    .catch(error => {
        console.error("Error:", error);
    });
}

function populateTable(data) {
    // Clear existing data in the DataTable
    partialTable.clear();

    // Add new data to the DataTable
    partialTable.rows.add(data.map(item => [item.id, item.name]));

    // Redraw the DataTable to update the view
    partialTable.draw();
}

function clearForm() {
    document.getElementById("Name").value = "";
}

function createData() {
    return new Promise((resolve, reject) => {
        event.preventDefault();
        const Change = document.getElementById("Change").value;
        const Name = document.getElementById("Name").value;

        const Data = {
            name: Name,
        };

        fetch(`/api/partial/${Change}/`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                'Authorization': `Bearer ${token}`
            },
            body: JSON.stringify(Data),
        })
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Failed to create Machine");
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

function updateData() {
    return new Promise((resolve, reject) => {
        event.preventDefault();
        if (selectedId) {
            const Change = document.getElementById("Change").value;
            const Name = document.getElementById("Name").value;

            const Data = {
                name: Name,
            };
            fetch(`/api/partial/${Change}/${selectedId}`, {
                method: "PUT",
                headers: {
                    "Content-Type": "application/json",
                    'Authorization': `Bearer ${token}`
                },
                body: JSON.stringify(Data),
            })
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Failed to update Customer");
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
            console.error("No Machine selected for update");
            reject(new Error("No Machine selected for update"));
        }
    });
}

function deleteData() {
    return new Promise((resolve, reject) => {
        event.preventDefault();
        const Change = document.getElementById("Change").value;
        if (selectedId) {
            fetch(`/api/partial/${Change}/${selectedId}`, {
                method: "DELETE",
                headers: {
                    "Content-Type": "application/json",
                    'Authorization': `Bearer ${token}`
                },
            })
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Failed to delete Customer");
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
            console.error("No Customer selected for deletion");
            reject(new Error("No Customer selected for deletion"));
        }
    });
}

// searchbar
$(document).ready(function () {
    $("#Class").select2({
        placeholder: "Select Class",
        allowClear: true,
    });
});