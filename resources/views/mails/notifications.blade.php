<?php
/**
 * Created by PhpStorm.
 * User: glasses
 * Date: 9/28/16
 * Time: 7:44 PM
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- jQuery-->
        <script type="text/javascript" src="{{ URL::asset('/assets/plugins/jquery/dist/jquery.min.js') }}"></script>
        <script type="text/javascript" href="{{ URL::asset('/assets/plugins/country-select-js-master/build/js/countrySelect.min.js') }}"></script>
        <!-- PACE-->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/plugins/PACE/themes/blue/pace-theme-flash.css') }}">
        <script type="text/javascript" src="{{URL::asset('/assets/plugins/PACE/pace.min.js')}}"></script>
        <!-- Bootstrap CSS-->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/plugins/bootstrap/dist/css/bootstrap.min.css') }}">
        <!-- Fonts-->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/plugins/themify-icons/themify-icons.css') }}">
        <!-- Malihu Scrollbar-->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/plugins/country-select-js-master/build/css/countrySelect.min.css') }}">
        <!-- Bootstrap Date Range Picker-->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/plugins/bootstrap-daterangepicker/daterangepicker.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/plugins/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}">
        <!-- Primary Style-->
        <link rel="stylesheet" type="text/css" href="{{URL::asset('/assets/build/css/first-layout.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::asset('/assets/plugins/select2-4.0.3/dist/css/select2.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::asset('/assets/plugins/bootstrap-sweetalert/lib/sweet-alert.css')}}">

        <style>
            body {
                background-size:     cover;
                background: url({{URL::asset("/uploads/".$churchDetails->logoName)}})
            }
        </style>
    </head>
    <body >
        <div class="container" >
            <div class="row">
                <div class="col-md-12">
                    <div class="widget">
                        <div class="widget-heading bg-success">
                            <h3 class="widget-title text-center" style=" color: #9dc8e2; font-weight: bold;">{{$churchDetails->name}} | Notifications</h3>
                        </div>
                        <div class="widget-body" style="padding: 15px;">
                            Hello <strong>{{$member}}</strong>, <br><br>
                            <div class="text-center">{{mail_message}}</div>
                            Yours In Christ,<br>
                            {{$churchDetails->name}}
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

