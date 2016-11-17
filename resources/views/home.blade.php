@extends('layouts.app')
@section('title')
    Dashboard
@endsection
@section('pageDescription')
    Dashboard
@endsection
@section('routeName')
    {{Route::getCurrentRoute()->getPath()}}
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Dashboard</div>

                <div class="panel-body bg-success text-center">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
