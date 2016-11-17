<?php
/**
 * Created by PhpStorm.
 * User: glasses
 * Date: 9/26/16
 * Time: 5:37 PM
 */
?>
@extends('layouts.app')
@section('title')
    Reports | Donations
@endsection
@section('pageDescription')
    Donations Report
@endsection
@section('routeName')
    {{Route::getCurrentRoute()->getPath()}} / donations
@endsection
@section('content')
    @include('layouts.partials.reports',['graphTitle' => 'Donations Report', 'btnClass' => 'btn-primary', 'paneType' => 'bg-primary', "category" => $category])
@endsection
@section('pageScripts')
    <script type="text/javascript">
        var dates = eval(<?= $dates ?>);
        var graphData = eval(<?= $graphData ?>);
//        console.log(graphData);
            $('#graphContainer').highcharts({
                chart: {
                    type: 'area',
                    spacingBottom: 30
                },
                title: {
                    text: 'Donations Report'
                },
                subtitle: {
                    text: 'from: {{$startDate->toFormattedDateString()}} to {{$stopDate->toFormattedDateString()}}',
                    floating: true,
                    align: 'right',
                    verticalAlign: 'bottom',
                    y: 15
                },
                legend: {
                    layout: 'vertical',
                    align: 'left',
                    verticalAlign: 'top',
                    x: 150,
                    y: 100,
                    floating: true,
                    borderWidth: 1,
                    backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
                },
                xAxis: {
                    categories: dates
                },
                yAxis: {
                    title: {
                        text: 'Amount in GHS'
                    },
                    labels: {
                        formatter: function () {
                            return this.value;
                        }
                    }
                },
                tooltip: {
                    formatter: function () {
                        return '<b>' + this.series.name + '</b><br/>' +
                                this.x + ': ' + this.y;
                    }
                },
                plotOptions: {
                    area: {
                        fillOpacity: 0.5
                    }
                },
                credits: {
                    enabled: false
                },
                series: [{
                    name: 'Donations',
                    data: graphData
                }]
            });
    </script>
@endsection
