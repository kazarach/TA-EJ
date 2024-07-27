let selectedId;
var discount = 0;
var totalHTM = 0;
var selectedItems = [];
let tableSell = $("#selling-table").DataTable();
var tableItem;
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
        $(this).attr('href', 'javascript:void(0);');
        $(this).on('click', function() {
            navigateTo(targetUrl);
        });
    });



    console.log(selectedItems);

    $("#saveChanges").on("click", function () {
        closeModal();
        selectedModal();
        populateItems2(selectedItems);
    });

    $("#saveChangesOut").on("click", function () {
        console.log("Changes saved, updated selectedItems:", selectedItems);
        populateItems2(selectedItems);
    });

    $("#create-button").on("click", function () {
        createItem()
            .then(() => {
                clearForm();
            })
            .catch((error) => {
                console.error("Update failed:", error);
            });
    });

    $.ajax({
        url: "/api/order",
        method: "GET",
        success: function (data) {
            console.log("API Response:", data); // Log the JSON data
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error(
                "There was a problem with the ajax request:",
                textStatus,
                errorThrown
            );
            console.error("Response text:", jqXHR.responseText);
        },
    });
});

function clearForm() {
    document.getElementById("ID").value = "";
    document.getElementById("catalogName").value = "";
    document.getElementById("customerName").value = "";

    document.getElementById("catalogName").selectedIndex = 0;
    document.getElementById("customerName").selectedIndex = 0;
    selectedItems = [];
    console.log(selectedItems);
    tableSell.clear().draw();
    tableItem.clear().draw();
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


//PRODUCT PRODUCT PRODUCT
$(document).ready(function () {
    console.log("AHA");
    var productTable = $("#products-table").DataTable({
        ajax: {
            url: "/api/products/", // Change this to your actual endpoint
            type: "GET",
            dataSrc: function (json) {
                console.log(json);
                return json.products;
            },
        },
        columns: [
            { data: "id" },
            { data: "name" },
            { data: "size.name" },
            { data: "code" },
            { data: "color.name" },
            { data: "sign.name" },
            {
                data: null,
                render: function (data, type, row) {
                    return `<input type="number" class="form-control quantity" value="0" onfocus="clearDefaultValue(this)" />`;
                },
            },
            {
                data: null,
                render: function (data, type, row) {
                    return `<button type="button" id="addItem" class="btn btn-primary" onclick="addToCart(this)">Add</button>`;
                },
            },
        ],
    });

    $("#pilih-product").on("click", function () {
        populateItems(selectedItems);
    });
});

$(document).ready(function () {
    tableItem = $("#selectedItemsTable").DataTable({
        columns: [
            { title: "ID" },
            { title: "Name" },
            { title: "Size" },
            { title: "Code" },
            { title: "Color" },
            { title: "Sign" },
            { title: "Quantity" },
            { title: "Action" },
        ],
    });
});

function populateItems(items) {
    console.log(items);
    items.sort((a, b) => a.id - b.id);
    tableItem.clear();

    const addedItemlIds = new Set();

    items.forEach(function (item) {
        if (!addedItemlIds.has(item.product_id)) {
            var quantity = parseInt(item.quantity);
            var total = item.price * quantity;
            var afterDiscount = total * ((100 - discount) / 100);
            var newRow = [
                item.product_id,
                item.name,
                item.size,
                item.code,
                item.color,
                item.sign,
                '<input type="number" class="form-control quantity" value="' +
                    quantity +
                    '" onchange="updateQuantity(this);">',
                '<button type="button" class="btn btn-danger" onclick="removeFromCart(this)">Remove</button>',
            ];

            tableItem.row.add(newRow).draw();
            addedItemlIds.add(item.product_id);
        }
    });

    // calculateTotalHTM();
}

function populateItems2(items) {
    console.log(items);
    items.sort((a, b) => a.id - b.id);
    tableSell.clear();

    const addedItemlIds = new Set();

    items.forEach(function (item) {
        if (!addedItemlIds.has(item.product_id)) {
            var quantity = parseInt(item.quantity);
            var total = item.price * quantity;
            var afterDiscount = total * ((100 - discount) / 100);
            var newRow = [
                item.product_id,
                item.name,
                item.size,
                item.code,
                item.color,
                item.sign,
                '<input type="number" class="form-control quantity" value="' +
                    quantity +
                    '" onchange="updateQuantity(this);">',
                '<button type="button" class="btn btn-danger" onclick="removeFromCart(this)">Remove</button>',
            ];

            tableSell.row.add(newRow).draw();
            addedItemlIds.add(item.product_id);
        }
    });
}

function addToCart(button) {
    var row = button.closest("tr");
    if (!row) {
        return;
    }

    var itemId = row.cells[0].innerText;
    var quantityInput = row.querySelector(".quantity");
    var quantity = parseInt(quantityInput.value);

    if (isNaN(quantity) || quantity <= 0) {
        alert("Please enter a valid quantity.");
        return;
    }

    var existingItemIndex = selectedItems.findIndex(function (item) {
        return item.product_id === itemId;
    });

    if (existingItemIndex !== -1) {
        selectedItems[existingItemIndex].quantity += quantity;
    } else {
        var itemName = row.cells[1].innerText;
        var size = row.cells[2].innerText;
        var code = row.cells[3].innerText;
        var color = row.cells[4].innerText;
        var sign = row.cells[5].innerText;

        selectedItems.push({
            product_id: itemId,
            name: itemName,
            size: size,
            code: code,
            color: color,
            sign: sign,
            quantity: quantity,
        });
    }
    quantityInput.value = 0;
    console.log(selectedItems);
    populateItems(selectedItems);
}

function removeFromCart(button) {
    var row = button.closest("tr");
    if (!row) {
        return; // Exit the function if the row is not found
    }

    var itemId = row.cells[0].innerText;

    // Remove the item from selectedItems array
    selectedItems = selectedItems.filter(function (item) {
        return item.product_id !== itemId;
    });

    // Remove the row from the selected items table
    row.remove();
    console.log(selectedItems);
    // calculateTotalHTM();
}

function updateQuantity(input) {
    var row = input.closest("tr");
    if (!row) {
        return; // Exit the function if the row is not found
    }

    var itemId = row.cells[0].innerText;
    var newQuantity = parseInt(input.value);

    // Find the item in selectedMaterials array and update its quantity
    var existingItem = selectedItems.find(function (item) {
        return item.product_id === itemId;
    });

    if (existingItem) {
        // Update the quantity in selectedItems array
        existingItem.quantity = newQuantity;
        // Update the corresponding row in the selected items table
        var selectedRows = document.querySelectorAll("#selectedItemsBody tr");
        for (var i = 0; i < selectedRows.length; i++) {
            if (selectedRows[i].cells[0].innerText === itemId) {
                var quantityInput = selectedRows[i].querySelector(".quantity");
                quantityInput.value = newQuantity; // Update the value of the quantity input field
                break;
            }
        }
    } else {
        console.error("Item not found in selectedItems array.");
    }
}

function closeModal() {
    $("#exampleModal").modal("hide");
}

function selectedModal() {
    selectedItemsTemp = JSON.parse(JSON.stringify(selectedItems));
}

function revertModal() {
    selectedItems = JSON.parse(JSON.stringify(selectedItemsTemp));
    // calculateTotalHTM();
}

//TOTAL TOTAL TOTAL
// function calculateHTM(input) {
//     var row = input.parentNode.parentNode;
//     var price = parseInt(row.cells[4].innerHTML);
//     var quantity = parseInt(input.value);
//     var total = price * quantity;
//     row.cells[6].innerHTML = total;

//     // Calculate the total after discount
//     var totalAfterDiscount = total - total * (discount / 100);
//     row.cells[7].innerHTML = totalAfterDiscount;
// }
// function calculateTotalHTM() {
//     totalHTM = 0;
//     for (let i = 0; i < selectedItems.length; i++) {
//         let htm =
//             selectedItems[i].quantity *
//             parseInt(selectedItems[i].price) *
//             ((100 - discount) / 100);
//         totalHTM += htm;
//     }
//     console.log(totalHTM);
//     document.getElementById("totalHTM").innerText = parseInt(totalHTM);
//     document.getElementById("totalPrice").value = parseInt(totalHTM);
// }

function clearDefaultValue(input) {
    if (input.value == 0) {
        input.value = "";
    }
}

// searchbar
$(document).ready(function () {
    $("#catalogName").select2({
        placeholder: "Select a catalog",
        allowClear: true,
    });
    $("#customerName").select2({
        placeholder: "Select a customer",
        allowClear: true,
    });
});
