@extends('layouts/main')

@section('container')


<div class="container-cs">
<div class="top-bar">
    <div class="header-wrapper">
        <div class="header-title">
            <h2>Material</h2>
        </div>
        <div class="dropdown-top">
            <a href="/product">Product</a>
            <a href="">|</a>
            <a href="/rejectedproduct">Rejected Product</a>
            <a href="">|</a>
            <a href="/material" class="active">Material</a>
            <a href="">|</a>
            <a href="/purchase">Request Material</a>
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
            <input id="ID" type="text" class="form-control" placeholder="New Material" aria-label="ID" readonly>
        </div>
    </div>

    <div class="row g-3 mb-3">
        <div class="col">
            <label for="" class="form-label">Material Name</label>
            <input name="name" id="materialName" type="text" class="form-control" placeholder="Material Name" aria-label="Nama">
        </div>
        <div class="col">
            <label for="" class="form-label">Stock</label>
          <input name="stock" id="materialStock" type="text" class="form-control" placeholder="Stock" aria-label="Stock">
        </div>
    </div>

    <div class="row g-3 mb-3">
        <div class="col">
            <label for="" class="form-label">Unit</label>
            <select name="unit_id" id="materialUnit" class="form-select mb-3" aria-label="Default select example">
            <option selected disabled hidden>Select Unit</option>
            @foreach($materialunits as $unit)
                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
            @endforeach
        </select>
        </div>
        <div class="col">
            <label for="" class="form-label">Category</label>
            <select name="category_id" id="materialCategory" class="form-select mb-3" aria-label="Default select example">
            <option selected disabled hidden>Select Category</option>
            @foreach($materialcategories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        </div>
    </div>
    <div class="row g-3 mb-3">
        <div class="col">
            <label for="" class="form-label">Material Code</label>
            <input name="code" id="materialCode" type="text" class="form-control" placeholder="Material Code" aria-label="Kode">
        </div>
        <div class="col">
            <label for="" class="form-label">Purchase Price</label>
            <input name="purchase_price" id="materialPurchasePrice" type="text" class="form-control" placeholder="Purchase Price" aria-label="Harga Beli">
        </div>
    </div>

<div>
    <button type="button" id="create-button" class="btn btn-primary">Create</button>
    <button type="button" id="update-button" class="btn btn-success">Update</button>
    <button type="button" id="delete-button" class="btn btn-danger">Delete</button>
    <button type="button" onclick="clearForm()" class="btn btn-secondary">Clear Form</button>
</div>

</div>

<div class="home-tbl">
    <table id="materials-table" class="table table-striped table-hover" style="width:100%">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Material Name</th>
                <th scope="col">Stock</th>
                <th scope="col">Reserved</th>
                <th scope="col">Unit</th>
                <th scope="col">Category</th>
                <th scope="col">Code</th>
                <th scope="col">Purchase Price</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>

<script src="/js/materialScript.js"></script>
@endsection
