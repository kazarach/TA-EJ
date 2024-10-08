let selectedId;
var selectedMachines = [];
var selectedWorkforces = [];
var productionTable = $("#production-table").DataTable();
// var productionDate;
var productionList = [];
var counter=1;
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

    $("#production-table tbody").on("click", "tr", function () {
        var data = productionTable.row(this).data();
        console.log(data);
        fetchData(data);
    });
    $("#saveChanges").on("click", function () {
        closeModal();
        selectedModal();
    });

    $("#produce-button").on("click", function () {
        createItem()
            .then(() => {
                clearForm();
            })
            .catch((error) => {
                console.error("Update failed:", error);
            });
    });
    function refreshTable() {
        productionTable.ajax.reload(null, false);
    }
});

function fetchData(Data) {
    console.log(Data);
    // document.getElementById("ID").value = "ID: " + Data.id;
    document.getElementById("productName").value = Data.name;
    $('#productType').val(Data.type_id).trigger('change');
    $('#productCategory').val(Data.category_id).trigger('change');
    $('#productSize').val(Data.size_id).trigger('change');
    $('#productColor').val(Data.color_id).trigger('change');
    $('#productSign').val(Data.sign_id).trigger('change');
    document.getElementById("productCode").value = Data.code;
    document.getElementById("productPurchasePrice").value = Data.purchase_price;
    document.getElementById("productSellingPrice").value = Data.selling_price;
    document.getElementById("productStock").value = Data.stock;
    changeTextColor();
    selectedProductId = Data;
    selectedModal();
    resetSelectedMachines();
    Data.machines.forEach(machine => {
        addToSelectedMachines(
            machine.id,
            machine.name,
            machine.purchase_price,
            machine.unit.name,
            machine.pivot.quantity
        );
    });
    resetSelectedWorkforces();
    Data.workforces.forEach(workforce => {
        addToSelectedWorkforces(
            workforce.id,
            workforce.name,
            workforce.purchase_price,
            workforce.unit.name,
            workforce.pivot.quantity
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

    console.log()
}

function clearForm() {
    document.getElementById("ID").value = "";
    document.getElementById("productName").value = "";
    document.getElementById("projectName").value = "";
    document.getElementById("quantity").value = "";
    document.getElementById("productionDate").value = "";

    $('#productName').val(0).trigger('change');
    $('#projectName').val(0).trigger('change');

    selectedMachines = [];
    selectedWorkforces = [];

    // Uncheck all machine checkboxes
    $(".machine-checkbox").prop('checked', false);

    // Uncheck all workforce checkboxes
    $(".workforce-checkbox").prop('checked', false);

    productionList = [];
    console.log(selectedMachines);
    console.log(selectedWorkforces);
    console.log(productionList);
    productionTable.clear().draw();
}

function createItem() {
    return new Promise((resolve, reject) => {
        event.preventDefault();

        const requestBody = productionList.map(item => ({
            product_id: parseInt(item.product_id, 10),
            project_id: parseInt(item.project_id, 10),
            quantity: parseInt(item.quantity, 10),
            production_date: item.production_date,
            machines: item.machines,
            workforces: item.workforces,
        }));

        console.log(requestBody);
        fetch(`/api/productions`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                'Authorization': `Bearer ${token}`
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

    $("#add-button").on("click", function(event) {
        event.preventDefault();
        console.log(productionList);
    
        var product_id = $("#productName").val();
        var selectedProduct = $("#productName option:selected");
    
        var productInfo = {
            id: product_id,
            name: selectedProduct.data('name'),
            size: selectedProduct.data('size'),
            code: selectedProduct.data('code'),
            color: selectedProduct.data('color'),
            sign: selectedProduct.data('sign')
        };
    
        var project_id = $("#projectName").val();
        var selectedProject = $("#projectName option:selected");
    
        var projectInfo = {
            id: project_id,
            name: selectedProject.data('name'),
            status: selectedProject.data('status'),
        };
        var quantity = parseInt($("#quantity").val());
        var productionDate = $("#productionDate").val();
    
        if (!product_id || !project_id || isNaN(quantity) || !productionDate) {
            alert("All fields must be filled out.");
            return;
        }
        
        var existingItem = productionList.find(item => item.product_id === product_id && item.project_id === project_id && item.production_date === productionDate);
    
        if (existingItem) {
            // If the item exists, update the quantity and merge machines and workforces
            existingItem.quantity += quantity;
            
            // Merge machines without duplicating
            selectedMachines.forEach(machine => {
                if (!existingItem.machines.some(existingMachine => existingMachine.id === machine.id)) {
                    existingItem.machines.push(machine);
                }
            });
    
            // Merge workforces without duplicating
            selectedWorkforces.forEach(workforce => {
                if (!existingItem.workforces.some(existingWorkforce => existingWorkforce.id === workforce.id)) {
                    existingItem.workforces.push(workforce);
                }
            });
    
            updateTableRow(existingItem);
        } else {
            // If the item does not exist, create a new entry
            console.log(productionList);
            var data = {
                id: counter++,  // Assuming you want to increment the id
                quantity: quantity,
                product_id: product_id,
                product_name: productInfo.name,
                product_size: productInfo.size,
                product_code: productInfo.code,
                product_color: productInfo.color,
                product_sign: productInfo.sign,
                project_id: project_id,
                project_name: projectInfo.name,
                project_status: projectInfo.status,
                production_date: productionDate,
                machines: [...selectedMachines],
                workforces: [...selectedWorkforces]
            };
            console.log(data);
    
            productionList.push(data);
            populateItems(productionList);
            console.log(productionList);
        }
    });
    
    
});

function updateTableRow(item) {
    var row = productionTable.row(function(idx, data, node) {
        return data[1] === item.product_name && 
               data[6] === item.project_name && 
               data[8] === item.production_date; 
    }).node();

    if (row) {
        var quantityInput = $(row).find('.quantity');
        quantityInput.val(item.quantity);
    }
}

function populateItems(items) {
    console.log(items);
    items.sort((a, b) => a.id - b.id);
    productionTable.clear().draw(); // Ensure the table is cleared and redrawn

    let counter = 1; 

    items.forEach(function (item) {
        var machineList = formatMachines(item.machines);
        var workforceList = formatWorkforces(item.workforces);
        var newRow = [
            item.id,
            item.product_name,
            '<input type="number" class="form-control quantity" value="' +
                item.quantity +
                '" onchange="updateQuantity(this, ' + item.product_id + ', ' + item.project_id + ', ' + item.production_date + ');">',
            item.product_size,
            item.product_code,
            item.product_color,
            item.project_name,
            item.project_status,
            item.production_date,
            machineList,
            workforceList,
            '<button type="button" class="btn btn-danger" onclick="removeFromCart(this)">Remove</button>',
        ];

        productionTable.row.add(newRow).draw();

    });
}

function removeFromCart(button) {
    var row = button.closest("tr");
    if (!row) {
        return;
    }

    // var product_id = row.cells[1].innerText;
    // var project_id = row.cells[6].innerText;
    // var production_date = row.cells[8].innerText;
    // console.log(product_id);
    // console.log(project_id);
    // console.log(production_date);
    // // console.log(removeId)

    // productionList = productionList.filter(item =>
    //     (item.product_id !== String(product_id) &&
    //     item.project_id !== String(project_id) &&
    //     item.production_date !== String(production_date))
    // );

    var removeId = row.cells[0].innerText;
    console.log(row);
    productionList = productionList.filter(function (item) {
        console.log(item.id);
        console.log(removeId);

        return item.id !== parseInt(removeId);
    });
    // row.remove();
    console.log(productionList);
    populateItems(productionList);
}

function formatMachines(machines) {
    if (machines.length === 0) return "No machines";
    return machines.map(machine => 
        `<li>
            ${machine.name}
        </li>`).join("");
}

function formatWorkforces(workforces) {
    if (workforces.length === 0) return "No workforces";
    return workforces.map(workforce => 
        `<li>
            ${workforce.name}
        </li>`).join("");
}

$(document).ready(function () {
    $(".datepicker").datepicker({
        dateFormat: "yy-mm-dd",
        onSelect: function () {
            $(this).trigger("change");
        },
    });

    function handleInputChange() {
        var productionDate = $("#productionDate").val();
        console.log(productionDate);
    }

    $("#productionDate").on(
        "change input",
        handleInputChange
    );
});


function updateQuantity(element, productId, projectId, production_Date) {
    var newQuantity = parseInt(element.value);
    if (isNaN(newQuantity) || newQuantity < 0) {
        alert("Please enter a valid quantity.");
        return;
    }

    // Convert the production_Date to string if it's not already
    production_Date = String(production_Date);

    var item = productionList.find(item => 
        item.product_id === String(productId) && 
        item.project_id === String(projectId) &&
        item.production_date === productionDate
    );

    if (item) {
        console.log(item.quantity);
        item.quantity = newQuantity;
        var row = $(element).closest('tr');
    } else {
        console.error("Item with productId " + productId + ", projectId " + projectId + ", and production_Date " + productionDate + " not found.");
    }
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
