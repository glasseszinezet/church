<?php
/**
 * Created by PhpStorm.
 * User: glasses
 * Date: 9/14/16
 * Time: 7:51 PM
 */
?>
@extends('layouts.app')
@section('title')
    Update Church Details
@endsection
@section('pageDescription')
@endsection
@section('routeName')
    utilities / updateChurchInfo
@endsection
@section('content')
    <div class="widget">
        <div class="widget-heading text-center bg-demo"><h5>Update Church Information</h5></div>
            <div class="widget-body">
                {!! Form::model($church, ['method' => "PATCH", 'action' => ["UtilitiesController@update",$church->id, 'category' => 'church'], 'files' =>true]) !!}

                    <div class="form-group text-center">
                        {!! Form::label('name', 'Church Name', array('class' => 'control-label')) !!}
                        {!! Form::text('name', null, array('class' => 'form-control','placeholder' => 'Church Name....', 'required')) !!}
                    </div>

                    <div class="form-group text-center">
                        {!! Form::label('motto', 'Church Motto', array('class' => 'control-label')) !!}
                        {!! Form::text('motto', null, array('class' => 'form-control','placeholder' => 'Church Motto....', 'required')) !!}
                    </div>

                    <div class="form-group text-center">
                        {!! Form::label('address', 'Address', array('class' => 'control-label')) !!}
                        {!! Form::text('address', null, array('class' => 'form-control','placeholder' => 'Church address....', 'required')) !!}
                    </div>

                    <div class="form-group text-center">
                        {!! Form::label('phone', 'Main Contact Phone', array('class' => 'control-label')) !!}
                        {!! Form::tel('phone', null, array('class' => 'form-control','placeholder' => 'Main Church Phone', 'required', 'pattern' => '0(2|5)\d{8}')) !!}
                    </div>

                    <div class="form-group text-center">
                        {!! Form::label('alternatePhone', 'Alternate Contact Phone', array('class' => 'control-label')) !!}
                        {!! Form::tel('alternatePhone', null, array('class' => 'form-control','placeholder' => 'Alternate Church Phone', 'required', 'pattern' => '0(2|5)\d{8}')) !!}
                    </div>

                    <div class="form-group text-center">
                        {!! Form::label('email', 'Church Email Address', array('class' => 'control-label')) !!}
                        {!! Form::tel('email', null, array('class' => 'form-control','placeholder' => 'Church Email Address', 'required',)) !!}
                    </div>

                    <div class="form-group text-center">
                        {!! Form::label('website', 'Official Church Website', array('class' => 'control-label')) !!}
                        {!! Form::url('website', null, array('class' => 'form-control','placeholder' => 'Church Email Address', 'required',)) !!}
                    </div>

                    <div class="form-group text-center">
                        {!! Form::label('headOfCongregation', 'Head Of Congregation', array('class' => 'control-label')) !!}
                        {!! Form::text('headOfCongregation', null, array('class' => 'form-control','placeholder' => 'Who Heads the congregation', 'required',)) !!}
                    </div>


                    <div class="form-group text-center">
                        {!! Form::label('presbytery', 'Presbytery:', array('class' => 'control-label')) !!}
                        {!! Form::text('presbytery', null, array('class' => 'form-control','placeholder' => 'What presbytery does the church belong to', 'required',)) !!}
                    </div>

                    <div class="form-group text-center">
                        {!! Form::label('district', 'Church District:', array('class' => 'control-label')) !!}
                        {!! Form::text('district', null, array('class' => 'form-control','placeholder' => 'Which District Does the church belong to?', 'required',)) !!}
                    </div>

                    <div class="form-group text-center">
                        <label for="logoName" class="control-label">
                            <img src="{{URL::asset('uploads/'.$church->logoName)}}" class="image-responsive img-circle col-md-offset-2 col-md-8"/><span class="col-md-2"></span>
                        </label>
                        <p class="help-block">Click on image to upload new. Image must be of type png, jpeg or gif</p>
                        <input class="form-control" placeholder="Upload Church Logo" required="required" name="logoName" type="file" id="logoName" style="display: none">
                    </div>


                    <div class="form-group">
                        {!! Form::submit("Update Church Information",['class' => 'btn-default form-control']) !!}
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
