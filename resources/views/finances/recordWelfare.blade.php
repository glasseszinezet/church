<?php
/**
 * Created by PhpStorm.
 * User: glasses
 * Date: 9/12/16
 * Time: 2:24 PM
 */
?>
@extends('layouts.app')
@section('title')
    Record Welfare
@endsection
@section('pageDescription')
    Add Welfare Collection
@endsection
@section('routeName')
    {{Route::getCurrentRoute()->getPath()}} / Welfare
@endsection
@section('content')
    @php($submitButtonText = "Record Welfare")
    @php($btnClass = "btn-danger")
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-danger">
                    <div class="panel-heading text-center">Record New Welfare</div>
                    <div class="panel-body">
                        {!! Form::open(['url' => action('FinancesController@store')]) !!}
                        {!! Form::hidden('type', 'welfare') !!}
                        @include('layouts.partials.financial')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

