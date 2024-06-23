@extends('layouts/main')

@section('container')

<div class="container-cs">
    <div class="top-bar">
        <div class="header-wrapper">
            <div class="header-title">
                <h2>Order</h2>
            </div>
            <div class="dropdown-top">
                <a href="/order">Order</a>
                <a href="">|</a>
                <a href="/order/book">Order Book</a>
                <a href="">|</a>
                <a href="/order/archive" class="active">Order Archive</a>
                <a href="">|</a>
                <a href="/customer">Customer</a>
            </div>
            <div class="user-info">
                <img src="../image2.jpg" alt="">
            </div>
        </div>
    </div>  

{{-- form --}}
<section class="form">
  @csrf
    <div class="row g-3 mb-3">
        <div class="col-new">
            <input id="ID" type="text" class="form-control" placeholder="Transaction" aria-label="ID" readonly>
        </div>
    </div>

    <div class="row g-3 mb-3">
        <div class="col">
            <label for="catalogName">Catalog</label>
            <select name="name" id="catalogName" class="form-select" aria-label="Catalog Name">
                <option selected disabled hidden>Select a catalog</option>
                @foreach($catalogs as $catalog)
                <option value="{{ $catalog->id }}">
                    {{ $catalog->name }}
                </option>
                @endforeach 
            </select>
        </div>
    </div>
    <div class="row g-3 mb-3">
        <div class="col">
            <label for="customerName">Customer</label>
            <select name="name" id="customerName" class="form-select" aria-label="Customer Name">
                <option selected disabled hidden>Select a customer</option>
                @foreach($customers as $customer)
                <option value="{{ $customer->id }}">
                    {{ $customer->name }}
                </option>
                @endforeach 
            </select>
        </div>
    </div>
    <div class="row g-3 mb-3">
        <div class="col">
            <label for="product">Product</label>
            <select name="name" id="product" class="form-select" aria-label="Customer Name">
                <option selected disabled hidden>Select a product</option>
                @foreach($products as $product)
                <option value="{{ $product->id }}">
                    {{ $product->name }} ({{ $product->size->name}})
                </option>
                @endforeach 
            </select>
        </div>
    </div>
    <div class="row g-3 mb-3">
        <div class="col">
            <label for="">Quantity</label>
            <input id="quantity" type="text" class="form-control" placeholder="Quantity">
        </div>
    </div>



<div>
    <button type="button" id="update-button" class="btn btn-success">Update</button>
    <button type="button" id="delete-button" class="btn btn-danger">Delete</button>
    <button type="button" onclick="clearForm()" class="btn btn-secondary">Clear Form</button>
</div>

</section>

<div class="filter-container">
    <label for="">Position:
    <select id="position-filter">
        <option selected disabled>All</option>
        <option value="">Potong</option>
        <option value="">Setrika</option>
        <option value="">Jahit</option>
    </select>
    </label>
    <label for="">Status:
    <select id="status-filter">
        <option selected disabled>All</option>
        <option value="">Masuk</option>
        <option value="">Izin</option>
        <option value="">Sakit</option>
        <option value="">Bolos</option>
    </select>
    </label>
</div>

<section class="home-tbl">
    <table id="transaction-table" class="table table-striped table-hover" style="width:100%">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Discount</th>
                <th scope="col">Total</th>
                <th scope="col">Paid</th>
                <th scope="col">Payment Method</th>
                <th scope="col">Product</th>
                <th scope="col">Time</th>
                <th scope="col">Time</th>
                <th scope="col">Time</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</section>

<script src="/js/orderArchive.js"></script>

@endsection
