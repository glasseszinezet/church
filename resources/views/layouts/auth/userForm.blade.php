<?php
/**
 * Created by PhpStorm.
 * User: glasses
 * Date: 9/11/16
 * Time: 10:49 AM
 */
?>

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

    <div class="col-md-offset-2 col-md-8 text-center">
        {!! Form::label('name', 'Full Name:', array('class' => 'control-label')) !!}
        {!! Form::text('name', null, array('class' => 'form-control','placeholder' => 'Users\' Full Name', 'required')) !!}
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

    <div class="col-md-offset-2 col-md-8 text-center">
        {!! Form::label('email', 'Email:', array('class' => 'control-label')) !!}
        {!! Form::email('email', null, array('class' => 'form-control','placeholder' => 'User\'s email. - Will be used as username', isset($allowEmailEdit) && $allowEmailEdit ? "" : "readonly", 'required')) !!}
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

    <div class="col-md-offset-2 col-md-8 text-center">
        {!! Form::label('password', 'Password:', array('class' => 'control-label')) !!}
        {!! Form::password('password', array('class' => 'form-control','placeholder' => 'Users\' Temporal Password', 'required')) !!}
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

    <div class="col-md-offset-2 col-md-8 text-center">
        {!! Form::label('password-confirm', 'Confirm Password:', array('class' => 'control-label')) !!}
        {!! Form::password('password-confirm', array('class' => 'form-control','placeholder' => 'Users\' Temporal Password', 'required')) !!}

        @if ($errors->has('password_confirmation'))
            <span class="help-block">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-2 col-md-8 ">
        {!! Form::submit($submitBtnText,['class' => $submitBtnClass.' form-control']) !!}
    </div>
</div>
