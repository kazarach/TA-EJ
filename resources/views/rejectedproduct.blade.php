@extends('layouts/main')

@section('container')

<div class="container-cs">
<div class="top-bar">
    <div class="header-wrapper">
        <div class="header-title">
            <h2>Rejected Product</h2>
        </div>
        <div class="dropdown-top">
            <a href="/product">Product</a>
            <a href="">|</a>
            <a href="/rejectedproduct" class="active">Rejected Product</a>
            <a href="">|</a>
            <a href="/material">Material</a>
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
              <input id="ID" type="text" class="form-control" placeholder="Edit Rejected Product" aria-label="ID" readonly>
          </div>
      </div>
        <div class="row g-3 mb-3">
            <div class="col">
                <label for="productName">Product</label>
                <select name="name" id="productName" class="form-select" aria-label="Product Name">
                    <option selected disabled hidden>Select a product</option>
                    @foreach($products as $product)
                    <option value="{{ $product->id }}">
                        {{ $product->name }} ({{ $product->size->name }})
                    </option>
                    @endforeach 
                </select>
            </div>
        </div>
        <div class="row g-3 mb-3">
            <div class="col">
                <label for="gradeName">Item Grade</label>
                <select name="name" id="gradeName" class="form-select" aria-label="Grade">
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
  
      <div>
        <button type="button" id="update-button" class="btn btn-success">Update</button>
        <button type="button" id="delete-button" class="btn btn-danger">Delete</button>
        <button type="button" onclick="clearForm()" class="btn btn-secondary">Clear Form</button>
      </div>
  </div>
  
<div class="home-tbl">
    <table id="production-table" class="table table-striped table-hover" style="width:100%">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Product Name</th>
                <th scope="col">Quality</th>
                <th scope="col">Quantity</th>
                <th scope="col">Size</th>
                <th scope="col">Color</th>
                <th scope="col">Code</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>
  
  
  <script src="/js/rejectedProduct.js" nonce="{{ $nonce }}"></script>
  
  @endsection
