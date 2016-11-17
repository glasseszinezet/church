<?php
/**
 * Created by PhpStorm.
 * User: glasses
 * Date: 9/12/16
 * Time: 12:24 PM
 */
?>
@extends('layouts.app')
@section('title')
   Record Tithe
@endsection
@section('pageDescription')
    Add Tithe Collection
@endsection
@section('routeName')
    {{Route::getCurrentRoute()->getPath()}} / tithe
@endsection
@section('content')
    @php($submitButtonText = "Record Tithe")
    @php($btnClass = "btn-primary")
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading text-center">Record New Tithe</div>
                    <div class="panel-body">
                        {!! Form::open(['url' => action('FinancesController@store')]) !!}
                            {!! Form::hidden('type', 'tithe') !!}
                            @include('layouts.partials.financial')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
