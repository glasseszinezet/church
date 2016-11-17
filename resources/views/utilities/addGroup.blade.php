<?php
/**
 * Created by PhpStorm.
 * User: glasses
 * Date: 9/16/16
 * Time: 6:50 PM
 */
?>
@extends('layouts.app')
@section('title')
    Add New Group
@endsection
@section('pageDescription')
@endsection
@section('routeName')
    utilities / create / group
@endsection
@section('content')
    <div class="widget">
        <div class="widget-heading text-center panel-default"><h5>Add New Group/ Sub-Ministry</h5></div>
        <div class="widget-body">
            {!! Form::open(['action' => ["UtilitiesController@store",'category' => 'group'] ]) !!}

            <div class="form-group text-center">
                {!! Form::label('name', 'Group Name', array('class' => 'control-label')) !!}
                {!! Form::text('name',  null, array('class' => 'form-control','placeholder' => 'What is the name of the group', 'required')) !!}

            </div>

            <div class="form-group">
                {!! Form::submit("Add New Group",['class' => 'btn-default form-control']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
