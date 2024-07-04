@extends('layouts/main')

@section('container')

<div class="container-sc">
    <div class="top-bar">
        <div class="header-wrapper">
        <div class="header-title">
            <h2>Schedule</h2>
        </div>
        <div class="dropdown-top">
            <a href="/project">Project</a>
            <a href="">|</a>
            <a href="/schedule" class="active">Schedule</a>
        </div>
        <div class="user-info">
            <img src="image2.jpg" alt="">
        </div>
        </div>
    </div>  

<section class="timeline-container">
    <div class="timeline-header">
        <h2>Timeline</h2>
        <div>
            <a href="/project"><button class="btn btn-primary">Project View</button></a>
            <select class="btn btn-light" id="monthSelect">
                <option value="0">January</option>
                <option value="1">February</option>
                <option value="2">March</option>
                <option value="3">April</option>
                <option value="4">May</option>
                <option value="5">June</option>
                <option value="6">July</option>
                <option value="7">August</option>
                <option value="8">September</option>
                <option value="9">October</option>
                <option value="10">November</option>
                <option value="11">December</option>
            </select>
            <button class="btn btn-success" id="addNewButton" onclick="location.href='project'">Add New</button>
        </div>
    </div>
        <div id="calendar"></div>
</section>

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
                    <div class="row g-3 mb-3">
                        <div class="col">
                            <label for="eventColor">Event Color</label>
                            <input type="color" class="form-control" id="eventColor" value="#ff9f89">
                        </div>
                        <div class="col">
                            <label for="eventTextColor">Text Color</label>
                            <input type="color" class="form-control" id="eventTextColor" value="#000000">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="revertModal()" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveEventButton">Save Event</button>
            </div>
        </div>
    </div>
</div>


<script src="/js/scheduleScript.js"></script>



@endsection

