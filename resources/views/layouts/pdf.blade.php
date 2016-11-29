<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8"/>
    <title>InfyOm Metronic Template</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
          type="text/css"/>

    <link href="{{asset('/assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('/assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('/assets/global/plugins/uniform/css/uniform.default.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{asset('/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css')}}"
          rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('/assets/global/plugins/morris/morris.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('/assets/global/plugins/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('/assets/global/plugins/jqvmap/jqvmap/jqvmap.css')}} " rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL PLUGINS -->

    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{asset('/assets/global/css/components.min.css')}}" rel="stylesheet" id="style_components"
          type="text/css"/>
    <link href="{{asset('/assets/global/css/plugins.min.css')}}
            " rel="stylesheet" type="text/css"/>
    <!-- END THEME GLOBAL STYLES -->

    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{asset('/assets/layouts/layout/css/layout.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('/assets/layouts/layout/css/themes/darkblue.min.css')}}" rel="stylesheet" type="text/css"
          id="style_color"/>
    <link href="{{asset('/assets/layouts/layout/css/custom.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('../assets/to-do.css')}}" rel="stylesheet" type="text/css"/>

    <!-- END THEME LAYOUT STYLES -->

    <link rel="shortcut icon" href="favicon.ico"/>
    <style type="text/css" media="print">
        div.page
        {
            page-break-after: always;
            page-break-inside: avoid;
        }
    </style>
    @stack('styles')
</head>
<body class="portlet light">

@yield('content')

<!-- jQuery -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<!-- Ui kit -->
<script src="{{asset('js/uikit.min.js')}}"></script>
<!-- jQuery Easing -->
<script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- Waypoints -->
<script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
<!-- Stellar Parallax -->
<script src="{{asset('js/jquery.stellar.min.js')}}"></script>
<!-- Owl Carousel -->
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<!-- Counters -->
<script src="{{asset('js/jquery.countTo.js')}}"></script>
<!-- switcher -->
<script src="{{asset('js/jquery.style.switcher.js')}}"></script>
@stack('scripts')
<script src="js/google_map.js"></script>

<!-- Main JS (Do not remove) -->
<script src="js/main.js"></script>

</body>
</html>

