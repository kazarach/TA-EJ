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
    // document.getElementById("productName").value = Data.quantity;

    $('#quantity').val(Data.quantity).trigger('change');
    changeTextColor();
    selectedId = Data.id;
}

function clearForm() {
    document.getElementById("ID").value = "";
    document.getElementById("productName").value = "";
    document.getElementById("gradeName").value = "";
    document.getElementById("quantity").value = "";

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
            console.log(quantity);

            if (productName === "Select a product") {
                alert("Customer name cannot be blank");
                return reject(new Error("Customer name cannot be blank"));
            }
            if (gradeName === "Select a grade") {
                alert("Customer name cannot be blank");
                return reject(new Error("Customer name cannot be blank"));
            }
            if (quantity === "Quantity") {
                alert("Quantity cannot be zero");
                return reject(new Error("Quantity cannot be zero"));
            }


            const Data = {
                product_id: productName,
                grade_id: gradeName,
                quantity: quantity,
            };
            console.log(Data,selectedId);
            fetch(`/api/rejectedproduct/${selectedId}`, {
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

        const requestBody = {
            product_id: productName,
            grade_id: gradeName,
            quantity: quantity,
        };

        console.log(requestBody);
        fetch(`/api/rejectedproduct`, {
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

