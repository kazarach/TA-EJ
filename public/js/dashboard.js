//document.addEventListener("DOMContentLoaded", function () {
/*fetch("http://localhost:5000/api/penjualan") // Gantilah URL ini dengan endpoint API Anda
        .then((response) => response.json())
        .then((data) => {
            const tableBody = document.getElementById("sales-table-body");
            const labels = [];
            const chartData = [];
            data.forEach((item, index) => {
                // Tambahkan data ke tabel
                const row = document.createElement("tr");
                row.innerHTML = `
            <td>${index + 1}</td>
            <td>${item.produk}</td>
            <td>${item.jumlah_penjualan}</td>
            <td>${item.status}</td>
          `;
                tableBody.appendChild(row);

                // Tambahkan data ke chart
                labels.push(item.produk); // Menggunakan nama produk sebagai label x
                chartData.push(item.jumlah_penjualan);
            });

            // Inisialisasi grafik batang menggunakan Chart.js
            const ctx = document.getElementById("sales-chart").getContext("2d");
            new Chart(ctx, {
                type: "bar",
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: "Jumlah Penjualan",
                            data: chartData,
                            backgroundColor: "rgba(75, 192, 192, 0.6)",
                            borderColor: "rgba(75, 192, 192, 1)",
                            borderWidth: 1,
                        },
                    ],
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: "Jumlah Penjualan",
                            },
                        },
                        x: {
                            title: {
                                display: true,
                                text: "Produk",
                            },
                        },
                    },
                },
            });
        })
        .catch((error) => console.error("Error:", error));
});*/

document.addEventListener("DOMContentLoaded", function () {
    const dummyData = [
        { produk: "Produk A", jumlah_penjualan: 100, status: "Terjual" },
        { produk: "Produk B", jumlah_penjualan: 150, status: "Terjual" },
        { produk: "Produk C", jumlah_penjualan: 200, status: "Pending" },
        { produk: "Produk D", jumlah_penjualan: 50, status: "Terjual" },
        { produk: "Produk E", jumlah_penjualan: 300, status: "Pending" },
    ];

    const tableBody = document.getElementById("sales-table-body");
    const labels = [];
    const chartData = [];
    dummyData.forEach((item, index) => {
        // Tambahkan data ke tabel
        const row = document.createElement("tr");
        row.innerHTML = `
        <td>${index + 1}</td>
        <td>${item.produk}</td>
        <td>${item.jumlah_penjualan}</td>
        <td>${item.status}</td>
      `;
        tableBody.appendChild(row);

        // Tambahkan data ke chart
        labels.push(item.produk); // Menggunakan nama produk sebagai label x
        chartData.push(item.jumlah_penjualan);
    });

    // Inisialisasi grafik batang menggunakan Chart.js
    const ctx = document.getElementById("sales-chart").getContext("2d");
    new Chart(ctx, {
        type: "bar",
        data: {
            labels: labels,
            datasets: [
                {
                    label: "Jumlah Penjualan",
                    data: chartData,
                    backgroundColor: "rgba(75, 192, 192, 0.6)",
                    borderColor: "rgba(75, 192, 192, 1)",
                    borderWidth: 1,
                },
            ],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: "",
                    },
                },
                x: {
                    title: {
                        display: true,
                        text: "Produk",
                    },
                },
            },
        },
    });
});
// kalau mau nyambungin data base pake yang paling atas

//js buat tabel order
document.addEventListener("DOMContentLoaded", () => {
    function fetchOrders() {
        fetch("fetch_orders.php")
            .then((response) => response.json())
            .then((data) => {
                const tableBody = document.getElementById("order-table-body");
                tableBody.innerHTML = ""; // Clear any existing rows

                data.forEach((order, index) => {
                    const row = document.createElement("tr");
                    row.innerHTML = `
                        <td>${index + 1}</td>
                        <td>${order.nama_pesanan}</td>
                        <td>${order.jumlah_penjualan}</td>
                        <td>${order.status}</td>
                    `;
                    tableBody.appendChild(row);
                });
            })
            .catch((error) => {
                console.error("Error fetching orders:", error);
            });
    }

    // Fetch orders on page load
    fetchOrders();
});
