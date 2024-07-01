let selectedId;
var selectedMachines = [];
var selectedWorkforces = [];
var tableMachine;
var tableWorkforce;


$(document).ready(function () {
    console.log("AHA");
    var productionTable = $("#production-table").DataTable({
        ajax: {
            url: "/api/rejectedproduct/",
            type: "GET",
            dataSrc: function (json) {
                console.log(json);
                return json.returns;
            },
        },
        columns: [
            { data: "id" },
            { data: "products.name" },
            { data: "itemgrades.name" },
            { data: "quantity" },
            { data: "products.size.name" },
            { data: "products.color.name" },
            { data: "products.code" },
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
    $("#saveChangesMachine").on("click", function () {
        closeModal();
        selectedModal();
        populateMachine(selectedMachines);
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
    $('#gradeName').val(Data.grade_id).trigger('change');
    changeTextColor();
    selectedId = Data.id;
}

function clearForm() {
    document.getElementById("ID").value = "";
    document.getElementById("productName").value = "";
    document.getElementById("gradeName").value = "";

    $('#productName').val(0).trigger('change');
    $('#gradeName').val(0).trigger('change');

}

function updateData() {
    return new Promise((resolve, reject) => {
        event.preventDefault();
        if (selectedId) {
            const productName = document.getElementById("productName").value;
            const gradeName = document.getElementById("gradeName").value;
            const quantity = document.getElementById("quantity").value;

            if (productName === "Select a product") {
                alert("Customer name cannot be blank");
                return reject(new Error("Customer name cannot be blank"));
            }
            if (gradeName === "Select a grade") {
                alert("Customer name cannot be blank");
                return reject(new Error("Customer name cannot be blank"));
            }
            if (quantity === 0||"0") {
                alert("Quantity name cannot be blank");
                return reject(new Error("Customer name cannot be blank"));
            }

            const Data = {
                product_id: productName,
                grade_id: gradeName,
                quantity: quantity,
            };
            console.log(Data,selectedId);
            fetch(`/api/order/${selectedId}`, {
                method: "PUT",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify(Data),
            })
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Failed to update Machine");
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

function createItem() {
    return new Promise((resolve, reject) => {
        event.preventDefault();

        const catalogName = document.getElementById("catalogName").value;
        const customerName = document.getElementById("customerName").value;
        
        if (catalogName === "Select a customer") {
            alert("Customer name cannot be blank");
            return reject(new Error("Customer name cannot be blank"));
        }
        if (customerName === "Total") {
            alert("Total price cannot be blank");
            return reject(new Error("Total price cannot be blank"));
        }

        const requestBody = {
            catalog_id: catalogName,
            customer_id: customerName,
            items: selectedItems,
        };

        console.log(requestBody);
        fetch(`/api/order`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(requestBody),
        })
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Failed to create Transaction Archive");
                }
                return response.json();
            })
            .then((data) => {
                console.log(data.id);
                resolve(data.id);
            })
            .catch((error) => {
                console.error("Error:", error);
                reject(error);
            });
    });
}

function deleteData() {
    return new Promise((resolve, reject) => {
        event.preventDefault();
        if (selectedId) {
            fetch(`/api/rejectedproduct/${selectedId}`, {
                method: "DELETE",
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
                    return `<button type="button" id="addItem" class="btn btn-primary" onclick="addToMachineCart(this)">Add</button>`;
                },
            },
        ],
    });

    $("#pilih-machine").on("click", function () {
        populateMachine(selectedMachines);
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
    var itemId = row.cells[0].innerText;

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
    $(".form-select").select2({
        placeholder: "Select a category",
        allowClear: true,
    });
});

