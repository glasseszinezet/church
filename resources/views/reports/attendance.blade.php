<?php
/**
 * Created by PhpStorm.
 * User: glasses
 * Date: 9/26/16
 * Time: 6:28 PM
 */
?>
@extends('layouts.app')
@section('title')
    Reports | Attendance
@endsection
@section('pageDescription')
    Attendance Report
@endsection
@section('routeName')
    {{Route::getCurrentRoute()->getPath()}} / attendance
@endsection
@section('content')
    @include('layouts.partials.reports',['graphTitle' => 'Attendance Report', 'btnClass' => 'btn-black', 'paneType' => 'bg-black', "category" => $category])
@endsection
@section('pageScripts')

    <script type="text/javascript">
        var dates = eval(<?= $dates ?>);
        var graphData = eval(<?= $graphData ?>);

        $('#graphContainer').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Attendance Reports - from: {{$startDate->toFormattedDateString()}} to {{$stopDate->toFormattedDateString()}}'
                },
                xAxis: {
                    categories: dates
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Attendance'
                    },
                    stackLabels: {
                        enabled: true,
                        style: {
                            fontWeight: 'bold',
                            color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                        }
                    }
                },
                legend: {
                    align: 'right',
                    x: -30,
                    verticalAlign: 'top',
                    y: 25,
                    floating: true,
                    backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
                    borderColor: '#CCC',
                    borderWidth: 1,
                    shadow: false
                },
                tooltip: {
                    headerFormat: '<b>{point.x}</b><br/>',
                    pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
                },
                plotOptions: {
                    column: {
                        stacking: 'normal',
                        dataLabels: {
                            enabled: true,
                            color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                            style: {
                                textShadow: '0 0 3px black'
                            }
                        }
                    }
                },
                series: graphData
            });
    </script>
@endsection
