@extends('layouts.app')
@section('title')
    Add  User
@endsection
@section('pageDescription')
    Add New User
@endsection
@section('routeName')
    {{Route::getCurrentRoute()->getPath()}} / User
@endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading text-center">Add New User</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ action('AccountsController@store') }}">
                            {{ csrf_field() }}
                            @include('layouts.auth.userForm',['submitBtnClass' =>'btn-warning','submitBtnText' => 'Add New User','allowEmailEdit' => true,])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
