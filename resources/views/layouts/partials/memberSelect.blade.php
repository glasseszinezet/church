<?php
/**
 * Created by PhpStorm.
 * User: glasses
 * Date: 9/10/16
 * Time: 4:54 PM
 */
?>
@extends('layouts.app')
@section('title')
    Membership
@endsection
@section('pageDescription')
    Select Member
@endsection
@section('routeName')
    {{Route::getCurrentRoute()->getPath()}} / select
@endsection
@section('content')
    {{--{!! Form::open(['action' => 'MembershipController@show']) !!}--}}

    {{--<div class="widget">--}}
        {{--<div class="widget-heading text-center bg-info"><h5>Personal Data</h5></div>--}}
        {{--<div class="widget-body">--}}

            {{--<div class="row">--}}
                {{--<div class="form-group text-center">--}}
                    {{--{!! Form::label('firstName', 'First Name', array('class' => 'control-label')) !!}--}}
                    {{--{!! Form::text('firstName', null, array('class' => 'form-control','placeholder' => 'Member First Name....', 'required', 'value' => '')) !!}--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--{!! Form::submit("Update Member Info",['class' => 'btn btn-success'.' form-control']) !!}--}}
                {{--</div>--}}
                {{--<div class="form-group col-md-4 text-center">--}}
                    {{--{!! Form::label('lastName', 'Last Name', array('class' => 'control-label')) !!}--}}
                    {{--{!! Form::text('lastName', null, array('class' => 'form-control','placeholder' => 'Member Last Name....', 'required')) !!}--}}
                {{--</div>--}}

                {{--<div class="form-group col-md-4 text-center">--}}
                    {{--{!! Form::label('otherNames', 'Other Name(s)', array('class' => 'control-label')) !!}--}}
                    {{--{!! Form::text('otherNames', null, array('class' => 'form-control','placeholder' => 'Member Other Name(s)....')) !!}--}}
                {{--</div>--}}
        {{--</div>--}}

    {{--</div>--}}

    {{--{!! Form::close() !!}--}}
@endsection
