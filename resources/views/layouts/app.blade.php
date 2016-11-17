<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SaproSoft | @yield('title')</title>
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
    <!-- Animo.js-->
{{--    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/plugins/animo.js/animate-animo.min.css') }}">--}}
    <!-- Bootstrap Progressbar-->
{{--    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/plugins/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}">--}}
    <!-- Toastr-->
{{--    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/plugins/toastr/toastr.min.css') }}">--}}
    <!-- SpinKit-->
{{--    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/plugins/SpinKit/css/spinners/7-three-bounce.css') }}">--}}
    <!-- Jvector Map-->
{{--    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}">--}}
    <!-- Morris Chart-->
{{--    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/plugins/morris.js/morris.css') }}">--}}
    <!-- DataTables-->
{{--    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/plugins/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/plugins/datatables.net-colreorder-bs/css/colReorder.bootstrap.min.css') }}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/plugins/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}">--}}
    <!-- Weather Icons-->
{{--    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/plugins/weather-icons/css/weather-icons-wind.min.css') }}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/plugins/weather-icons/css/weather-icons.min.css') }}">--}}
    <!-- FullCalendar-->
{{--    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/plugins/fullcalendar/dist/fullcalendar.min.css') }}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/plugins/fullcalendar/dist/fullcalendar.print.css') }}" media="print">--}}
    <!-- jQuery MiniColors-->
{{--    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/plugins/jquery-minicolors/jquery.minicolors.css') }}">--}}
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/plugins/country-select-js-master/build/css/countrySelect.min.css') }}">
    <!-- Bootstrap Date Range Picker-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/plugins/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/plugins/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}">
    <!-- Primary Style-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('/assets/build/css/first-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('/assets/plugins/select2-4.0.3/dist/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('/assets/plugins/bootstrap-sweetalert/lib/sweet-alert.css')}}">
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
<body data-sidebar-color="sidebar-light" class="sidebar-light">
<header>
    <a href="#" class="brand pull-left"><i class="ti-align-center"></i>
        <h2></h2></a><a href="javascript:;" role="button" class="hamburger-menu pull-left"><span></span></a>
    <ul class="notification-bar list-inline pull-right"></ul>
</header>        <!-- Header end-->
<div class="main-container">
    <!-- Main Sidebar start-->
    <aside data-mcs-theme="minimal-dark" style="background-image: url{{URL::asset('/images/backgrounds/21.jpg')}}" class="main-sidebar mCustomScrollbar">
        <div class="user">
            <div id="esp-user-profile" data-percent="65" style="height: 130px; width: 130px; line-height: 100px; padding: 15px;" class="easy-pie-chart">
                <img src="{{URL::asset('/images/users/04.jpg')}}" alt="" class="avatar img-circle">
                <span class="status bg-success"></span>
            </div>
                <h4 class="fs-16 text-muted mt-15 mb-5 fw-300">{{Auth::user()->name}}</h4>

        </div>
        <ul class="list-unstyled navigation mb-0">

            <li><a href="{{url('/home')}}" class="bubble"><i class="ti-home"></i> Dashboard</a></li>

            <li class="panel">
                <a role="button" data-toggle="collapse" data-parent=".navigation" href="#collapse1" aria-expanded="false" aria-controls="collapse1" class="collapsed">
                    <i class="ti-palette"></i>Membership
                </a>
                <ul id="collapse1" class="list-unstyled collapse">
                    <li><a href="{{action("MembershipController@create")}}">Add New Member</a></li>
                    {{--<li><a href="{{action("MembershipController@index")}}">Update Member Info</a></li>--}}
                    <li><a href="{{action("MembershipController@index")}}">Update Member Info</a></li>
                    <li><a href="{{action("MembershipController@index")}}">View Member Details</a></li>
                    <li><a href="{{action("MembershipController@index")}}">Membership List</a></li>
                </ul>
            </li>

            <li class="panel">
                <a role="button" data-toggle="collapse" data-parent=".navigation" href="#collapse2" aria-expanded="false" aria-controls="collapse2" class="collapsed">
                    <i class="ti-money"></i>Finances
                </a>
                <ul id="collapse2" class="list-unstyled collapse">
                    <li><a href="{{action('FinancesController@create',['type' => 'tithe'])}}">Record Tithe</a></li>
                    <li><a href="{{action('FinancesController@create',['type' => 'pledges'])}}">Record Pledges</a></li>
                    <li><a href="{{action('FinancesController@create',['type' => 'welfare'])}}">Record Welfare</a></li>
                    <li><a href="{{action('FinancesController@index',['category' => 'Pledges'])}}">Redeem Pledges</a></li>
                    <li><a href="{{action('FinancesController@create',['type' => 'offertory'])}}">Record Offertory</a></li>
                    <li><a href="{{action('FinancesController@create',['type' => 'donations'])}}">Record Donations</a></li>
                    <li><a href="{{action('FinancesController@create',['type' => 'expenditure'])}}">Record Expenditure</a></li>
                    <li><a href="{{action("MembershipController@index")}}">Member Payment History</a></li>
                </ul>
            </li>

            <li class="panel">
                <a role="button" data-toggle="collapse" data-parent=".navigation" href="#collapse3" aria-expanded="false" aria-controls="collapse3" class="collapsed">
                    <i class="ti-announcement"></i>Notifications
                </a>
                <ul id="collapse3" class="list-unstyled collapse">
                    <li><a href="{{action("NotificationsController@create",['category' => 'sms'])}}">SMS Notifications</a></li>
                    <li><a href="{{action("NotificationsController@create",['category' => 'voice'])}}">Voice Notifications</a></li>
                    <li><a href="{{action("NotificationsController@create",['category' => 'mail'])}}">E-mail Notifications</a></li>
                </ul>
            </li>

            <li class="panel">
                <a role="button" data-toggle="collapse" data-parent=".navigation" href="#collapse4" aria-expanded="false" aria-controls="collapse4" class="collapsed">
                    <i class="ti-user"></i>Accounts
                </a>
                <ul id="collapse4" class="list-unstyled collapse">
                    <li>
                        <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log-Out</a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    <li><a href="{{action("AccountsController@index")}}">Remove Account</a></li>
                    <li><a href="{{action("AccountsController@create",['category' => 'account'])}}">Add New Account</a></li>
                    <li><a href="{{action("AccountsController@index")}}">Edit Account Privileges</a></li>
                    <li><a href="{{action("AccountsController@show",\Auth::User()->id)}}">Update Account Credentials</a></li>
                </ul>
            </li>

            <li class="panel">
                <a role="button" data-toggle="collapse" data-parent=".navigation" href="#collapse5" aria-expanded="false" aria-controls="collapse5" class="collapsed">
                    <i class="ti-magnet"></i>Utilities
                </a>
                <ul id="collapse5" class="list-unstyled collapse">
                    <li><a href="{{action("UtilitiesController@create",['category' => 'attendance'])}}">Record Attendance</a></li>
                    <li><a href="{{action("UtilitiesController@create",['category' => 'church'])}}">Update Church Details</a></li>
                    <li><a href="{{action("UtilitiesController@index",['category' => 'groups'])}}">Add Groups/Sub-Ministries</a></li>
                    <li><a href="{{action("UtilitiesController@create",['category' => 'bdWisher'])}}">Update Birthday Wisher Settings</a></li>
                </ul>
            </li>
            <li class="panel">
                <a role="button" data-toggle="collapse" data-parent=".navigation" href="#collapse6" aria-expanded="false" aria-controls="collapse6" class="collapsed">
                    <i class="ti-bar-chart-alt"></i>Reports
                </a>
                <ul id="collapse6" class="list-unstyled collapse">
                    <li><a href="{{action("ReportsController@index",['category' => 'tithe'])}}" class="">Tithe Report</a></li>
                    <li><a href="{{action("ReportsController@index",['category' => 'welfare'])}}">Welfare Report</a></li>
                    <li><a href="{{action("ReportsController@index",['category' => 'pledges'])}}" >Pledges Report</a></li>
                    <li><a href="{{action("ReportsController@index",['category' => 'activities'])}}">Activity Logger</a></li>
                    <li><a href="{{action("ReportsController@index",['category' => 'offertories'])}}">Offertory Report</a></li>
                    <li><a href="{{action("ReportsController@index",['category' => 'donations'])}}">Donations Report</a></li>
                    <li><a href="{{action("ReportsController@index",['category' => 'expenses'])}}">Expenses Report</a></li>
                    <li><a href="{{action("ReportsController@index",['category' => 'attendance'])}}">Attendance Report</a></li>
                    <li><a href="{{action("ReportsController@index",['category' => 'membership'])}}">Membership Report</a></li>
                    <li><a href="{{action("ReportsController@index",['category' => 'accounts'])}}" >Account-Usage Report</a></li>

                </ul>
            </li>
        </ul>
    </aside>
    <!-- Main Sidebar end-->
    <div class="page-container">
        <div class="page-header clearfix">
            <div class="pull-left">
                <h4 class="mt-0 mb-5">@yield('pageDescription')</h4>
                <p class="text-muted mb-0">@yield('routeName')</p>
            </div>
        </div>
        <div class="page-content container-fluid">
            <div class="col-lg-12">
                @yield('content')
            </div>
        </div>
    </div>

</div>

{{--<script type="text/javascript" src="{{ URL::asset('/assets/plugins/Chartjs/Chart.min.js') }}"></script>--}}
<!-- Bootstrap JavaScript-->
<script type="text/javascript" src="{{ URL::asset('/assets/plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Malihu Scrollbar-->
<script type="text/javascript" src="{{ URL::asset('/assets/plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<!-- Animo.js-->
<script type="text/javascript" src="{{ URL::asset('/assets/plugins/animo.js/animo.min.js') }}"></script>
<!-- Bootstrap Progressbar-->
{{--<script type="text/javascript" src="{{ URL::asset('/assets/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>--}}
<!-- jQuery Easy Pie Chart-->
<script type="text/javascript" src="{{ URL::asset('/assets/plugins/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js') }}"></script>
<!-- Toastr-->
{{--<script type="text/javascript" src="{{ URL::asset('/assets/plugins/toastr/toastr.min.js') }}"></script>--}}
<!-- MomentJS-->
<script type="text/javascript" src="{{ URL::asset('/assets/plugins/moment/min/moment.min.js') }}"></script>
<!-- jQuery BlockUI-->
<script type="text/javascript" src="{{ URL::asset('/assets/plugins/blockUI/jquery.blockUI.js') }}"></script>
<!-- jQuery Counter Up-->
{{--<script type="text/javascript" src="{{ URL::asset('/assets/plugins/jquery-waypoints/waypoints.min.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ URL::asset('/assets/plugins/Counter-Up/jquery.counterup.min.js') }}"></script>--}}
<!-- Jvector Map-->
{{--<script type="text/javascript" src="{{ URL::asset('/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ URL::asset('/assets/plugins/jvectormap/maps/jquery-jvectormap-world-mill.js') }}"></script>--}}
<!-- Flot Charts-->
<!-- [if lte IE 8]>


{{--<script type="text/javascript" src="{{ URL::asset('/assets/plugins/flot/jquery.flot.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ URL::asset('/assets/plugins/flot/jquery.flot.resize.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ URL::asset('/assets/plugins/flot.curvedlines/curvedLines.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ URL::asset('/assets/plugins/flot.tooltip/js/jquery.flot.tooltip.min.js') }}"></script>--}}
<!-- Morris Chart-->
{{--<script type="text/javascript" src="{{ URL::asset('/assets/plugins/raphael/raphael-min.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ URL::asset('/assets/plugins/morris.js/morris.min.js') }}"></script>--}}
<!-- DataTables-->
{{--<script type="text/javascript" src="{{ URL::asset('/assets/plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ URL::asset('/assets/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ URL::asset('/assets/plugins/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ URL::asset('/assets/plugins/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ URL::asset('/assets/plugins/jszip/dist/jszip.min.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ URL::asset('/assets/plugins/pdfmake/build/pdfmake.min.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ URL::asset('/assets/plugins/pdfmake/build/vfs_fonts.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ URL::asset('/assets/plugins/datatables.net-buttons/js/buttons.print.min.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ URL::asset('/assets/plugins/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ URL::asset('/assets/plugins/datatables.net-colreorder/js/dataTables.colReorder.min.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ URL::asset('/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ URL::asset('/assets/plugins/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>--}}
<!-- jQuery UI-->
<script type="text/javascript" src="{{ URL::asset('/assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- FullCalendar-->
{{--<script type="text/javascript" src="{{ URL::asset('/assets/plugins/fullcalendar/dist/fullcalendar.min.js') }}"></script>--}}
<!-- jQuery MiniColors-->
{{--<script type="text/javascript" src="{{ URL::asset('/assets/plugins/jquery-minicolors/jquery.minicolors.min.js') }}"></script>--}}
<!-- Bootstrap Date Range Picker-->
{{--<script type="text/javascript" src="{{ URL::asset('/assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>--}}
<!-- Custom JS-->
<script type="text/javascript" src="{{ URL::asset('/assets/build/js/first-layout/app.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/assets/build/js/first-layout/demo.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/assets/plugins/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/assets/plugins/select2-4.0.3/dist/js/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/assets/plugins/bootstrap-sweetalert/lib/sweet-alert.min.js') }}"></script>

{{--<script type="text/javascript" src="{{ URL::asset('/assets/main/js/typeahead.js') }}"></script>--}}

@if(Session::has('error'))
    <script type="text/javascript">
        sweetAlertInitialize();
        swal({
            type: "error",
            title: "{{ Session::get('error') }}",
            confirmButtonClass:"btn-raised btn-danger",
            confirmButtonText:"OK"
        })
    </script>
@endif

@if(Session::has('success'))
    <script type="text/javascript">
        sweetAlertInitialize();
        swal({
            type: "success",
            title: "{{ Session::get('success') }}",
            confirmButtonClass:"btn-raised btn-success",
            confirmButtonText:"OK"
        })
    </script>
@endif
<script type="text/javascript">

    $(document).ready(function () {
        var marriageStatus = $(this).val();
        var spouseName = $("#nameOfSpouse");
        var spousePhone = $("#spousePhone");
        if(marriageStatus != null && (marriageStatus).trim() == "single")
        {

            spouseName.removeAttr("required");
            spousePhone.removeAttr("required");

            spouseName.attr("readonly","readonly");
            spousePhone.attr("readonly","readonly");

            spouseName.attr("placeholder","Not required anymore because you're single");
            spousePhone.attr("placeholder","Not required anymore because you're single");
        }else
        {
            spouseName.attr("required");
            spousePhone.attr("required");

            spouseName.removeAttr("readonly","readonly");
            spousePhone.removeAttr("readonly","readonly");

        }
    });


    $(".datePickerInput").datetimepicker({
        format:"YYYY-MM-DD"
    });

    $(".select2Field").select2({
        placeholder: (($(this).attr("select2placeholder") == null ) ? "Please Select. Type a word for hint" : $(this).attr("select2placeholder")),
        allowClear: true
    });

    $("#marriageStatus").change(function () {
        var marriageStatus = $(this).val();
        var spouseName = $("#nameOfSpouse");
        var spousePhone = $("#spousePhone");
        if(marriageStatus != null && (marriageStatus).trim() == "single")
        {

            spouseName.removeAttr("required");
            spousePhone.removeAttr("required");

            spouseName.attr("readonly","readonly");
            spousePhone.attr("readonly","readonly");

            spouseName.attr("placeholder","Not required anymore because you're single");
            spousePhone.attr("placeholder","Not required anymore because you're single");
        }else
        {
            spouseName.attr("required");
            spousePhone.attr("required");

            spouseName.removeAttr("readonly","readonly");
            spousePhone.removeAttr("readonly","readonly");

        }
    });
    
    $(".comingSoon").click(function () {
        sweetAlertInitialize();
        swal({
            type: "info",
            title: "Hello, This is under construction, will be done soon. :)",
            confirmButtonClass:"btn-raised btn-info",
            confirmButtonText:"OK"
        });
        return false;
    });
</script>
@yield('pageScripts')

</body>
</html>
<!-- Localized -->