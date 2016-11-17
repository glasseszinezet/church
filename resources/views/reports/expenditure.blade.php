<?php
/**
 * Created by PhpStorm.
 * User: glasses
 * Date: 9/26/16
 * Time: 6:05 PM
 */
?>
@extends('layouts.app')
@section('title')
    Reports | Expenditure
@endsection
@section('pageDescription')
    Expenditure Report
@endsection
@section('routeName')
    {{Route::getCurrentRoute()->getPath()}} / expenses
@endsection
@section('content')
    @include('layouts.partials.reports',['graphTitle' => 'Expenditure Report', 'btnClass' => 'btn-default', 'paneType' => 'bg-default', "category" => $category])
    {{--{{$graphData}}--}}
@endsection
@section('pageScripts')

    <script type="text/javascript">
        var dates = eval(<?= $dates ?>);
        var data = eval(<?= $graphData ?>);
        $('#graphContainer').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Expenditure Report : from: {{$startDate->toFormattedDateString()}} to {{$stopDate->toFormattedDateString()}}'
            },
            xAxis: {
                categories: dates
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Expenses',
                data: data
            }]
        });
    </script>
@endsection
