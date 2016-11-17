<?php
/**
 * Created by PhpStorm.
 * User: glasses
 * Date: 9/12/16
 * Time: 2:19 PM
 */
?>
<div class="form-group text-center">
    {!! Form::label('member_id', 'Member', array('class' => 'control-label')) !!}
    {!! Form::select('member_id',$members,null,['class' => 'form-control text-center select2Field','placeholder' => '--Select Member --', 'required', 'select2Placeholder' => 'Select Member. Type a word for hint.']) !!}
</div>

<div class="form-group text-center">
    {!! Form::label('currency_id', 'Currency', array('class' => 'control-label')) !!}
    {!! Form::select('currency_id',$currencies, ((isset($initialise)) ? $initialise : null) ,['class' => 'form-control text-center select2Field','placeholder' => '--Select Currency --', 'required', 'select2Placeholder' => 'Select Currency']) !!}
</div>

<div class="form-group text-center">
    {!! Form::label('amount', 'Amount', array('class' => 'control-label')) !!}
    {!! Form::number('amount', null, array('class' => 'form-control','placeholder' => (isset($amountPlaceHolder) ? $amountPlaceHolder : 'How Much is the Member Paying' ), 'min' => 1, 'required', 'step' => '.01')) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText,['class' => $btnClass.' form-control']) !!}
</div>
