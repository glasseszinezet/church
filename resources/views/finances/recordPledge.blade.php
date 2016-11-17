<?php
/**
 * Created by PhpStorm.
 * User: glasses
 * Date: 9/12/16
 * Time: 2:29 PM
 */
?>
@extends('layouts.app')
@section('title')
    Record Welfare
@endsection
@section('pageDescription')
    Record Pledge
@endsection
@section('routeName')
    {{Route::getCurrentRoute()->getPath()}} / Pledge
@endsection
@section('content')
    @php($submitButtonText = "Record Pledge")
    @php($btnClass = "btn-success")
    @php($amountPlaceHolder = "How much is the member Pledging")
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-success">
                    <div class="panel-heading text-center">Record New Pledge</div>
                    <div class="panel-body">
                        {!! Form::open(['url' => action('FinancesController@store')]) !!}
                        {!! Form::hidden('type', 'pledge') !!}
                        @include('layouts.partials.financial')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


