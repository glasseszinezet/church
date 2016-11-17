<?php
/**
 * Created by PhpStorm.
 * User: glasses
 * Date: 9/21/16
 * Time: 7:49 PM
 */
?>
@extends('layouts.app')
@section('title')
    Reports | Pledges
@endsection
@section('pageDescription')
    Pledges Report
@endsection
@section('routeName')
    {{Route::getCurrentRoute()->getPath()}} / pledges
@endsection
@section('content')
    @include('layouts.partials.reports',['graphTitle' => 'Pledges Report', 'btnClass' => 'btn-info', 'paneType' => 'bg-info', "category" => $category])
@endsection
@section('pageScripts')
<script type="text/javascript">
    var redeemed = eval(<?= $redeemed ?>);
    var nonRedeemed = eval(<?= $nonRedeemed ?>);

    var dateObject = "[";
    var redeemedObject = "[";
    var nonRedeemedObject = "[";
    for(var i =0; i < redeemed.length; i++)
    {
        dateObject += "'"+redeemed[i].date+"',";
        redeemedObject += redeemed[i].amount+",";
        nonRedeemedObject += nonRedeemed[i].amount+",";
    }
    dateObject = eval(dateObject.substr(0,dateObject.length-1)+"]");
    redeemedObject = eval(redeemedObject.substr(0,redeemedObject.length-1)+"]");
    nonRedeemedObject = eval(nonRedeemedObject.substr(0,nonRedeemedObject.length-1)+"]");


    $('#graphContainer').highcharts({
            title: {
                text: "Redeemed and Non-Redeemed Pledges",
                x: -20 //center
            },
            subtitle: {
                text: 'from: {{$startDate->toFormattedDateString()}} to {{$stopDate->toFormattedDateString()}}',
                x: -20
            },
            xAxis: {
                categories: dateObject
            },
            yAxis: {
                title: {
                    text: 'Amount in GHS'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: ' (GHS)'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'Redeemed',
                data: redeemedObject
            }, {
                name: 'Non-Redeemed',
                data: nonRedeemedObject
            }]
        });

</script>
@endsection