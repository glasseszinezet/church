<?php
/**
 * Created by PhpStorm.
 * User: glasses
 * Date: 9/15/16
 * Time: 9:37 PM
 */
?>

@extends('layouts.app')
@section('title')
    Update B-day Wisher
@endsection
@section('pageDescription')
@endsection
@section('routeName')
    utilities / updateBirthdayWisher
@endsection
@section('content')
    <div class="widget">
        <div class="widget-heading text-center bg-success"><h5>Update Birthday Wisher Settings</h5></div>
        <div class="widget-body">
            {!! Form::open(['url' => action("UtilitiesController@store",['category' => 'bdayWisher'])]) !!}
            <div class="form-group text-center">
                {!! Form::label('message', 'Birthday Message', array('class' => 'control-label')) !!}
                {!! Form::textarea('message',  $config['message'], array('class' => 'form-control','placeholder' => 'What message should be sent to members', 'required')) !!}
                <p class="help-block">You can make use of the following placeholders. ##firstname## for the member first name. ##churchName## as the church name <br>
                    <span class="badge" id="badgeClass">{{ceil(strlen($config['message'])/160)}}</span> Message(s) will be sent per member. Please note an SMS is 160 characters long.
                </p>

            </div>


            <div class="form-group text-center ">
                Send Messages to only active members?: &nbsp;
                <div class="switch switch-inline">
                    <input name="activeMembersOnly" id="switchSuccess" type="checkbox" value="true" @if(isset($config['activeMembersOnly']) && $config['activeMembersOnly']) {{ "checked" }}@endif>
                    <label for="switchSuccess" class="switch-success"></label>
                </div>
            </div>

            <div class="form-group">
                {!! Form::submit("Update Configuration",['class' => 'btn-success form-control attendance']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
    <script type="text/javascript">
        $("#message").keyup(function () {
            $("#badgeClass").text(Math.ceil($(this).val().length/160));
        });
    </script>
@endsection

