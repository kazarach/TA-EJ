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
            <img src="image2.jpg" alt="">
        </div>
        </div>
    </div>  

    <div class="content-section">
        <div class="row justify-content-left">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Project</h5>
                        <table id="projects-table" class="table table-striped table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Project Name</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">End Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Products</th>
                                </tr>
                            </thead>
                            <tbody>
                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Container 2</h5>
                        <p class="card-text">Content for the second container.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" id="card2">
                    <div class="card-body">
                        <h5 class="card-title">Container 3</h5>
                        <div id="calendar" class="calendar-db"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="row justify-content-left" id="row2">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Container 4</h5>
                        <p class="card-text">Content for the second container.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Container 5</h5>
                    </div>
                </div>
            </div>

</div> 

<script src="/js/scheduleScript.js"></script>
{{-- <script src="/js/projectScript.js"></script> --}}
@endsection

