<?php
/**
 * Created by PhpStorm.
 * User: glasses
 * Date: 9/12/16
 * Time: 2:47 PM
 */
?>
@extends('layouts.app')
@section('title')
    Record Donations
@endsection
@section('pageDescription')
    Add New Donation
@endsection
@section('routeName')
    {{Route::getCurrentRoute()->getPath()}} / donations
@endsection
@section('content')
    @php($submitButtonText = "Record Donation")
    @php($amountPlaceHolder = "How much is the member donating")
    @php($btnClass = "btn-info")
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading text-center">Record New Donation</div>
                    <div class="panel-body">
                        {!! Form::open(['url' => action('FinancesController@store')]) !!}
                        {!! Form::hidden('type', 'donation') !!}
                            @include('layouts.partials.financial')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
