<?php
/**
 * Created by PhpStorm.
 * User: glasses
 * Date: 9/24/16
 * Time: 10:56 AM
 */
?>
@extends('layouts.app')
@section('title')
    Reports | Offertory
@endsection
@section('pageDescription')
    Offertory Report
@endsection
@section('routeName')
    {{Route::getCurrentRoute()->getPath()}} / offertories
@endsection
@section('content')
    @include('layouts.partials.reports',['graphTitle' => 'Offertories Report', 'btnClass' => 'btn-warning', 'paneType' => 'bg-warning', "category" => $category])
@endsection
@section('pageScripts')
    <script type="text/javascript">
        var graphData = eval(<?= $graphData ?>);
        var dates = eval(<?= $dates ?>);

        $('#graphContainer').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Offertory Reports'
            },
            subtitle: {
                text: 'from: {{$startDate->toFormattedDateString()}} to {{$stopDate->toFormattedDateString()}}',
            },
            xAxis: {
                categories: dates,
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Offertory in cedis',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valueSuffix: ' cedis'
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -40,
                y: 70,
                floating: true,
                borderWidth: 1,
                backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
                shadow: true
            },
            credits: {
                enabled: false
            },
            series: graphData
        });
    </script>
@endsection
