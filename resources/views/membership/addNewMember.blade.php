<?php
/**
 * Created by PhpStorm.
 * User: eugene
 * Date: 9/5/16
 * Time: 6:18 PM
 */
?>
@extends('layouts.app')
@section('title')
    Add Member
@endsection
@section('pageDescription')
    Add New Member
@endsection
@section('routeName')
    {{Route::getCurrentRoute()->getPath()}}
@endsection
@section('content')
    {!! Form::open([$member = new \App\Member(),'url' => 'membership']) !!}
        @include('layouts.partials.membershipForm',['submitButtonText' => 'Add Member', 'btnClass' => 'btn-black', 'panelBg' => 'bg-success'])
    {!! Form::close() !!}
@endsection
@section('pageScripts')
@endsection