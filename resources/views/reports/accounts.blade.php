<?php
/**
 * Created by PhpStorm.
 * User: glasses
 * Date: 9/27/16
 * Time: 10:59 AM
 */
?>
@extends('layouts.app')
@section('title')
    Reports | Account Usage Reports
@endsection
@section('pageDescription')
    Account Usage Reports
@endsection
@section('routeName')
    {{Route::getCurrentRoute()->getPath()}} / accounts
@endsection
@section('content')
    @include('layouts.partials.reports',['graphTitle' => 'Accounts Usage Reports', 'btnClass' => 'btn-danger', 'paneType' => 'bg-danger', "category" => $category, "showDatePicker" => false])
@endsection
@section('pageScripts')
    <script type="text/javascript">
        var graphData = eval(<?= $data ?>);
        var finalDAta = "[";
        for(var i =0; i < graphData.length; i++)
        {
            finalDAta += "['"+graphData[i].name+"', "+graphData[i].numberOfLogIns+"],";
        }
       finalDAta = eval(finalDAta.substr(0, finalDAta.length-1)+"]")

            $('#graphContainer').highcharts({
                chart: {
                    type: 'pie',
                    options3d: {
                        enabled: true,
                        alpha: 45
                    }
                },
                title: {
                    text: 'Account Usage reports'
                },
                subtitle: {
                    text: 'Number of log-ins per user'
                },
                plotOptions: {
                    pie: {
                        innerSize: 100,
                        depth: 45
                    }
                },
                series: [{
                    name: 'Delivered amount',
                    data: finalDAta
                }]
            });
    </script>
@endsection