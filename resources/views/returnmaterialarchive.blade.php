@extends('layouts/main')

@section('container')

<div class="container-cs">
    <div class="top-bar">
        <div class="header-wrapper">
            <div class="header-title">
                <h2>Return Material Archive</h2>
            </div>
            <div class="dropdown-top">
                <a href="/returncustomer">Return Customer</a>
                <a href="">|</a>
                <a href="/returnproduction">Return Production</a>
                <a href="">|</a>
                <a href="/returnmaterial">Return Material</a>
                <a href="">|</a>
                <a href="/returnmaterial/archive" class="active">Return Material Archive</a>
            </div>
            <div class="user-info">
                <img src="../image2.jpg" alt="">
            </div>
        </div>
    </div>  

{{-- form --}}
<div class="form">
    @csrf
      <div class="row g-3 mb-3">
          <div class="col-new">
              <input id="ID" type="text" class="form-control" placeholder="Return Material Archive" aria-label="ID" readonly>
          </div>
      </div>
        <div class="row g-3 mb-3">
            <div class="col">
                <label for="materialName">Material</label>
                <select name="name" id="materialName" class="form-select" aria-label="Material Name">
                    <option selected disabled hidden>Select a material</option>
                    @foreach($materials as $material)
                    <option value="{{ $material->id }}">
                        {{ $material->name }}
                    </option>
                    @endforeach 
                </select>
            </div>
        </div>
        <div class="row g-3 mb-3">
            <div class="col">
                <label for="categoryName">Category</label>
                <select name="name" id="categoryName" class="form-select" aria-label="Category Name">
                    <option selected disabled hidden>Select a category</option>
                    @foreach($returnmaterialcategories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                    @endforeach 
                </select>
            </div>
        </div>
        <div class="row g-3 mb-3">
            <div class="col">
                <label for="">Information</label>
                <input id="information" type="text" class="form-control" placeholder="Information">
            </div>
        </div>

  
      <div>
        <button type="button" id="update-button" class="btn btn-success">Update</button>
        <button type="button" id="delete-button" class="btn btn-danger">Delete</button>
        <button type="button" onclick="clearForm()" class="btn btn-secondary">Clear Form</button>
      </div>
  </div>
  
  <div class="filter-container">
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
  </div>
  
  <div class="home-tbl">
      <table id="return-table" class="table table-striped table-hover" style="width:100%">
          <thead>
              <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Material Name</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Unit</th>
                  <th scope="col">Category</th>
                  <th scope="col">Code</th>
                  <th scope="col">Return Category</th>
                  <th scope="col">Information</th>
                  <th scope="col">Return Date</th>
              </tr>
          </thead>
          <tbody>
  
          </tbody>
      </table>
  </section>
  
  
  <script src="/js/returnMaterialArchive.js"></script>
  
  @endsection
