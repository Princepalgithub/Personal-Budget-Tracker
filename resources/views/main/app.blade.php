<!-- resources/views/layouts/master.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Budget Tracker</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="{{ asset('asstes/sidebar.css') }}" rel="stylesheet">
</head>
<body>
    <div class="d-flex">
        @include('layouts.sidebar')
        <div class="content p-4">
            @yield('content')
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>


</body>
<script>
    $(document).ready(function() {
        $('#transactions-table').DataTable({
            "paging": false, // Disable DataTables paging since Laravel pagination is used
            "info": false // Disable info display
        });
    });
</script>
</html>
