<!DOCTYPE html>
<html>
<head>
    <title>
        @section('title')
        NewProject Admin
        @show
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Scripts are placed here -->
    {{ HTML::script('/assets/bower_components/jquery/jquery.min.js') }}
    {{ HTML::script('/assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}

    <!-- CSS are placed here -->
    {{ HTML::style('/assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}
    {{ HTML::style('/assets/bower_components/bootstrap/dist/css/bootstrap-theme.min.css') }}
    {{ HTML::style('/css/admin.css') }}

    <style>
        @section('styles')
            body {
                padding-top: 60px;
            }
        @show
    </style>


</head>

<body>

<!-- Container -->
<div class="container">

    <!-- Content -->
    @yield('main')

</div>

</body>
</html>
