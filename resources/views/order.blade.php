@extends('layouts/main')

@section('container')

<div class="container-cs">
    <div class="top-bar">
        <div class="header-wrapper">
            <div class="header-title">
                <h2>Order</h2>
            </div>
            <div class="dropdown-top">
                <a href="/order" class="active">Order</a>
                <a href="">|</a>
                <a href="/order/book">Order Book</a>
                <a href="">|</a>
                <a href="/order/archive">Order Archive</a>
                <a href="">|</a>
                <a href="/customer">Customer</a>
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
              <input id="ID" type="text" class="form-control" placeholder="New Order" aria-label="ID" readonly>
          </div>
      </div>
        <div class="row g-3 mb-3">
            <div class="col">
                <label for="catalogName">Catalog</label>
                <select name="name" id="catalogName" class="form-select" aria-label="Catalog Name">
                    <option selected disabled hidden>Select a catalog</option>
                    @foreach($catalogs as $catalog)
                    <option value="{{ $catalog->id }}">
                        {{ $catalog->name }}
                    </option>
                    @endforeach 
                </select>
            </div>
        </div>
        <div class="row g-3 mb-3">
            <div class="col">
                <label for="customerName">Customer</label>
                <select name="name" id="customerName" class="form-select" aria-label="Customer Name">
                    <option selected disabled hidden>Select a customer</option>
                    @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">
                        {{ $customer->name }}
                    </option>
                    @endforeach 
                </select>
            </div>
        </div>
  
      <button type="button" id="pilih-product" class="btn btn-info mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Choose Products</button>
    
  {{---Modal---}}
  <div class="modal fade mb-3" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
          <div class="modal-content" id="modal">
              <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Choose Product</h1>
                  <button type="button" onclick="revertModal()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div class="d-flex">
                      <div class="flex-fill me-3">
                          <h3>Selected Products</h3>
                          <table id="selectedItemsTable" class="table">
                              <thead>
                                  <tr>
                                  <th scope="col">No</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Size</th>
                                  <th scope="col">Code</th>
                                  <th scope="col">Price</th>
                                  <th scope="col">Quantity</th>
                                  <th scope="col">Total</th>
                                  <th scope="col">Action</th>
                                  </tr>
                              </thead>
                              <tbody id="selectedItemsBody">
                                  <!-- Selected materials will be dynamically added here -->
                              </tbody>
                          </table>
                          <div class="mt-3">
                              <h3>Total HTM: <span id="totalHTM">0</span></h3>
                          </div>
                      </div>
                      <!-- Materials Table Section -->
                      <div class="flex-fill">
                          <h3>Available Products</h3>
                          <table id="products-table" class="table">
                              <thead>
                                  <tr>
                                      <th scope="col">ID</th>
                                      <th scope="col">Name</th>
                                      <th scope="col">Size</th>
                                      <th scope="col">Code</th>
                                      <th scope="col">Color</th>
                                      <th scope="col">Sign</th>
                                      <th scope="col">Quantity</th>
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
  </div>
  
      <div>
          <button type="button" id="create-button" class="btn btn-success">Sell</button>
          <button type="button" id="saveChangesOut" class="btn btn-primary">Save changes</button>
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
      <table id="selling-table" class="table table-striped table-hover" style="width:100%">
          <thead>
              <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Name</th>
                  <th scope="col">Size</th>
                  <th scope="col">Code</th>
                  <th scope="col">Color</th>
                  <th scope="col">Sign</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Action</th>
              </tr>
          </thead>
          <tbody>
  
          </tbody>
      </table>
  </section>
  
  
  <script src="/js/order.js"></script>
  
  @endsection
