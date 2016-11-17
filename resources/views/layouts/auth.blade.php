<!DOCTYPE html>
<html lang="en" style="height: 100%">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Authentication | @yield('pageTitle')</title>
    <!-- PACE-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/plugins/PACE/themes/blue/pace-theme-flash.css') }}">
    <script type="text/javascript" src="{{ URL::asset('/assets/plugins/PACE/pace.min.js')}}"></script>
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/plugins/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Fonts-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/plugins/themify-icons/themify-icons.css') }}">
    <!-- Primary Style-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/build/css/first-layout.css') }}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!-- WARNING: Respond.js doesn't work if you view the page via file://-->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script type="text/javascript" src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
        window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?>
    </script>

</head>
<body style="background-image: url({{ URL::asset('/images/backgrounds/16.jpg')  }}) " class="body-bg-full">
<div class="container page-container">
    <div class="page-content">
        <div class="logo"><h1><i class="ti-align-center"></i></h1></div>
        @yield('authForm')

    </div>
</div>
<!-- Demo Settings start-->

<!-- Demo Settings end-->
<!-- jQuery-->
<script type="text/javascript" src="{{ URL::asset('/assets/plugins/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap JavaScript-->
<script type="text/javascript" src="{{ URL::asset('/assets/plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Custom JS-->
<script type="text/javascript" src="{{ URL::asset('/assets/build/js/first-layout/extra-demo.js') }}"></script>
</body>
</html>
<!-- Localized -->