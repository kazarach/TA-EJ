@extends('layouts/main')

@section('container')

<script src="/js/machineScript.js"></script>
<div class="container-cs">
<div class="top-bar">
    <div class="header-wrapper">
        <div class="header-title">
            <h2>Machine</h2>
        </div>
        <div class="dropdown-top">
            <a href="/production">Production</a>
            <a href="">|</a>
            <a href="/production/archive">Production Archive</a>
            <a href="">|</a>
            <a href="/machine" class="active">Machine</a>
            <a href="">|</a>
            <a href="/workforce">Workforce</a>
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
            <input id="ID" type="text" class="form-control" placeholder="New Machine" aria-label="ID" readonly>
        </div>
    </div>

    <div class="row g-3 mb-3">
        <div class="col">
            <label for="">Machine Name</label>
            <input name="name" id="machineName" type="text" class="form-control" placeholder="Machine Name" aria-label="Nama">
        </div>
    </div>

    <div class="row g-3 mb-3">
        <div class="col">
            <label for="">Use</label>
        <select name="use_id" id="machineUse" class="form-select mb-3" aria-label="Default select example">
            <option selected disabled hidden>Select Use</option>
            @foreach($machineuses as $use)
                <option value="{{ $use->id }}">{{ $use->name }}</option>
            @endforeach
        </select>
        </div>
        <div class="col">
            <label for="">Status</label>
        <select name="status_id" id="machineStatus" class="form-select mb-3" aria-label="Default select example">
            <option selected disabled hidden>Select Status</option>
            @foreach($machinestatuses as $status)
                <option value="{{ $status->id }}">{{ $status->name }}</option>
            @endforeach
        </select>
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
    <table id="machine-table" class="table table-striped table-hover" style="width:100%">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Use</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>

@endsection
