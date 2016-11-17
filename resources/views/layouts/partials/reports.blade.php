<?php
/**
 * Created by PhpStorm.
 * User: glasses
 * Date: 9/21/16
 * Time: 3:33 PM
 */
?>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<div class="widget">
    <div class="widget-heading {{$paneType}} ">
        <h3 class="widget-title text-center" style=" color: #9dc8e2; font-weight: bold;">{{$graphTitle}}</h3>
    </div>
    <div class="widget-body row">
        @if(isset($showDatePicker) && $showDatePicker)
            {!! Form::open(["method" => "GET",'action' => ["ReportsController@index"]]) !!}
                {!! Form::hidden("category", $category)  !!}
                <div class="text-center col-md-4">
                    {!! Form::text('startDate', $startDate, array('class' => 'form-control datePickerInput' ,'placeholder' => 'Start date for report generation', 'required')) !!}
                </div>
                <div class="text-center col-md-4">
                    {!! Form::text('stopDate', $stopDate, array('class' => 'form-control datePickerInput' ,'placeholder' => 'stop date for report generation', 'required')) !!}
                </div>
                <div class="form-group col-md-4">
                    {!! Form::submit("Get Report",['class' => $btnClass.' form-control']) !!}
                </div>
            {!! Form::close() !!}
        @endif
        <div id="graphContainer"></div>
    </div>
</div>
