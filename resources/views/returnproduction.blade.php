@extends('layouts/main')

@section('container')

<div class="container-cs">
    <div class="top-bar">
        <div class="header-wrapper">
            <div class="header-title">
                <h2>Return Production</h2>
            </div>
            <div class="dropdown-top">
                <a href="/returncustomer">Return Customer</a>
                <a href="">|</a>
                <a href="/returnproduction" class="active">Return Production</a>
                <a href="">|</a>
                <a href="/returnproduction/archive">Return Production Archive</a>
                <a href="">|</a>
                <a href="/returnmaterial">Return Material</a>
            </div>
            <div class="user-info">
                <!-- <img src="image2.jpg" alt=""> -->
            </div>
        </div>
    </div>  

{{-- form --}}
<div class="form">
    @csrf
      <div class="row g-3 mb-3">
          <div class="col-new">
              <input id="ID" type="text" class="form-control" placeholder="New Return Production" aria-label="ID" readonly>
          </div>
      </div>
        <div class="row g-3 mb-3">
            <div class="col">
                <label for="materialName">Material</label>
                <select name="name" id="materialName" class="form-select" aria-label="Material Name">
                    <option selected disabled hidden>Select a material</option>
                    @foreach($materials as $material)
                    <option value="{{ $material->id }}"
                            data-name="{{ $material->name }}"
                            data-unit="{{ $material->materialunit->name }}"
                            data-category="{{ $material->materialcategory->name }}"
                            data-code="{{ $material->code }}">
                        {{ $material->name }} ({{ $material->materialunit->name }})
                    </option>
                    @endforeach 
                </select>
            </div>
        </div>
        <div class="row g-3 mb-3">
            <div class="col">
                <label for="categoryName">Project</label>
                <select name="name" id="categoryName" class="form-select" aria-label="Category">
                    <option selected disabled hidden>Select a category</option>
                    @foreach($returnproductioncategories as $category)
                    <option value="{{ $category->id }}"
                        data-name="{{ $category->name }}">
                        {{ $category->name }}
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
        <div class="row g-3 mb-3">
            <div class="col">
                <label for="">Information</label>
                <input id="information" type="text" class="form-control" placeholder="Information">
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="" class="form-label">Production Date</label>
            <input id="return_date" type="text" class="form-control datepicker" placeholder="Production Date">
        </div>
  
  
      <div>
        <!-- <button type="button" id="create-button" class="btn btn-primary"></button> -->
        <button type="button" id="add-button" class="btn btn-primary">Add</button>
        <!-- <button type="button" id="delete-button" class="btn btn-danger">Delete</button> -->
        <button type="button" onclick="clearForm()" class="btn btn-secondary">Clear Form</button>
        <button type="button" id="return-button" class="btn btn-success">Return Product</button>

      </div>
  </div>
  
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
  
  <div class="home-tbl">
      <table id="return-table" class="table table-striped table-hover" style="width:100%">
          <thead>
              <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Product Name</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Unit</th>
                  <th scope="col">Category</th>
                  <th scope="col">Code</th>
                  <th scope="col">Return Category</th>
                  <th scope="col">Information</th>
                  <th scope="col">Date</th>
                  <th scope="col">Action</th>
              </tr>
          </thead>
          <tbody>
  
          </tbody>
      </table>
  </section>
  
  
  <script src="/js/returnProduction.js"></script>
  
  @endsection
