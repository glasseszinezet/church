<?php
/**
 * Created by PhpStorm.
 * User: glasses
 * Date: 9/12/16
 * Time: 2:43 PM
 */
?>
@extends('layouts.app')
@section('title')
    Record Offertory
@endsection
@section('pageDescription')
    Record Offertory
@endsection
@section('routeName')
    {{Route::getCurrentRoute()->getPath()}} / Offertory
@endsection
@section('content')
    @php($submitButtonText = "Record Offertory")
    @php($btnClass = "btn-warning")
    @php($amountPlaceHolder = "How much Offertory")
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-warning">
                    <div class="panel-heading text-center">Record New Offertory</div>
                    <div class="panel-body">
                        {!! Form::open(['url' => action('FinancesController@store')]) !!}
                        {!! Form::hidden('type', 'Offertory') !!}
                        <div class="form-group text-center">
                            {!! Form::label('service_id', 'Service', array('class' => 'control-label')) !!}
                            {!! Form::select('service_id',$services,null,['class' => 'form-control text-center','placeholder' => '--Select Service --', 'required']) !!}
                        </div>

                        <div class="form-group text-center">
                            {!! Form::label('session_id', 'Session', array('class' => 'control-label')) !!}
                            {!! Form::select('session_id',array(),null,['class' => 'form-control text-center','placeholder' => '--Select Session --', 'required']) !!}
                        </div>

                        <div class="form-group text-center">
                            {!! Form::label('currency_id', 'Currency', array('class' => 'control-label')) !!}
                            {!! Form::select('currency_id',$currencies, ((isset($initialise)) ? $initialise : null) ,['class' => 'form-control text-center select2Field','placeholder' => '--Select Currency --', 'required', 'select2Placeholder' => 'Select Currency']) !!}
                        </div>

                        <div class="form-group text-center">
                            {!! Form::label('amount', 'Amount', array('class' => 'control-label')) !!}
                            {!! Form::number('amount', null, array('class' => 'form-control','placeholder' => (isset($amountPlaceHolder) ? $amountPlaceHolder : 'How Much is the Member Paying' ), 'min' => 1, 'required', 'step' => '.01')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit($submitButtonText,['class' => $btnClass.' form-control offertory']) !!}
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var session = $("#session_id");
        $("#service_id").change(function () {
            if(isNaN(parseInt($(this).val())))
            {
                session.html("<option>--Select Session --</option>");
            }else
            {

                $.ajax({
                    url: '/sessions',
                    type: 'GET',
                    data: {_token: window.Laravel.csrfToken, serviceId: $(this).val()},
                    success: function (data) {
                        if(data != null && data != "")
                        {
                            session.html("<option>--Select Session --</option>")
                            var sessions = JSON.parse(data);
                            for(var i =0; i < sessions.length; i++)
                                session.append("<option value="+sessions[i].id+">"+sessions[i].name+"</option>");

                        }else
                        {
                            session.html("<option>--Select Session --</option>");
                        }
                    }
                });
            }

        });
        $(".offertory").click(function () {
            if (isNaN(parseInt(session.val())))
            {
                sweetAlertInitialize();
                swal({
                    type: "error",
                    title: "Invalid Session Type",
                    confirmButtonClass:"btn-raised btn-danger",
                    confirmButtonText:"OK"
                });
                return false;
            }
        });
    </script>
@endsection

