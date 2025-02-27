<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <!-- {{-- <title>{{ $title }}</title> --}} -->
   <title>{{ $title ?? 'Default Title' }}</title>

   {{-- <title>{{ $pagetitle ?? '' }}</title> --}}
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   <link rel="stylesheet" href="/css/sidebar2.css">

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" nonce="{{ $nonce }}"></script>
   <script  src="https://code.jquery.com/jquery-3.5.1.js" nonce="{{ $nonce }}"></script>


    {{-- Calendar --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" nonce="{{ $nonce }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js" nonce="{{ $nonce }}"></script>
    <script src='https://fullcalendar.io/releases/fullcalendar/3.9.0/lib/moment.min.js' nonce="{{ $nonce }}"></script>
    <script src='https://fullcalendar.io/releases/fullcalendar/3.9.0/lib/jquery.min.js' nonce="{{ $nonce }}"></script>
    <script src='https://fullcalendar.io/releases/fullcalendar/3.9.0/fullcalendar.min.js' nonce="{{ $nonce }}"></script>
    
    {{-- data table --}}
    <script  src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js" nonce="{{ $nonce }}"></script>
    <script  src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js" nonce="{{ $nonce }}"></script>
    <script src= "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" nonce="{{ $nonce }}"></script> 
    <script src= "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" nonce="{{ $nonce }}"></script> 
    <script src= "https://unpkg.com/bootstrap-table@1.16.0/dist/bootstrap-table.min.js" nonce="{{ $nonce }}"></script> 

    {{-- Datepicker --}}
      <!-- jQuery UI CSS -->
      <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <!-- jQuery UI JS -->
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" nonce="{{ $nonce }}"></script>
    
    {{-- search bar --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" nonce="{{ $nonce }}"></script>

    {{-- circle progres --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js" nonce="{{ $nonce }}"></script>

    {{-- LOGIN --}}
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js" nonce="{{ $nonce }}"></script>

<body>

    <div id="sidebar"></div>
    <div id="main-container">
        @yield('container')

    </div>

    
<script src="/js/sidebar.js" nonce="{{ $nonce }}"></script>

</body>
</html>