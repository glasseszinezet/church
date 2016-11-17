<?php
/**
 * Created by PhpStorm.
 * User: glasses
 * Date: 9/21/16
 * Time: 3:38 PM
 */
?>
@extends('layouts.app')
@section('title')
    Reports | Tithe
@endsection
@section('pageDescription')
    Tithe Report
@endsection
@section('routeName')
    {{Route::getCurrentRoute()->getPath()}} / tithes
@endsection
@section('content')
    @include('layouts.partials.reports',['graphTitle' => 'Tithe Report', 'btnClass' => 'btn-success', 'paneType' => 'bg-success', "category" => $category])
@endsection
@section('pageScripts')
    <script>
        var data = eval(<?= $graphData ?>);

        var dataObject = "[";
        var dateObject = "[";

        $.each(data, function (index, value) {
            dataObject += value.amount+",";
            dateObject += "'"+value.date+"',";
        });


        dataObject = eval(dataObject.substr(0,dataObject.length-1)+"]");
        dateObject = eval(dateObject.substr(0,dateObject.length-1)+"]");

        $('#graphContainer').highcharts({
            chart: {
                zoomType: 'x'
            },
            title: {
                text: 'Tithe Reports Between '+"{{$startDate->toFormattedDateString()}}"+' to '+"{{$stopDate->toFormattedDateString()}}"
            },
            subtitle: {
                text: document.ontouchstart === undefined ? 'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in'
            },
            xAxis: {
                categories: dateObject
            },
            yAxis: {
                title: {
                    text: 'Amount in GHS'
                }
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                area: {
                    fillColor: {
                        linearGradient: {
                            x1: 0,
                            y1: 0,
                            x2: 0,
                            y2: 1
                        },
                        stops: [
                            [0, Highcharts.getOptions().colors[0]],
                            [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                        ]
                    },
                    marker: {
                        radius: 2
                    },
                    lineWidth: 1,
                    states: {
                        hover: {
                            lineWidth: 1
                        }
                    },
                    threshold: null
                }
            },

            series: [{
                type: 'area',
                name: 'Tithe',
                data: dataObject
            }]
        });

    </script>
@endsection
