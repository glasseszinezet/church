<?php
/**
 * Created by PhpStorm.
 * User: glasses
 * Date: 9/12/16
 * Time: 2:55 PM
 */
?>
@extends('layouts.app')
@section('title')
    Record Expenditure
@endsection
@section('pageDescription')
    Add New Expenditure
@endsection
@section('routeName')
    {{Route::getCurrentRoute()->getPath()}} / expenses
@endsection
@section('content')
    @php($submitButtonText = "Record Expenditure")
    @php($amountPlaceHolder = "How much was spent")
    @php($btnClass = "btn-default")
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">Record New Expenditure</div>
                    <div class="panel-body">
                        {!! Form::open(['url' => action('FinancesController@store')]) !!}
                        {!! Form::hidden('type', 'expenditure') !!}

                        <div class="form-group text-center">
                            {!! Form::label('currency_id', 'Currency', array('class' => 'control-label')) !!}
                            {!! Form::select('currency_id',$currencies, ((isset($initialise)) ? $initialise : null) ,['class' => 'form-control text-center select2Field','placeholder' => '--Select Currency --', 'required', 'select2Placeholder' => 'Select Currency']) !!}
                        </div>

                        <div class="form-group text-center">
                            {!! Form::label('amount', 'Amount', array('class' => 'control-label')) !!}
                            {!! Form::number('amount', null, array('class' => 'form-control','placeholder' => (isset($amountPlaceHolder) ? $amountPlaceHolder : 'How Much is the Member Paying' ), 'min' => 1, 'required', 'step' => '.01')) !!}
                        </div>


                        <div class="form-group text-center">
                            {!! Form::label('description', 'Description', array('class' => 'control-label')) !!}
                            {!! Form::textarea('description', null, array('class' => 'form-control','placeholder' => ('What Was this expenditure for?' ), 'min' => 1, 'required', 'step' => '.01')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit($submitButtonText,['class' => $btnClass.' form-control']) !!}
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
