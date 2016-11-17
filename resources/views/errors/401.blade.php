<?php
/**
 * Created by PhpStorm.
 * User: glasses
 * Date: 10/9/16
 * Time: 10:07 AM
 */
?>
@extends('layouts.app')
@section('title')
    Permission Denied
@endsection
@section('pageDescription')
    401 | Not Authorised
@endsection
@section('routeName')
    Not Authorised
@endsection
@section('content')
    <div class="container page-container">
        <div class="page-content">
            <h1 style="font-size: 130px" class="m-0 text-muted fw-300">4<i class="ti-face-sad fs-100"></i>1</h1>
            <h4 class="fs-16 text-muted fw-300 ">Not Authorized!</h4>
            <p class="text-muted mb-15">Sorry you do not have permissions to view the current resource. Please contact Admin</p>
            <a href="/home" role="button" style="width: 130px" class="btn btn-primary btn-rounded btn-block">Return home</a>
        </div>
    </div>
@endsection
