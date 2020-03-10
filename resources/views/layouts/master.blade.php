<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Wildlife Insights Taxonomy Search">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <script type="text/javascript" src="{{ asset('js/vendor/modernizr.js') }}"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato|Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.6.1/css/all.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/themes/fresca.theme.min.css') !!}" />
    <link rel="stylesheet" type="text/css" href="{!! asset('css/main.css') !!}" />
    @stack('styles')
</head>
<body>
    <div class="d-flex flex-column" id="wrapper">
        @include('layouts.includes.navbar')
        <main id="page-content">
            @yield('content')
        </main>
    </div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script
<script type="text/javascript" src="{{ asset('js/vendor/tableExport/tableExport.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/vendor/tableExport/js-xlsx/xlsx.core.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/vendor/tableExport/FileSaver/FileSaver.min.js') }}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://unpkg.com/vue"></script>
<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>
<script type="text/javascript" src="{!! asset('js/app.js') !!}"></script>
@stack('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    });
    (function(){
        "use strict";
        $('.nav a').click(function() {
            $('.navbar-collapse').collapse('hide');
        });
    })();
</script>
</body>
</html>
