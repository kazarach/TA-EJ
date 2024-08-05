@extends('layouts/main', ['pagetitle'=>'Dashboard'])

@section('container')
<div class="container-cs">
    <div class="top-bar">
        <div class="header-wrapper">
            <div class="header-title">
                <h2>Dashboard</h2>
            </div>
            <div class="user-info">
                <!-- <img src="image2.jpg" alt=""> -->
            </div>
        </div>
    </div>  

    <title>Dashboard Penjualan</title>
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->
    
    <style>
        .table-container {
            width: 100%; /* Menyesuaikan lebar tabel */
            border-radius: 10px;
        }
        .chart-container {
            width: 100%; /* Menyesuaikan lebar grafik */
            height: 300px;
        }
        .chart-container canvas {
            width: 100% !important;
            height: 300px !important;
        }
        .container {
            background-color: white;
            border-radius: 10px;
        }
        .chart-container{
            background-color: white;
            border-radius: 10px;
        }
    </style>

    <div class="row row-cols-3 row-cols-md-4 g-3">
        <div class="col">
            <div class="container">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Produk</th>
                                <th>Jumlah Pesanan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="sales-table-body">
                            <!-- Data dari database akan dimasukkan di sini -->
                        </tbody>
                    </table>             
                </div>
                </div>
                <div class="col">
                <div class="container">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pesanan</th>
                                <th>Jumlah Penjualan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="order-table-body">
                            <!-- Data dari database akan dimasukkan di sini -->
                        </tbody>
                    </table>
                </div> 
                </div>
        <div class="col">
            <div class="container">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Mesin</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="machine-table-body">
                            <!-- Data dari database akan dimasukkan di sini -->
                        </tbody>
                    </table>
                </div>
        </div>
        <div class="col">
            <div class="container">
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Karyawan</th>
                            <th>status</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
        <div class="row row-cols-md-3 g-3">
            <div class="col">
                <div class="chart-container">
                    <canvas id="sales-chart"></canvas>
                </div>
            </div>
            <div class="col">
                <div class="container">
                    <div class="title">income</div>
                </div>
            </div>
            <div class="col">
                <div class="container">
                    <div class="title">outcome</div>

                </div>
            </div>
        </div>
        <div class="row row-cols-3 row-cols-md-4 g-3">
            <div class="col">
                <div class="container">
                    
                </div>
            </div>
        </div>
</div>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" nonce="{{ $nonce }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js" nonce="{{ $nonce }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js" nonce="{{ $nonce }}"></script>
  <script src="/js/dashboard.js" nonce="{{ $nonce }}"></script>
  
</html>
@endsection