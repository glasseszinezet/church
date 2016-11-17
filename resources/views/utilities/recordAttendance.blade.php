
<?php
/**
 * Created by PhpStorm.
 * User: glasses
 * Date: 9/13/16
 * Time: 10:00 PM
 */
?>
@extends('layouts.app')
@section('title')
    Add Attendance
@endsection
@section('pageDescription')
    Add New Attendance Record
@endsection
@section('routeName')
    {{Route::getCurrentRoute()->getPath()}} / addAttendance
@endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">Record Attendance</div>
                    <div class="panel-body">

                        {!! Form::open(['url' => action("UtilitiesController@store",['category' => 'attendance'])]) !!}

                        <div class="form-group text-center">
                            {!! Form::label('service_id', 'Service', array('class' => 'control-label')) !!}
                            {!! Form::select('service_id',$services,null,['class' => 'form-control text-center','placeholder' => '--Select Service --', 'required']) !!}
                        </div>

                        <div class="form-group text-center">
                            {!! Form::label('session_id', 'Session', array('class' => 'control-label')) !!}
                            {!! Form::select('session_id',array(),null,['class' => 'form-control text-center','placeholder' => '--Select Session --', 'required']) !!}
                        </div>

                        <div class="form-group text-center">
                            {!! Form::label('count', 'Count', array('class' => 'control-label')) !!}
                            {!! Form::number('count',null,['class' => 'form-control text-center','placeholder' => 'What was the total attendance', 'required', 'min' => 1]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit("Add Attendance Record",['class' => 'btn-default form-control attendance']) !!}
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

        $(".attendance").click(function () {
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
