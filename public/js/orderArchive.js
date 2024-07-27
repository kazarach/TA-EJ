let selectedId;
let selectedTransaction = [];
let tableItem;
var discount = 0;
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
        $(this).attr('href', 'javascript:void(0);');
        $(this).on('click', function() {
            navigateTo(targetUrl);
        });
    });


    
    var transactionTable = $('#transaction-table').DataTable({
        ajax: {
            url: '/api/order',
            type: 'GET',
            dataSrc: function (json) {
                var transformedData = [];
                console.log(json);

                json.orders.forEach(function (order) {
                    var product = order.products;
                    transformedData.push({
                        order_id: order.id,
                        catalog_name: order.catalogs.name,
                        due_date: order.catalogs.due_date,
                        customer_name: order.customers.name,
                        quantity: order.quantity,
                        product_name: product.name,
                        code: product.code,
                        size: product.size.name,
                        color: product.color.name,
                        sign: product.sign.name
                    });
                });

                return transformedData;
            }
        },
        columns: [
            { data: "order_id", title: "Order ID" },
            { data: "catalog_name", title: "Catalog Name" },
            { data: "due_date", title: "Due Date" },
            { data: "customer_name", title: "Customer Name" },
            { data: "quantity", title: "Quantity" },
            { data: "product_name", title: "Product Name" },
            { data: "code", title: "Code" },
            { data: "size", title: "Size" },
            { data: "color", title: "Color" },
            { data: "sign", title: "Sign" }
        ]
    });


    function refreshTable() {
        transactionTable.ajax.reload(null, false);
    }
    $("#update-button").on("click", function () {
        updateData()
            .then(() => {
                refreshTable();
                clearForm();
            })
            .catch((error) => {
                console.error("Update failed:", error);
            });
    });
    $("#create-button").on("click", function () {
        createData()
            .then(() => {
                refreshTable();
                clearForm();
            })
            .catch((error) => {
                console.error("Creation failed:", error);
            });
    });
    $("#delete-button").on("click", function () {
        deleteData()
            .then(() => {
                refreshTable();
                clearForm();
            })
            .catch((error) => {
                console.error("Deletion failed:", error);
            });
    });

    $("#transaction-table tbody").on("click", "tr", function () {
        var data = transactionTable.row(this).data();
        selectedId = data.order_id;
        fetchData(data.order_id);
    });
});


function fetchData(Id) {
    console.log("FETCH");

    selectedId = Id;
    // const token = localStorage.getItem('access_token');
    fetch(`/api/order/${Id}`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': `Bearer ${token}`
        }
    })
        .then((response) => response.json())
        .then((Data) => {
            console.log(Data);
            document.getElementById("ID").value = "ID: " + Data.id;
            $('#catalogName').val(Data.catalog_id).trigger('change');
            $('#customerName').val(Data.customer_id).trigger('change');
            $('#product').val(Data.product_id).trigger('change');
            document.getElementById("quantity").value = Data.quantity;
            changeTextColor();
        })

        .catch((error) => console.error("Error fetching Machine data:", error));
}

// function changeTextColor() {
//     var inputControl = document.querySelectorAll(".form-control");
//     var inputSelect = document.querySelectorAll(".form-select");

//     inputControl.forEach(function (field) {
//         field.style.color = "black";
//     });
//     inputSelect.forEach(function (field) {
//         field.style.color = "black";
//     });
// }

function clearForm() {
    document.getElementById("ID").value ="";
    document.getElementById("catalogName").value = "";
    document.getElementById("customerName").value = "";
    document.getElementById("product").value = "";
    document.getElementById("quantity").value = "";

    $('#product').val(0).trigger('change');
    $('#catalogName').val(0).trigger('change');
    $('#customerName').val(0).trigger('change');
    // changeTextColor();
}

function updateData() {
    return new Promise((resolve, reject) => {
        event.preventDefault();
        if (selectedId) {
            const catalogName = document.getElementById("catalogName").value;
            const customerName = document.getElementById("customerName").value;
            const product = document.getElementById("product").value;
            const quantity = document.getElementById("quantity").value;

            if (catalogName === "Select a customer") {
                alert("Customer name cannot be blank");
                return reject(new Error("Customer name cannot be blank"));
            }
            if (customerName === "Select a customer") {
                alert("Customer name cannot be blank");
                return reject(new Error("Customer name cannot be blank"));
            }
            if (product === "Total") {
                alert("Total cannot be blank");
                return reject(new Error("Total cannot be blank"));
            }
            if (quantity === "Total") {
                alert("Total cannot be blank");
                return reject(new Error("Total cannot be blank"));
            }

            const Data = {
                catalog_id: catalogName,
                customer_id: customerName,
                product_id: product,
                quantity: quantity,
            };
            console.log(Data,selectedId);
            fetch(`/api/order/${selectedId}`, {
                method: "PUT",
                headers: {
                    "Content-Type": "application/json",
                    'Authorization': `Bearer ${token}`
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

function deleteData() {
    return new Promise((resolve, reject) => {
        event.preventDefault();
        if (selectedId) {
            fetch(`/api/order/${selectedId}`, {
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
    $("#product").select2({
        placeholder: "Select a product",
        allowClear: true,
    });
});

document.getElementById("catalogName").value = "";
    document.getElementById("customerName").value = "";
    document.getElementById("product").value = "";