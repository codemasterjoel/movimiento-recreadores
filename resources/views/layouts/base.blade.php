<!DOCTYPE html>
<html lang="es" style="overflow-x: auto;">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        MOV. RECREADORES
    </title>
    <!-- Fonts and icons
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />     -->
    <!-- Nucleo Icons -->
    <script src="{{asset('css/3.4.4')}}"></script>
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <link href="{{asset('css/material-icons.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/icon.css')}}" rel="stylesheet" />
    <link href="{{asset('css/css2.css')}}"rel="stylesheet">
    <link href="{{asset('css/css3.css')}}"rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""> --}}
    {{-- <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script> --}}
    {{-- <script src="https://lab.digital-democracy.org/leaflet-bing-layer/leaflet-bing-layer.js"></script> --}}
    <script src="{{asset('js/leaflet-bing-layer.js')}}" rel="stylesheet"></script>
    <!-- Font Awesome Icons
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script> -->
    <script src="{{ asset('js/Chart.js')}}"></script>
    <script src="{{ asset('js/chart.min.js')}}"></script>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1" rel="stylesheet" />
    @livewireStyles
</head>

<body class="g-sidenav-show bg-gray-100">

    {{ $slot }}

    <!--   Core JS Files   --> 
    {{-- <script src="{{ asset('js/google.js')}}"></script> --}}
    <!-- <script src="{{asset('assets/js/core/popper.min.js')}}"></script> -->
    <!-- <script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script> -->
    <!-- <script src="{{asset('assets/js/plugins/smooth-scrollbar.min.js')}}"></script> -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquerygoogle.min.js') }}"></script>
    <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script-->
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons
    <script async defer src="https://buttons.github.io/buttons.js"></script> -->
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <!-- <script src="{{ asset('assets/js/soft-ui-dashboard.js')}}"></script> -->
    <script src="{{ asset('js/jquery.mask.min.js')}}"></script>
    <script src="{{asset('js/tailmater.js')}}"></script>
    @livewireScripts
</body>

</html>