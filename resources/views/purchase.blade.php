@extends('layouts/main')

@section('container')

<div class="container-cs">
<div class="top-bar">
    <div class="header-wrapper">
    <div class="header-title">
        <h2>Request</h2>
    </div>
    <div class="dropdown-top">
        <a href="/product">Product</a>
        <a href="">|</a>
        <a href="/rejectedproduct">Rejected Product</a>
        <a href="">|</a>
        <a href="/material">Material</a>
        <a href="">|</a>
        <a href="/purchase" class="active">Request Material</a>
        <a href="">|</a>
        <a href="/purchase/transaction">Request Transaction</a>
        <a href="">|</a>
        <a href="/purchase/item">Requested Material</a>
    </div>
    <div>
    </div>
    </div>
</div> 

{{-- form --}}
<div class="form">
  @csrf
    <div class="row g-3 mb-3">
        <div class="col-new">
            <input id="ID" type="text" class="form-control" placeholder="New Request Material" aria-label="ID" readonly>
        </div>
    </div>

    <div class="row g-3 mb-3">
        <div class="col">
            <label for="supplierName">Supplier</label>
            <select name="name" id="supplierName" class="form-select" aria-label="Supplier Name">
                <option selected disabled hidden>Select a supplier</option>
                @foreach($suppliers as $supplier)
                <option value="{{ $supplier->id }}">
                    {{ $supplier->name }}
                </option>
                @endforeach 
            </select>
        </div>
    </div>
    <div class="row g-3 mb-3">
        <div class="col">
            <label for="" class="form-label">Total</label>
            <input id="totalPrice" type="text" class="form-control" placeholder="Total" readonly>
        </div>
        <div class="col">
            <label for="" class="form-label">Paid</label>
            <input id="paid" type="text" class="form-control" placeholder="Paid">
        </div>
    </div>
    <div class="row g-3">
        <div class="col-md-8">
            <label for="discount" class="form-label">Discount</label>
            <input id="discount" type="text" class="form-control" placeholder="Discount">
        </div>
        <div class="col-md-4 mt-5">
            <button type="button" id="change-discount" class="btn btn-primary" onclick="calculateTotalHTM()">Change</button>
        </div>
    </div>
    <div class="row g-3 mb-3">
        <div class="col">
            <label for="">Payment</label>
            <select id="Payment" class="form-select mb-3" aria-label="Default select example">
                <option selected disabled hidden>Select Payment</option>
                @foreach($payments as $payment)
                    <option value="{{ $payment->id }}">{{ $payment->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <button type="button" id="pilih-material" class="btn btn-info mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Choose Materials</button>
  
{{---Modal---}}
<div class="modal fade mb-3" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" id="modal-sell">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Choose Material</h1>
                <button type="button" onclick="revertModal()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex">
                    <!-- Selected Materials Section -->
                    <div class="flex-fill me-3">
                        <h3>Selected Materials</h3>
                        <table id="selectedItemsTable" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Code</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col">Unit</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">After Discount</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="selectedItemsBody">
                                <!-- Selected materials will be dynamically added here -->
                            </tbody>
                        </table>
                        <div class="mt-3">
                            <h3>Total HTM: <span id="totalHTM">0</span></h3>
                        </div>
                    </div>
                    <!-- Materials Table Section -->
                    <div class="flex-fill">
                        <h3>Available Materials</h3>
                        <table id="materials-table" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Code</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col">Unit</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">After Discount</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="revertModal()" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="saveChanges" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

    <div>
        <button type="button" id="create-button" class="btn btn-success">Request</button>
        <button type="button" id="saveChangesOut" class="btn btn-primary">Save changes</button>
    </div>
</div>

<div class="home-tbl">
    <table id="purchase-table" class="table table-striped table-hover" style="width:100%">
        <thead>
            <tr>
                <th scope="col">ID</th> 
                <th scope="col">Name</th>
                <th scope="col">Code</th>
                <th scope="col">Stock</th>
                <th scope="col">Unit</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
                <th scope="col">After Discount</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>


<script src="/js/purchase.js"></script>

@endsection

