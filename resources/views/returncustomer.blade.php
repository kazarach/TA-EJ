@extends('layouts/main')

@section('container')

<div class="container-cs">
<div class="top-bar">
    <div class="header-wrapper">
        <div class="header-title">
            <h2>Return Customer</h2>
        </div>
        <div class="dropdown-top">
            <a href="/returncustomer" class="active">Return Customer</a>
            <a href="">|</a>
            <a href="/returncustomer/archive">Return Customer Archive</a>
            <a href="">|</a>
            <a href="/returnproduction">Return Production</a>
            <a href="">|</a>
            <a href="/returnmaterial">Return Material</a>
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
              <input id="ID" type="text" class="form-control" placeholder="New Return Customer" aria-label="ID" readonly>
          </div>
      </div>
        <div class="row g-3 mb-3">
            <div class="col">
                <label for="productName">Product</label>
                <select name="name" id="productName" class="form-select" aria-label="Product Name">
                    <option selected disabled hidden>Select a product</option>
                    @foreach($products as $product)
                    <option value="{{ $product->id }}"
                            data-name="{{ $product->name }}"
                            data-size="{{ $product->size->name }}"
                            data-code="{{ $product->code }}"
                            data-color="{{ $product->color->name }}"
                            data-sign="{{ $product->sign->name }}">
                        {{ $product->name }} ({{ $product->size->name }})
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
                    @foreach($returncustomercategories as $category)
                    <option value="{{ $category->id }}" data-name="{{ $category->name }}">
                        {{ $category->name }}
                    </option>
                    @endforeach 
                </select>
            </div>
        </div>
        <div class="row g-3 mb-3">
            <div class="col">
                <label for="gradeName">Item Grade</label>
                <select name="name" id="gradeName" class="form-select" aria-label="Grade" disabled>
                    <option selected disabled hidden>Select a grade</option>
                    @foreach($grades as $grade)
                    <option value="{{ $grade->id }}" data-name="{{ $grade->name }}">
                        {{ $grade->name }}
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
            <label for="" class="form-label">Return Customer Date</label>
            <input id="return_date" type="text" class="form-control datepicker" placeholder="Return Customer Date">
        </div>
  
      <div>
        <button type="button" id="add-button" class="btn btn-primary">Add</button>
        <button type="button" onclick="clearForm()" class="btn btn-secondary">Clear Form</button>
        <button type="button" id="return-button" class="btn btn-success">Return Product</button>

      </div>
  </div>
  
<div class="home-tbl">
    <table id="return-table" class="table table-striped table-hover" style="width:100%">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Product Name</th>
                <th scope="col">Quality</th>
                <th scope="col">Quantity</th>
                <th scope="col">Size</th>
                <th scope="col">Color</th>
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
  
  
  <script src="/js/returnCustomer.js"></script>
  
  @endsection
