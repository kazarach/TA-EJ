let selectedId;
var selectedMachines = [];
var selectedWorkforces = [];
var returnTable = $("#return-table").DataTable();
// var return_date;
var returnList = [];
var counter=1;

$(document).ready(function () {
    $("#saveChanges").on("click", function () {
        closeModal();
        selectedModal();
    });

    $("#return-button").on("click", function () {
        createItem()
            .then(() => {
                clearForm();
            })
            .catch((error) => {
                console.error("Update failed:", error);
            });
    });
    function refreshTable() {
        returnTable.ajax.reload(null, false);
    }
});


function clearForm() {
    document.getElementById("ID").value = "";
    document.getElementById("productName").value = "";
    document.getElementById("categoryName").value = "";
    document.getElementById("quantity").value = "";
    document.getElementById("information").value = "";
    document.getElementById("return_date").value = "";


    $('#productName').val(0).trigger('change');
    $('#categoryName').val(0).trigger('change');

    // selectedMachines = [];
    // selectedWorkforce = [];
    returnList = [];
    console.log(returnList);
    returnTable.clear().draw();
}

function createItem() {
    return new Promise((resolve, reject) => {
        event.preventDefault();

        const requestBody = returnList.map(item => ({
            product_id: parseInt(item.product_id, 10),
            category_id: parseInt(item.category_id, 10),
            quantity: parseInt(item.quantity, 10),
            information: item.information,
            return_date: item.return_date,
        }));

        console.log(requestBody);
        fetch(`/api/returncustomer`, {
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


$(document).ready(function () {
    console.log("AHA");

    $("#add-button").on("click", function(event) {
        event.preventDefault();

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

        var category_id = $("#categoryName").val();
        var selectedCategory = $("#categoryName option:selected");

        var categoryInfo = {
            id: category_id,
            name: selectedCategory.data('name'),
        };
        var quantity = parseInt($("#quantity").val());
        var information = $("#information").val();
        var return_date = $("#return_date").val();


        console.log(information);
        if (!product_id || !category_id || isNaN(quantity) || !information || !return_date) {
            alert("All fields must be filled out.");
            return;
        }
        var existingItem = returnList.find(item => item.product_id === product_id && item.information === information && item.category_id === category_id && item.return_date === return_date
        );

        if (existingItem) {
            existingItem.quantity += quantity;
            console.log(existingItem)
            updateTableRow(existingItem);
        } else {
            var data = {
                id: counter++,
                quantity: quantity,
                product_id: product_id,
                product_name: productInfo.name,
                product_size: productInfo.size,
                product_code: productInfo.code,
                product_color: productInfo.color,
                product_sign: productInfo.sign,
                category_id: category_id,
                category_name: categoryInfo.name,
                information: information,
                return_date: return_date,
            };
            returnList.push(data);
            populateItems(returnList);
            console.log(returnList);
        }
    });
    
});

function updateTableRow(item) {
    var row = returnTable.row(function(idx, data, node) {
        return data[1] === item.product_name && 
               data[6] === item.category_name && 
               data[7] === item.information &&
               data[8] === item.return_date; 
    }).node();

    if (row) {
        var quantityInput = $(row).find('.quantity');
        quantityInput.val(item.quantity);
    }
}

function populateItems(items) {
    console.log(items);
    items.sort((a, b) => a.id - b.id);
    returnTable.clear().draw();

    let counter = 1; 

    items.forEach(function (item) {
        var newRow = [
            item.id,
            item.product_name,
            '<input type="number" class="form-control quantity" value="' +
                item.quantity +
                '" onchange="updateQuantity(this, ' + item.product_id + ', ' + item.category_id + ', ' + item.information +', ' + item.return_date +');">',
            item.product_size,
            item.product_code,
            item.product_color,
            item.category_name,
            item.information,
            item.return_date,
            '<button type="button" class="btn btn-danger" onclick="removeFromCart(this)">Remove</button>',
        ];

        returnTable.row.add(newRow).draw();

    });
}

function removeFromCart(button) {
    var row = button.closest("tr");
    if (!row) {
        return;
    }

    var removeId = row.cells[0].innerText;
    console.log(row);
    returnList = returnList.filter(function (item) {
        console.log(item.id);
        console.log(removeId);

        return item.id !== parseInt(removeId);
    });
    // row.remove();
    console.log(returnList);
    populateItems(returnList);
}


function updateQuantity(element, productId, categoryId, information, return_date) {
    var newQuantity = parseInt(element.value);
    if (isNaN(newQuantity) || newQuantity < 0) {
        alert("Please enter a valid quantity.");
        return;
    }

    return_date = String(return_date);

    var item = returnList.find(item => 
        item.product_id === String(productId) && 
        item.category_id === String(categoryId) &&
        item.information === information &&
        item.return_date === return_date
    );

    if (item) {
        console.log(item.quantity);
        item.quantity = newQuantity;
        var row = $(element).closest('tr');
    } else {
        console.error("Item with productId " + productId + ", categoryId " + categoryId + ", and information " + information + " not found.");
    }
}

$(document).ready(function () {
    $(".datepicker").datepicker({
        dateFormat: "yy-mm-dd",
        onSelect: function () {
            $(this).trigger("change");
        },
    });

    function handleInputChange() {
        var returnDate = $("#returnDate").val();
        console.log(returnDate);
    }

    $("#returnDate").on(
        "change input",
        handleInputChange
    );
});

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
