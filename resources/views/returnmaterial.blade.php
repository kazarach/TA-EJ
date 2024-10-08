@extends('layouts/main')

@section('container')

<div class="container-cs">
<div class="top-bar">
    <div class="header-wrapper">
        <div class="header-title">
            <h2>Return Material</h2>
        </div>
        <div class="dropdown-top">
            <a href="/returncustomer">Return Customer</a>
            <a href="">|</a>
            <a href="/returnproduction">Return Production</a>
            <a href="">|</a>
            <a href="/returnmaterial" class="active">Return Material</a>
            <a href="">|</a>
            <a href="/returnmaterial/archive">Return Material Archive</a>
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
              <input id="ID" type="text" class="form-control" placeholder="New Return Material" aria-label="ID" readonly>
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
                <label for="categoryName">Category</label>
                <select name="name" id="categoryName" class="form-select" aria-label="Category">
                    <option selected disabled hidden>Select a category</option>
                    @foreach($returnmaterialcategories as $category)
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
            <label for="" class="form-label">Return Material Date</label>
            <input id="return_date" type="text" class="form-control datepicker" placeholder="Return Material Date">
        </div>
  
  
      <div>
        <button type="button" id="add-button" class="btn btn-primary">Add</button>
        <button type="button" onclick="clearForm()" class="btn btn-secondary">Clear Form</button>
        <button type="button" id="return-button" class="btn btn-success">Return Material</button>
      </div>
  </div>
  
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
</div>
  
  
  <script src="/js/returnMaterial.js" nonce="{{ $nonce }}"></script>
  
  @endsection
