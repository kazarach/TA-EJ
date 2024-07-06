@extends('layouts/main')

@section('container')

<div class="container-cs">
    <div class="top-bar">
        <div class="header-wrapper">
        <div class="header-title">
            <h2>Dashboard</h2>
        </div>
        {{-- <div class="dropdown-top">
            <a href="/planning">Capacity Production</a>
            <a href="">|</a>
            <a href="/workforce">Workforce Availability</a>
            <a href="">|</a>
            <a href="/schedule">Schedule</a>
        </div> --}}
        <div class="user-info">
            <img src="../image2.jpg" alt="">
        </div>
        </div>
    </div>  

    <div class="content-section">
        <div class="row justify-content-left">
            <div class="col-md-2">
                <a href="/order/book" style="text-decoration: none; color: inherit;">
                <div class="card" id="card1">
                    <div class="card-body">
                        <i class='bx bx-dots-vertical-rounded icon' id="logo-dot"></i>
                        <i class='bx bxs-book icon' id="logo-db"></i>
                        <h5 class="card-title">Order Book</h5>
                        <h1>10</h1>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-2">
                <a href="/project" style="text-decoration: none; color: inherit;">
                <div class="card" id="card1">
                    <div class="card-body">
                        <i class='bx bx-dots-vertical-rounded icon' id="logo-dot"></i>
                        <i class='bx bxs-food-menu icon' id="logo-db"></i>
                        <h5 class="card-title">Project</h5>
                        <h1>145</h1>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-2">
                <a href="/product" style="text-decoration: none; color: inherit;">
                <div class="card" id="card1">
                    <div class="card-body">
                        <i class='bx bx-dots-vertical-rounded icon' id="logo-dot"></i>
                        <i class='bx bxs-cylinder icon' id="logo-db"></i>
                        <h5 class="card-title">Product</h5>
                        <h1>200</h1>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-2">
                <a href="/production/archive" style="text-decoration: none; color: inherit;">
                <div class="card" id="card1">
                    <div class="card-body">
                        <i class='bx bx-dots-vertical-rounded icon' id="logo-dot"></i>
                        <i class='bx bxs-cog icon' id="logo-db"></i>
                        <h5 class="card-title">Production</h5>
                        <h1>12</h1>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-4">
                <div class="card" id="card2">
                    <div class="card-body">
                        <h5 class="card-title">Schedule</h5>
                        <div id="calendar" class="calendar-db"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="row justify-content-left" id="row2">
            <div class="col-md-6">
                <a href="/selling/item">
                <div class="card" id="card3">
                    <div class="card-body">
                        <h5 class="card-title">Product Sold</h5>
                        <canvas id="sellChart"></canvas>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-2">
                <div class="card" id="card3">
                    <div class="card-body">
                        <h5 class="card-title">Container 5</h5>
                        <div class="chart-container">
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" id="card4">
                    <div class="card-body">
                        <h5 class="card-title">Container 6</h5>
                        <div class="chart-container">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

<!-- Modal -->
<div class="modal fade" id="addEventModal" tabindex="-1" role="dialog" aria-labelledby="addEventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEventModalLabel">Today Project Detail</h5>
            </div>
            <div class="modal-body">
                <form id="addEventForm">
                    <div class="row g-3 mb-3">
                        <div class="col">
                            <label for="eventTitle">Project Title</label>
                            <h5 id="eventTitle" readonly></h5>
                            {{-- <input type="text" class="form-control" id="eventTitle" readonly> --}}
                        </div>
                        <div class="col">
                            <label for="eventTitle"></label>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="eventTitle">Project Detail</label>
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
                                    <th scope="col">Production Date</th>
                                </tr>
                            </thead>
                            <tbody>
                    
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="row g-3 mb-3">
                        <div class="col">
                            <label for="eventColor">Event Color</label>
                            <input type="color" class="form-control" id="eventColor" value="#ff9f89">
                        </div>
                        <div class="col">
                            <label for="eventTextColor">Text Color</label>
                            <input type="color" class="form-control" id="eventTextColor" value="#000000">
                        </div>
                    </div> --}}
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="revertModal()" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveEventButton">Save Event</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal event -->
<div class="modal fade" id="projectModal" tabindex="-1" role="dialog" aria-labelledby="addEventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEventModalLabel">Project Detail</h5>
            </div>
            <div class="modal-body">
                <form id="addEventForm">
                    <div class="row g-3 mb-3">
                        <div class="col">
                            <label for="eventTitle">Project Title</label>
                            <h5 id="projectTitle" readonly></h5>
                            {{-- <input type="text" class="form-control" id="eventTitle" readonly> --}}
                        </div>
                        <div class="col">
                            <label for="eventTitle"></label>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="eventTitle">Project Detail</label>
                        <table id="projects-table" class="table table-striped table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Project Name</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">End Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Products</th>
                                    <th scope="col">Producted</th>
                                </tr>
                            </thead>
                            <tbody>
                
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="row g-3 mb-3">
                        <div class="col">
                            <label for="eventColor">Event Color</label>
                            <input type="color" class="form-control" id="eventColor" value="#ff9f89">
                        </div>
                        <div class="col">
                            <label for="eventTextColor">Text Color</label>
                            <input type="color" class="form-control" id="eventTextColor" value="#000000">
                        </div>
                    </div> --}}
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="revertModal()" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveEventButton">Save Event</button>
            </div>
        </div>
    </div>
</div>

</div> 


<script src="/js/schedule-dbScript.js"></script>
{{-- <script src="/js/projectScript.js"></script> --}}
@endsection

