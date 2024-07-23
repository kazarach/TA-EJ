@extends('layouts/main')

@section('container')

<div class="container-cs">
    <div class="top-bar">
        <div class="header-wrapper">
            <div class="header-title">
                <h2>Partial</h2>
            </div>
            <div class="user-info">
            </div>
        </div>
    </div>  

{{-- form --}}
<section class="form">
  @csrf
    <div class="row g-3 mb-3">
        <div class="col-new">
            <input id="ID" type="text" class="form-control" placeholder="New Partial" aria-label="ID" readonly>
        </div>
    </div>
    <div class="row g-3 mb-3">
        <div class="col">
            <label for="" class="form-label">Partial</label>
            <select id="Change" class="form-select mb-3">
                <option selected disabled hidden>Change Partial</option>
                <option value="1">Product Type</option>
                <option value="2">Product Category</option>
                <option value="3">Product Size</option>
                <option value="4">Product Color</option>
                <option value="5">Product Sign</option>
                <option value="6">Product Grade</option>
                <option value="7">Material Unit</option>
                <option value="8">Material Category</option>
                <option value="9">Project Status</option>
                <option value="10">Machine Use</option>
                <option value="11">Machine Status</option>
                <option value="12">Workforce Position</option>
                <option value="13">Workforce Status</option>
                <option value="14">Payment</option>
                <option value="15">Customer Class</option>
                <option value="16">Return Customer Category</option>
                <option value="17">Return Production Category</option>
                <option value="18">Return Material Category</option>
            </select>
        </div>
    </div>
    <div class="row g-3 mb-3">
        <div class="col">
            <label for="">Name</label>
            <input id="Name" type="text" class="form-control" placeholder="Name" aria-label="Nama">
        </div>
    </div>

<div>
    <button type="button" id="create-button" class="btn btn-primary">Create</button>
    <button type="button" id="update-button" class="btn btn-success">Update</button>
    <button type="button" id="delete-button" class="btn btn-danger">Delete</button>
    <button type="button" onclick="clearForm()" class="btn btn-secondary">Clear Form</button>
</div>

</section>

<section class="home-tbl">
    <table id="partial-table" class="table table-striped table-hover" style="width:100%">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</section>

<script src="/js/partial.js"></script>

@endsection
