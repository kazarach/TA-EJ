@extends('layouts/main')

@section('container')

<div class="container-cs">
    <div class="top-bar">
        <div class="header-wrapper">
            <div class="header-title">
                <h2>Production Archive</h2>
            </div>
            <div class="dropdown-top">
                <a href="/production">Production</a>
                <a href="">|</a>
                <a href="/production/archive" class="active">Production Archive</a>
                <a href="">|</a>
                <a href="/machine">Machine</a>
                <a href="">|</a>
                <a href="/workforce">Workforce</a>
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
              <input id="ID" type="text" class="form-control" placeholder="Production Archive" aria-label="ID" readonly>
          </div>
      </div>
        <div class="row g-3 mb-3">
            <div class="col">
                <label for="productName">Product</label>
                <select name="name" id="productName" class="form-select" aria-label="Product Name">
                    <option selected disabled hidden>Select a product</option>
                    @foreach($products as $product)
                    <option value="{{ $product->id }}">
                        {{ $product->name }}
                    </option>
                    @endforeach 
                </select>
            </div>
        </div>
        <div class="row g-3 mb-3">
            <div class="col">
                <label for="projectName">Project</label>
                <select name="name" id="projectName" class="form-select" aria-label="Project Name">
                    <option selected disabled hidden>Select a project</option>
                    @foreach($projects as $project)
                    <option value="{{ $project->id }}">
                        {{ $project->name }}
                    </option>
                    @endforeach 
                </select>
            </div>
        </div>
  
      <button type="button" id="pilih-machine" class="btn btn-info mb-3" data-bs-toggle="modal" data-bs-target="#machineModal">Choose Machines</button>
      <button type="button" id="pilih-workforce" class="btn btn-info mb-3" data-bs-toggle="modal" data-bs-target="#workforceModal">Choose workforces</button>
    
  {{---Modal---}}
  <div class="modal fade mb-3" id="machineModal" tabindex="-1" aria-labelledby="machineModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
          <div class="modal-content" id="modal-sell">
              <div class="modal-header">
                  <h1 class="modal-title fs-5" id="machineModalLabel">Choose Machine</h1>
                  <button type="button" onclick="revertModal()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div class="d-flex">
                      <!-- Selected Materials Section -->
                      <div class="flex-fill me-3">
                          <h3>Selected Machines</h3>
                          <table id="selectedItemsTable" class="table">
                              <thead>
                                  <tr>
                                  <th scope="col">No</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Status</th>
                                  <th scope="col">Use</th>
                                  <th scope="col">Action</th>
                                  </tr>
                              </thead>
                              <tbody id="selectedItemsBody">
                              </tbody>
                          </table>
                      </div>
                      <!-- Materials Table Section -->
                      <div class="flex-fill">
                          <h3>Available Machines</h3>
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
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" onclick="revertModal()" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" id="saveChangesMachine" class="btn btn-primary">Save changes</button>
              </div>
          </div>
      </div>
  </div>
  {{---Modal Second---}}
  <div class="modal fade mb-3" id="workforceModal" tabindex="-1" aria-labelledby="workforceModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
          <div class="modal-content" id="modal-sell">
              <div class="modal-header">
                  <h1 class="modal-title fs-5" id="workforceModalLabel">Choose Workforce</h1>
                  <button type="button" onclick="revertModal2()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div class="d-flex">
                      <!-- Selected Materials Section -->
                      <div class="flex-fill me-3">
                          <h3>Selected Workforces</h3>
                          <table id="selectedWorkforceTable" class="table">
                              <thead>
                                  <tr>
                                  <th scope="col">No</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Status</th>
                                  <th scope="col">Position</th>
                                  <th scope="col">Action</th>
                                  </tr>
                              </thead>
                              <tbody id="selectedWorkforceBody">
                              </tbody>
                          </table>
                      </div>
                      <!-- Materials Table Section -->
                      <div class="flex-fill">
                          <h3>Available Workforces</h3>
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
                  <button type="button" onclick="revertModal2()" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" id="saveChangesWorkforce" class="btn btn-primary">Save changes</button>
              </div>
          </div>
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
      <table id="production-table" class="table table-striped table-hover" style="width:100%">
          <thead>
              <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Product Name</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Size</th>
                  <th scope="col">Color</th>
                  <th scope="col">Code</th>
                  <th scope="col">Project Name</th>
                  <th scope="col">Project Status</th>
                  <th scope="col">Machine</th>
                  <th scope="col">Workforce</th>
              </tr>
          </thead>
          <tbody>
  
          </tbody>
      </table>
  </section>
  
  
  <script src="/js/productionArchive.js"></script>
  
  @endsection
