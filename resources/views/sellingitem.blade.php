@extends('layouts/main')

@section('container')


<div class="container-cs">
<div class="top-bar">
    <div class="header-wrapper">
    <div class="header-title">
        <h2>Selling Item</h2>
    </div>
    <div class="dropdown-top">
        <a href="/selling">Selling</a>
        <a href="">|</a>
        <a href="/selling/transaction">Selling Transaction</a>
        <a href="">|</a>
        <a href="/selling/item" class="active">Selling Item</a>
    </div>
    <div>
    </div>
    </div>
</div>

<section class="home">
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
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</section>
<script src="/js/sellingItem.js" nonce="{{ $nonce }}"></script>

@endsection

