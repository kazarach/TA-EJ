@extends('layouts/main')

@section('container')

<script src="/js/workforceScript.js"></script>
<div class="container-cs">
    <div class="top-bar">
        <div class="header-wrapper">
        <div class="header-title">
            <h2>Workforce Availability</h2>
        </div>
        <div class="dropdown-top">
            <a href="/production">Production</a>
            <a href="">|</a>
            <a href="/production/archive">Production Archive</a>
            <a href="">|</a>
            <a href="/machine">Machine</a>
            <a href="">|</a>
            <a href="/workforce" class="active">Workforce</a>
        </div>
        <div class="user-info">
            <!-- <img src="image2.jpg" alt=""> -->
        </div>
        </div>
    </div>  




{{-- form --}}
<section class="form">
  @csrf
    <div class="row g-3 mb-3">
        <div class="col-new">
            <input id="ID" type="text" class="form-control" placeholder="New Workforce" aria-label="ID" readonly>
        </div>
    </div>

    <div class="row g-3 mb-3">
        <div class="col">
            <label for="">Name</label>
            <input name="name" id="workforceName" type="text" class="form-control" placeholder="Name" aria-label="Nama">
        </div>
    </div>

    <div class="row g-3 mb-3">
        <div class="col">
            <label for="">Position</label>
        <select name="position_id" id="workforcePosition" class="form-select mb-3" aria-label="Default select example">
            <option selected disabled hidden>Select Position</option>
            @foreach($workforcepositions as $position)
                <option value="{{ $position->id }}">{{ $position->name }}</option>
            @endforeach
        </select>
        </div>
        <div class="col">
            <label for="">Status</label>
            <select name="status_id" id="workforceStatus" class="form-select mb-3" aria-label="Default select example">
                <option selected disabled hidden>Select Status</option>
                @foreach($workforcestatuses as $status)
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

</section>

{{-- <div class="filter-container">
    <label for="">Position:
    <select id="position-filter">
        <option value="">All</option>
        <option value="">Potong</option>
        <option value="">Setrika</option>
        <option value="">Jahit</option>
    </select>
    </label>
    <label for="">Status:
    <select id="status-filter">
        <option value="">All</option>
        <option value="">Masuk</option>
        <option value="">Izin</option>
        <option value="">Sakit</option>
        <option value="">Bolos</option>
    </select>
    </label>
</div> --}}

<style>
    .selected {
        background-color: #d1e7dd !important; /* Highlight color */
    }
</style>

<section class="home-tbl">
    <table id="workforce-table" class="table table-striped table-hover" style="width:100%">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Position</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</section>

@endsection

