<?php
/**
 * Created by PhpStorm.
 * User: eugene
 * Date: 9/5/16
 * Time: 6:20 PM
 */
?>
@extends('layouts.app')
@section('title')
    Update Member
@endsection
@section('pageDescription')
    Update Member Information
@endsection
@section('routeName')
    membership / updateDetails / {{$member->firstName." ".$member->otherNames." ".$member->lastName}}
@endsection
@section('content')

    {!! Form::model($member,['method' => 'PATCH','action' => ['MembershipController@update', $member->id]]) !!}
        @include('layouts.partials.membershipForm',['submitButtonText' => 'Update Member Info', 'btnClass' => 'btn-success','panelBg' => 'bg-danger'])
    {!! Form::close() !!}
@endsection
@section('pageScripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $("#marriageStatus").change(function () {
                var marriageStatus = $(this).val();
                var spouseName = $("#nameOfSpouse");
                var spousePhone = $("#spousePhone");
                if(marriageStatus != null && (marriageStatus).trim() == "single")
                {

                    spouseName.removeAttr("required");
                    spousePhone.removeAttr("required");

                    spouseName.attr("readonly","readonly");
                    spousePhone.attr("readonly","readonly");

                    spouseName.attr("placeholder","Not required anymore because you're single");
                    spousePhone.attr("placeholder","Not required anymore because you're single");
                }else
                {
                    spouseName.attr("required");
                    spousePhone.attr("required");

                    spouseName.removeAttr("readonly","readonly");
                    spousePhone.removeAttr("readonly","readonly");

                }
            });
        });
        $(".datePickerInput").datetimepicker({
            format:"YYYY-MM-DD"
        });
        $(".select2Field").select2({
            placeholder: "Please select Which Groups Member Belongs To. You can select multiple",
            allowClear: true
        });

        $("#marriageStatus").change(function () {
            var marriageStatus = $(this).val();
            var spouseName = $("#nameOfSpouse");
            var spousePhone = $("#spousePhone");
            if(marriageStatus != null && (marriageStatus).trim() == "single")
            {

                spouseName.removeAttr("required");
                spousePhone.removeAttr("required");

                spouseName.attr("readonly","readonly");
                spousePhone.attr("readonly","readonly");

                spouseName.attr("placeholder","Not required anymore because you're single");
                spousePhone.attr("placeholder","Not required anymore because you're single");
            }else
            {
                spouseName.attr("required");
                spousePhone.attr("required");

                spouseName.removeAttr("readonly","readonly");
                spousePhone.removeAttr("readonly","readonly");

            }
        });
    </script>
@endsection
