let selectedId;
var selectedMachines = [];
var selectedWorkforces = [];
var tableMachine;
var tableWorkforce;
const token = localStorage.getItem('access_token');
const role = localStorage.getItem('role');

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

    // Set default AJAX headers
    $.ajaxSetup({
        headers: {
            'Authorization': 'Bearer ' + token
        }
    });

    console.log("AHA");
    var productionTable = $("#production-table").DataTable({
        ajax: {
            url: "/api/productions/",
            type: "GET",
            dataSrc: function (json) {
                console.log(json);
                return json.productions;
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
    });

    $("#production-table tbody").on("click", "tr", function () {
        var data = productionTable.row(this).data();
        console.log(data);
        fetchData(data);
    });
    $("#update-button").on("click", function () {
        updateData()
            .then(() => {
                refreshTable();
            })
            .catch((error) => {
                console.error("Update failed:", error);
            });
    });
    $("#delete-button").on("click", function () {
        deleteData()
            .then(() => {
                refreshTable();
            })
            .catch((error) => {
                console.error("Deletion failed:", error);
            });
    });
    $("#saveChanges").on("click", function () {
        closeModal();
        selectedModal();
    });
    $("#saveChangesWorkforce").on("click", function () {
        closeModal2();
        selectedModal2();
        populateWorkforce(selectedWorkforces);
    });

    $("#pilih-machine").on("click", function () {
        populateMachine(selectedMachines);
    });
    $("#pilih-workforce").on("click", function () {
        populateWorkforce(selectedWorkforces);
    });

    function refreshTable() {
        productionTable.ajax.reload(null, false);
    }
});

function fetchData(Data) {
    console.log(Data);
    document.getElementById("ID").value = "ID: " + Data.id;
    $('#productName').val(Data.product_id).trigger('change');
    $('#projectName').val(Data.project_id).trigger('change');
    changeTextColor();
    selectedId = Data.id;
    selectedModal();
    selectedModal2();
    selectedMachines=[];
    Data.machines.forEach(machine => {
        addToSelectedMachines(
            machine.id,
            machine.name,
            machine.machinestatus.name,
            machine.machineuse.name,
        );
    });
    selectedWorkforces=[];
    Data.workforces.forEach(workforce => {
        addToSelectedWorkforces(
            workforce.id,
            workforce.name,
            workforce.workforcestatus.name,
            workforce.workforceposition.name,
        );
    });
    $("#machines-table .machine-checkbox").each(function() {
        var machineId = parseInt($(this).val(), 10);
        var isChecked = selectedMachines.some(machine => machine.id === machineId);
        $(this).prop('checked', isChecked);
    });

    // Pre-check checkboxes in the workforce modal
    $("#workforces-table .workforce-checkbox").each(function() {
        var workforceId = parseInt($(this).val(), 10);
        var isChecked = selectedWorkforces.some(workforce => workforce.id === workforceId);
        $(this).prop('checked', isChecked);
    });
}

function clearForm() {
    document.getElementById("ID").value = "";
    document.getElementById("productName").value = "";
    document.getElementById("projectName").value = "";

    $('#productName').val(0).trigger('change');
    $('#projectName').val(0).trigger('change');

    selectedMachines = [];
    selectedWorkforce = [];
    tableWorkforce.clear().draw();
    tableMachine.clear().draw();
}

function updateData() {
    return new Promise((resolve, reject) => {
        event.preventDefault();
        if (selectedId) {
            const productName = document.getElementById("productName").value;
            const projectName = document.getElementById("projectName").value;

            if (!productName || !projectName) {
                alert("All fields must be filled out.");
                return reject(new Error("All fields must be filled out."));
            }

            const data = {
                product_id: productName,
                project_id: projectName,
                machines: selectedMachines.map(machine => ({
                    id: machine.id,
                    name: machine.name,
                    status_id: machine.status_id,
                    use_id: machine.use_id
                })),
                workforces: selectedWorkforces.map(workforce => ({
                    id: workforce.id,
                    name: workforce.name,
                    status_id: workforce.status_id,
                    position_id: workforce.position_id
                }))
            };
            console.log(data, selectedId);

            fetch(`/api/productions/${selectedId}`, {
                method: "PUT",
                headers: {
                    "Content-Type": "application/json",
                    'Authorization': `Bearer ${token}`
                },
                body: JSON.stringify(data),
            })
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Failed to update production item");
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
            console.error("No item selected for update");
            reject(new Error("No item selected for update"));
        }
    });
}

// function createItem() {
//     return new Promise((resolve, reject) => {
//         event.preventDefault();

//         const catalogName = document.getElementById("catalogName").value;
//         const customerName = document.getElementById("customerName").value;
        
//         if (catalogName === "Select a customer") {
//             alert("Customer name cannot be blank");
//             return reject(new Error("Customer name cannot be blank"));
//         }
//         if (customerName === "Total") {
//             alert("Total price cannot be blank");
//             return reject(new Error("Total price cannot be blank"));
//         }

//         const requestBody = {
//             catalog_id: catalogName,
//             customer_id: customerName,
//             items: selectedItems,
//         };

//         console.log(requestBody);
//         fetch(`/api/order`, {
//             method: "POST",
//             headers: {
//                 "Content-Type": "application/json",
//                 'Authorization': `Bearer ${token}`
//             },
//             body: JSON.stringify(requestBody),
//         })
//             .then((response) => {
//                 if (!response.ok) {
//                     throw new Error("Failed to create Transaction Archive");
//                 }
//                 return response.json();
//             })
//             .then((data) => {
//                 console.log(data.id);
//                 resolve(data.id);
//             })
//             .catch((error) => {
//                 console.error("Error:", error);
//                 reject(error);
//             });
//     });
// }

function deleteData() {
    return new Promise((resolve, reject) => {
        event.preventDefault();
        if (selectedId) {
            fetch(`/api/productions/${selectedId}`, {
                method: "DELETE",
                headers: {
                    "Content-Type": "application/json",
                    'Authorization': `Bearer ${token}`
                },
            })
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Failed to delete Machine");
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
            console.error("No Machine selected for deletion");
            reject(new Error("No Machine selected for deletion"));
        }
    });
}

$(document).ready(function () {
    console.log("AHA");
    var machineTable = $("#machines-table").DataTable({
        ajax: {
            url: "/api/machine/",
            type: "GET",
            dataSrc: function (json) {
                console.log(json);
                return json.machines;
            },
        },
        columns: [
            { data: "id" },
            { data: "name" },
            { data: "machinestatus.name" },
            { data: "machineuse.name" },
            {
                data: null,
                render: function (data, type, row) {
                    return `<input type="checkbox" class="machine-checkbox" value="${row.id}" />`;
                },
            },
        ],
    });

    var workforceTable = $("#workforces-table").DataTable({
        ajax: {
            url: "/api/workforce/",
            type: "GET",
            dataSrc: function (json) {
                console.log(json);
                return json.workforces;
            },
        },
        columns: [
            { data: "id" },
            { data: "name" },
            { data: "workforcestatus.name" },
            { data: "workforceposition.name" },
            {
                data: null,
                render: function (data, type, row) {
                    return `<input type="checkbox" class="workforce-checkbox" value="${row.id}" />`;
                },
            },
        ],
    });

    $("#pilih-machine").on("click", function () {
        populateMachine(selectedMachines);
        populateWorkforce(selectedWorkforces);
    });

    $(document).on("change", ".workforce-checkbox", function () {
        var row = $(this).closest("tr");
        var id = parseInt(row.find("td:eq(0)").text(), 10);
        var name = row.find("td:eq(1)").text();
        var status = row.find("td:eq(2)").text();
        var position = row.find("td:eq(3)").text();

        var rowData = workforceTable.row(row).data();
        var statusId = rowData.workforcestatus.id;
        var positionId = rowData.workforceposition.id;

        var exists = selectedWorkforces.some(function(workforce) {
            return workforce.id === id;
        });

        if (this.checked && !exists) {
            selectedWorkforces.push({
                id: id,
                name: name,
                status_id: statusId,
                position_id: positionId,
            });
        } else if (!this.checked && exists) {
            selectedWorkforces = selectedWorkforces.filter(function(workforce) {
                return workforce.id !== id;
            });
        }
        
        console.log(selectedWorkforces);
    });

    $(document).on("change", ".machine-checkbox", function () {
        var row = $(this).closest("tr");
        var id = parseInt(row.find("td:eq(0)").text(), 10);
        var name = row.find("td:eq(1)").text();
        var status = row.find("td:eq(2)").text();
        var position = row.find("td:eq(3)").text();

        var rowData = machineTable.row(row).data();
        var statusId = rowData.machinestatus.id;
        var useId = rowData.machineuse.id;

        var exists = selectedMachines.some(function(machine) {
            return machine.id === id;
        });

        if (this.checked && !exists) {
            selectedMachines.push({
                id: id,
                name: name,
                status_id: statusId,
                use_id: useId,
            });
        } else if (!this.checked && exists) {
            selectedMachines = selectedMachines.filter(function(machine) {
                return machine.id !== id;
            });
        }
        
        console.log(selectedMachines);
    });
});


$(document).ready(function () {
    tableMachine = $("#selectedItemsTable").DataTable({
        columns: [
            { title: "ID" },
            { title: "Name" },
            { title: "Status" },
            { title: "Use" },
            { title: "Action" },
        ],
    });
});

$(document).ready(function () {
    tableWorkforce = $("#selectedWorkforceTable").DataTable({
        columns: [
            { title: "ID" },
            { title: "Name" },
            { title: "Status" },
            { title: "Position" },
            { title: "Action" },
        ],
    });
});

function populateMachine(items) {
    console.log(items);
    items.sort((a, b) => a.id - b.id);
    tableMachine.clear();
    const addedItemlIds = new Set();

    items.forEach(function (item) {
        if (!addedItemlIds.has(item.id)) {
            var newRow = [
                item.id,
                item.name,
                item.status_id,
                item.use_id,
                '<button type="button" class="btn btn-danger" onclick="removeFromCartMachine(this)">Remove</button>',
            ];
            tableMachine.row.add(newRow).draw();
            addedItemlIds.add(item.id);
        }
    });
}

function populateWorkforce(items) {
    console.log(items);
    items.sort((a, b) => a.id - b.id);
    tableWorkforce.clear();
    const addedItemlIds = new Set();

    items.forEach(function (item) {
        if (!addedItemlIds.has(item.id)) {
            var newRow = [
                item.id,
                item.name,
                item.status_id,
                item.position_id,
                '<button type="button" class="btn btn-danger" onclick="removeFromCartWorkforce(this)">Remove</button>',
            ];

            tableWorkforce.row.add(newRow).draw();
            addedItemlIds.add(item.id);
        }
    });
}

function addToMachineCart(button) {
    var row = button.closest("tr");
    var id = parseInt(row.cells[0].innerText, 10);
    var name = row.cells[1].innerText;
    var status = row.cells[2].innerText;
    var use = row.cells[3].innerText;

    var exists = selectedMachines.some(function(machine) {
        return machine.id === id;
    });

    if (!exists) {
        selectedMachines.push({
            id: id,
            name: name,
            status_id: status,
            use_id: use,
        });
    }
    
    console.log(selectedMachines);
    populateMachine(selectedMachines);
}

function addToWorkforceCart(button) {
    var row = button.closest("tr");
    var id = parseInt(row.cells[0].innerText, 10);
    var name = row.cells[1].innerText;
    var status = row.cells[2].innerText;
    var use = row.cells[3].innerText;

    var exists = selectedWorkforces.some(function(workforce) {
        return workforce.id === id;
    });

    if (!exists) {
        selectedWorkforces.push({
            id: id,
            name: name,
            status_id: status,
            position_id: use,
        });
    }
    
    console.log(selectedWorkforces);
    populateWorkforce(selectedWorkforces);
}

function removeFromCartMachine(button) {
    var row = button.closest("tr");
    if (!row) {
        return;
    }
    var itemId = parseInt(row.cells[0].innerText);

    selectedMachines = selectedMachines.filter(function (item) {
        return item.id !== itemId;
    });

    row.remove();
    console.log(selectedMachines);
}

function removeFromCartWorkforce(button) {
    var row = button.closest("tr");
    if (!row) {
        return;
    }
    var itemId = row.cells[0].innerText;
    
    selectedWorkforces = selectedWorkforces.filter(function (item) {
        return item.id !== itemId;
    });

    row.remove();
    console.log(selectedWorkforces);
}

function addToSelectedMachines(
    id,
    name,
    status,
    use,
) {
    selectedMachines.push({
        id: id,
        name: name,
        status_id: status,
        use_id: use,
    });
    console.log(selectedMachines);
}

function addToSelectedWorkforces(
    id,
    name,
    status,
    position,
) {
    selectedWorkforces.push({
        id: id,
        name: name,
        status_id: status,
        position_id: position,
    });
    console.log(selectedWorkforces);
}

function closeModal() {
    $("#machineModal").modal("hide");
}
function closeModal2() {
    $("#workforceModal").modal("hide");
}

function selectedModal() {
    selectedMachinesTemp = JSON.parse(JSON.stringify(selectedMachines));
}
function selectedModal2() {
    selectedWorkforcesTemp = JSON.parse(JSON.stringify(selectedWorkforces));
}


function revertModal() {
    selectedMachines = JSON.parse(JSON.stringify(selectedMachinesTemp));
}
function revertModal2() {
    selectedWorkforces = JSON.parse(JSON.stringify(selectedWorkforcesTemp));
}

function clearDefaultValue(input) {
    if (input.value == 0) {
        input.value = "";
    }
}

$(document).ready(function () {
    $("#productName").select2({
        placeholder: "Select a product",
        allowClear: true,
    });
    $("#projectName").select2({
        placeholder: "Select a project",
        allowClear: true,
    });
});
