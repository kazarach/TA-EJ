let selectedMaterialId;

$(document).ready(function () {
    // Initialize the DataTable
    var materialTable = $("#materials-table").DataTable({
        ajax: {
            url: "/api/materials/", // Change this to your actual endpoint
            type: "GET",
            dataSrc: function (json) {
                return json.materials;
            },
        },
        columns: [
            { data: "id" },
            { data: "name" },
            { data: "stock" },
            { data: "reserved" },
            { data: "materialunit.name" },
            { data: "materialcategory.name" },
            { data: "code" },
            {
                data: "purchase_price",
                render: function (data, type, row) {
                    return data
                        .toString()
                        .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                },
            },
        ],
    });

    function refreshTable() {
        materialTable.ajax.reload(null, false); // User paging is not reset on reload
    }
    $("#update-button").on("click", function () {
        updateMaterial()
            .then(() => {
                refreshTable(); // Refresh the table after updateMaterial is successful
            })
            .catch((error) => {
                console.error("Update failed:", error);
            });
    });
    $("#create-button").on("click", function () {
        createMaterial()
            .then(() => {
                refreshTable(); // Refresh the table after createMaterial is successful
            })
            .catch((error) => {
                console.error("Creation failed:", error);
            });
    });
    $("#delete-button").on("click", function () {
        deleteMaterial()
            .then(() => {
                refreshTable(); // Refresh the table after deleteMaterial is successful
            })
            .catch((error) => {
                console.error("Deletion failed:", error);
            });
    });

    $("#materials-table tbody").on("click", "tr", function () {
        var data = materialTable.row(this).data();
        fetchMaterialData(data.id);
    });
});

function fetchMaterialData(materialId) {
    fetch(`/api/materials/${materialId}`)
        .then((response) => response.json())
        .then((materialData) => {
            document.getElementById("ID").value = "ID: " + materialData.id;
            document.getElementById("materialName").value = materialData.name;
            document.getElementById("materialStock").value = materialData.stock;
            $('#materialUnit').val(materialData.unit_id).trigger('change');
            $('#materialCategory').val(materialData.category_id).trigger('change');
            document.getElementById("materialCode").value = materialData.code;
            document.getElementById("materialPurchasePrice").value =
                materialData.purchase_price;
            changeTextColor();
        })
        .catch((error) =>
            console.error("Error fetching Material data:", error)
        );
}

function clearForm() {
    document.getElementById("ID").value = "";
    document.getElementById("materialName").value = "";
    document.getElementById("materialStock").value = "";
    document.getElementById("materialUnit").value = "";
    document.getElementById("materialCategory").value = "";
    document.getElementById("materialCode").value = "";
    document.getElementById("materialPurchasePrice").value = "";

    $('#materialUnit').val(0).trigger('change');
    $('#materialCategory').val(0).trigger('change');
}

function createMaterial() {
    return new Promise((resolve, reject) => {
        event.preventDefault();
        const materialName = document.getElementById("materialName").value;
        const materialStock = document.getElementById("materialStock").value;
        const materialUnit = document.getElementById("materialUnit").value;
        const materialCategory =
            document.getElementById("materialCategory").value;
        const materialCode = document.getElementById("materialCode").value;
        const materialPurchasePrice = document.getElementById(
            "materialPurchasePrice"
        ).value;

        if (materialName === "Nama") {
            alert("Material name cannot be blank");
            return reject(new Error("Material name cannot be blank"));
        }
        if (materialUnit === "Unit") {
            alert("Material unit cannot be blank");
            return reject(new Error("Material unit cannot be blank"));
        }
        if (materialCategory === "Kategori") {
            alert("Material category cannot be blank");
            return reject(new Error("Material category cannot be blank"));
        }
        if (materialCode === "Kode") {
            alert("Material code cannot be blank");
            return reject(new Error("Material code cannot be blank"));
        }
        if (!materialPurchasePrice || materialPurchasePrice == 0) {
            alert("Material purchase price cannot be zero or blank");
            return reject(
                new Error("Material purchase price cannot be zero or blank")
            );
        }
        if (!materialStock || materialStock == 0) {
            alert("Material stock cannot be zero or blank");
            return reject(new Error("Material stock cannot be zero or blank"));
        }

        const materialData = {
            name: materialName,
            stock: materialStock,
            unit_id: materialUnit,
            category_id: materialCategory,
            code: materialCode,
            purchase_price: materialPurchasePrice,
        };

        fetch(`/api/materials`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(materialData),
        })
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Failed to create material");
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

function updateMaterial() {
    return new Promise((resolve, reject) => {
        event.preventDefault();
        if (selectedMaterialId) {
            const materialName = document.getElementById("materialName").value;
            const materialStock =
                document.getElementById("materialStock").value;
            const materialUnit = document.getElementById("materialUnit").value;
            const materialCategory =
                document.getElementById("materialCategory").value;
            const materialCode = document.getElementById("materialCode").value;
            const materialPurchasePrice = document.getElementById(
                "materialPurchasePrice"
            ).value;

            if (materialName === "Nama") {
                alert("Material name cannot be blank");
                return reject(new Error("Material name cannot be blank"));
            }
            if (materialUnit === "Unit") {
                alert("Material unit cannot be blank");
                return reject(new Error("Material unit cannot be blank"));
            }
            if (materialCategory === "Kategori") {
                alert("Material category cannot be blank");
                return reject(new Error("Material category cannot be blank"));
            }
            if (materialCode === "Kode") {
                alert("Material code cannot be blank");
                return reject(new Error("Material code cannot be blank"));
            }
            if (!materialPurchasePrice || materialPurchasePrice == 0) {
                alert("Material purchase price cannot be zero or blank");
                return reject(
                    new Error("Material purchase price cannot be zero or blank")
                );
            }
            if (!materialStock || materialStock == 0) {
                alert("Material stock cannot be zero or blank");
                return reject(
                    new Error("Material stock cannot be zero or blank")
                );
            }

            const materialData = {
                name: materialName,
                stock: materialStock,
                unit_id: materialUnit,
                category_id: materialCategory,
                code: materialCode,
                purchase_price: materialPurchasePrice,
            };
            fetch(`/api/materials/${selectedMaterialId}`, {
                method: "PUT",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify(materialData),
            })
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Failed to update material");
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
            console.error("No Material selected for update");
            reject(new Error("No Material selected for update"));
        }
    });
}

function deleteMaterial() {
    return new Promise((resolve, reject) => {
        event.preventDefault();
        if (selectedMaterialId) {
            fetch(`/api/materials/${selectedMaterialId}`, {
                method: "DELETE",
            })
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Failed to delete Material");
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
            console.error("No Material selected for deletion");
            reject(new Error("No Material selected for deletion"));
        }
    });
}

// searchbar
$(document).ready(function () {
    $("#materialUnit").select2({
        placeholder: "Select Unit",
        allowClear: true,
    });
    $("#materialCategory").select2({
        placeholder: "Select Category",
        allowClear: true,
    });
});