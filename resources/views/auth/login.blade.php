@extends('layouts.auth')
@section('pageTitle')
    Login
@endsection
@section('authForm')
    <form method="POST" action="{{ url('/login') }}" class="form-horizontal">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <div class="col-xs-12">
                <input type="email" placeholder="username" name="email" id="email" class="form-control" value="{{ old('email') }}" autofocus>
                @if ($errors->has('email'))<span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>@endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <div class="col-xs-12">
                <input type="password" placeholder="Password" name="password" id="password" class="form-control" value="{{old('password')}}">
                @if ($errors->has('password'))<span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>@endif
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12">
                <div class="checkbox-inline checkbox-custom pull-left">
                    <input id="exampleCheckboxRemember" type="checkbox" value="remember" name="remember">
                    <label for="exampleCheckboxRemember" class="checkbox-muted text-muted">Remember me</label>
                </div>
                <div class="pull-right"><a href="{{ url('/password/reset') }}" class="inline-block form-control-static">Forgot a Password?</a></div>
            </div>
        </div>
        <button type="submit" class="btn-lg btn btn-primary btn-rounded btn-block">Sign in</button>
    </form>
@endsection