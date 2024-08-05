@extends('layouts/main')

@section('container')

<div class="container-cs">
    <div class="top-bar">
        <div class="header-wrapper">
        <div class="header-title">
            <h2>Catalog</h2>
        </div>
        <div class="dropdown-top">
            <a href="/order">Order</a>
            <a href="">|</a>
            <a href="/order/book">Order Book</a>
            <a href="">|</a>
            <a href="/order/archive">Order Archive</a>
            <a href="">|</a>
            <a href="/customer">Customer</a>
            <a href="">|</a>
            <a href="/catalog" class="active">Catalog</a>
        </div>
        <div>
        </div>
        </div>
    </div>  




{{-- form --}}
<section class="form">
  @csrf
    <div class="row g-3 mb-3">
        <div class="col-new">
            <input id="ID" type="text" class="form-control" placeholder="New Catalog" aria-label="ID" readonly>
        </div>
    </div>

    <div class="row g-3 mb-3">
        <div class="col">
            <label for="">Name</label>
            <input name="name" id="workforceName" type="text" class="form-control" placeholder="Name" aria-label="Nama">
        </div>
    </div>

    <div class="form-group mb-3">
        <label for="">Due Date</label>
        <input id="dueDate" type="text" class="form-control datepicker" placeholder="Due Date">
    </div>

<div>
    <button type="button" id="create-button" class="btn btn-primary">Create</button>
    <button type="button" id="update-button" class="btn btn-success">Update</button>
    <button type="button" id="delete-button" class="btn btn-danger">Delete</button>
    <button type="button" onclick="clearForm()" class="btn btn-secondary">Clear Form</button>
</div>

</section>

<section class="home-tbl">
    <table id="workforce-table" class="table table-striped table-hover" style="width:100%">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Due Date</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</section>
<script src="/js/catalog.js" nonce="{{ $nonce }}"></script>

@endsection

