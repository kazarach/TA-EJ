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
            <div class="col-md-4">
                <div class="card" id="card3">
                    <div class="card-body">
                        <h5 class="card-title">Container 4</h5>
                        <p class="card-text">Content for the second container.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" id="card3">
                    <div class="card-body">
                        <h5 class="card-title">Container 5</h5>
                        <div class="chart-container">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

</div> 

<script src="/js/schedule-dbScript.js"></script>
{{-- <script src="/js/projectScript.js"></script> --}}
@endsection

