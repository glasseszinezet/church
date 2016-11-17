<?php
/**
 * Created by PhpStorm.
 * User: glasses
 * Date: 9/11/16
 * Time: 11:09 AM
 */
?>
@extends('layouts.app')
@section('title')
    Update Account
@endsection
@section('pageDescription')
    Update Accounts Information
@endsection
@section('routeName')
    accounts / update
@endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-danger">
                    <div class="panel-heading text-center">Update User Credentials</div>
                    <div class="panel-body">
                        {!! Form::model($user,['method' => 'PATCH','action' => ['AccountsController@update', $user->id]]) !!}
                            @include('layouts.auth.userForm',['submitBtnClass' =>'btn-danger','submitBtnText' => 'Update Credentials','allowEmailEdit' => false,])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

