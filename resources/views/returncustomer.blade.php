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
                <a href="/returnproduction/archive">Return Production Archive</a>
            </div>
            <div class="user-info">
                <img src="image2.jpg" alt="">
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
            <label for="" class="form-label">Return Date</label>
            <input id="return_date" type="text" class="form-control datepicker" placeholder="Return Date">
        </div>
  
      <!-- <button type="button" id="pilih-machine" class="btn btn-info mb-3" data-bs-toggle="modal" data-bs-target="#machineModal">Choose Machines and Workforce</button> -->
      <!-- <button type="button" id="pilih-workforce" class="btn btn-info mb-3" data-bs-toggle="modal" data-bs-target="#workforceModal">Choose workforces</button> -->
    
  {{---Modal---}}
  <!-- <div class="modal fade mb-3" id="machineModal" tabindex="-1" aria-labelledby="machineModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
          <div class="modal-content" id="modal">
              <div class="modal-header">
                  <h1 class="modal-title fs-5" id="machineModalLabel">Choose Machine and Workforce</h1>
                  <button type="button" onclick="revertModal()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div class="d-flex">
                      <div class="flex-fill me-3">
                          <h3>Select Machines</h3>
                          <table id="machines-table" class="table">
                              <thead>
                                  <tr>
                                      <th scope="col">ID</th>
                                      <th scope="col">Name</th>
                                      <th scope="col">Status</th>
                                      <th scope="col">Use</th>
                                      <th scope="col">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
  
                              </tbody>
                          </table>
                      </div>
                      <div class="flex-fill">
                          <h3>Select Workforce</h3>
                          <table id="workforces-table" class="table">
                              <thead>
                                  <tr>
                                      <th scope="col">ID</th>
                                      <th scope="col">Name</th>
                                      <th scope="col">Status</th>
                                      <th scope="col">Position</th>
                                      <th scope="col">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
  
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" onclick="revertModal()" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" id="saveChanges" class="btn btn-primary">Save changes</button>
              </div>
          </div>
      </div>
  </div> -->
      <div>
        <!-- <button type="button" id="create-button" class="btn btn-primary"></button> -->
        <button type="button" id="add-button" class="btn btn-primary">Add</button>
        <!-- <button type="button" id="delete-button" class="btn btn-danger">Delete</button> -->
        <button type="button" onclick="clearForm()" class="btn btn-secondary">Clear Form</button>
        <button type="button" id="return-button" class="btn btn-success">Return Product</button>

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
  </section>
  
  
  <script src="/js/returnCustomer.js"></script>
  
  @endsection