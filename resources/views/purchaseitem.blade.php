@extends('layouts/main')

@section('container')


<div class="container-cs">
<div class="top-bar">
    <div class="header-wrapper">
    <div class="header-title">
        <h2>Requested</h2>
    </div>
    <div class="dropdown-top">
        <a href="/product">Product</a>
        <a href="">|</a>
        <a href="/rejectedproduct">Rejected Product</a>
        <a href="">|</a>
        <a href="/material">Material</a>
        <a href="">|</a>
        <a href="/purchase">Request Material</a>
        <a href="">|</a>
        <a href="/purchase/transaction">Request Transaction</a>
        <a href="">|</a>
        <a href="/purchase/item" class="active">Requested Material</a>
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
                <th scope="col">Total</th>
                <th scope="col">Paid</th>
                <th scope="col">Payment Method</th>
                <th scope="col">Product</th>
                <th scope="col">Time</th>
                <th scope="col">Time</th>
                <th scope="col">Time</th>
                <th scope="col">Time</th>
                <th scope="col">Time</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</section>
<script src="/js/purchaseItem.js" nonce="{{ $nonce }}"></script>

@endsection

