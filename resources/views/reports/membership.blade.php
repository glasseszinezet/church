<?php
/**
 * Created by PhpStorm.
 * User: glasses
 * Date: 9/26/16
 * Time: 8:41 PM
 */
?>
@extends('layouts.app')
@section('title')
    Reports | Membership
@endsection
@section('pageDescription')
    Attendance Membership
@endsection
@section('routeName')
    {{Route::getCurrentRoute()->getPath()}} / membership
@endsection
@section('content')
    @include('layouts.partials.reports',['graphTitle' => 'Membership Report', 'btnClass' => 'btn-demo', 'paneType' => 'bg-demo', "category" => $category])
@endsection
@section('pageScripts')
<script type="text/javascript">

    var data = eval(<?= $graphData ?>);
    var dates = eval(<?= $dates ?>);
    $('#graphContainer').highcharts({
        chart: {
            type: 'column',
            margin: 75,
            options3d: {
                enabled: true,
                alpha: 15,
                beta: 10,
                depth: 50
            }
        },
        title: {
            style: {
                font: 'bold 15px "Trebuchet MS", Verdana, sans-serif'
            },

            text: "Membership Reports from: {{$startDate->toFormattedDateString()}} to {{$stopDate->toFormattedDateString()}}"
        },
        xAxis: {
            categories: dates
        },
        plotOptions: {
            column: {
                depth: 25,
                colorByPoint: true
            }
        },
        series: [
            {
                name: 'Total No: of Members',
                data: data
            }
        ]
    });


</script>
@endsection
