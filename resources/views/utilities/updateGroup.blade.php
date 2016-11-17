<?php
/**
 * Created by PhpStorm.
 * User: glasses
 * Date: 9/16/16
 * Time: 5:49 PM
 */
?>
@extends('layouts.app')
@section('title')
    Update Church Group Info
@endsection
@section('pageDescription')
    Update Church Group Data
@endsection
@section('routeName')
    utilities / groups / update
@endsection
@section('content')
    <div class="widget">
        <div class="widget-heading text-center bg-danger"><h5>Update Church Group Info</h5></div>
        <div class="widget-body">
            {!! Form::model($group, ['method' => "PATCH",'action' => ['UtilitiesController@update',$group->id, 'category' => 'group']]) !!}

            <div class="form-group text-center">
                {!! Form::label('name', 'Group Name', array('class' => 'control-label')) !!}
                {!! Form::text('name',  null, array('class' => 'form-control','placeholder' => 'What is the name of the group', 'required')) !!}

            </div>

            <div class="form-group">
                {!! Form::submit("Update Details",['class' => 'btn-danger form-control']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

