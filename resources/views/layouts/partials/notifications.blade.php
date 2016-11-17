<?php
/**
 * Created by PhpStorm.
 * User: glasses
 * Date: 9/28/16
 * Time: 11:27 AM
 */
?>
@extends('layouts.app')
@section('title')
    Notifications | {{$category}}
@endsection
@section('pageDescription')
    {{strtoupper($category)}} Notifications
@endsection
@section('routeName')
    {{Route::getCurrentRoute()->getPath()}} / {{$category}}
@endsection
@section('content')
    <div class="widget">
        <div class="widget-heading {{$bgClass}}">
            <h3 class="widget-title text-center" style=" color: #9dc8e2; font-weight: bold;">Notifications | {{$category}}</h3>
        </div>
        <div class="widget-body row">
            {!! Form::open(["method" => "POST",'action' => ["NotificationsController@store"], 'id' => "notificationsForm", "files" => true]) !!}
                {!! Form::hidden("category", $category)  !!}
                @if($category == "voice")
                    <div class="form-group col-md-6">
                        {!! Form::button("Use Text ",['class' => 'btn-default btn-block form-control', 'id' => "useText"]) !!}
                        <p class="help-block text-center"> The message submitted will be converted into a call file.</p>
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::button("Use Voice File ",['class' => 'btn-default btn-block form-control', 'id' => "useFile"]) !!}
                        <p class="help-block text-center">You'll need a pre-recorded file in MP3 or WAV format</p>
                    </div>
                @endif
                <div class="form-group text-center " id="message_box">
                    {!! Form::label('message', 'Message:', array('class' => 'control-label')) !!}
                    {!! Form::textarea('message', null, array('class' => 'form-control' ,'placeholder' => 'What message should be sent', 'required')) !!}
                    @if($category == "sms")
                        <p class="help-block"><span class="badge" id="badgeClass">0</span> Message(s) will be sent per member. Please note an SMS is 160 characters long.</p>
                    @endif
                </div>

                @if($category == "voice")
                    <div class="form-group text-center {{($category == "voice" ? "hidden" : "")}}" id="file_box">
                        {!! Form::label('voiceClip', 'Voice Recording:', array('class' => 'control-label')) !!}
                        {!! Form::file('voiceClip', array('class' => 'form-control' ,'placeholder' => 'Upload Voice File', 'required')) !!}
                        @if($category == "voice")
                            <p class="help-block">If you'd rather use a pre-recorded audio file Kindly Select the file. File Type must be WAV or MP3</p>
                        @endif
                    </div>
                @endif

                <div class="form-group">
                    <div class="switch col-md-6">
                        <input name="recipients[]" id="all_recipients" type="checkbox" value="allMembers" checked>
                        <label for="all_recipients" class="{{$switchClass}}"></label>
                        <span class=""> All Members:</span>
                    </div>

                    <div class="switch col-md-6">
                        <input name="recipients[]" id="active_members_only" type="checkbox" value="activeMembersOnly" checked>
                        <label for="active_members_only" class="{{$switchClass}}"></label>
                        <span class=""> Active Members Only:</span>
                    </div>
                    @foreach($groups as $group)
                        <div class="switch col-md-6">
                            <input name="recipients[]" class="group_recipients" id="group_{{$group['id']}}" type="checkbox" value="group_{{$group['id']}}" checked>
                            <label for="group_{{$group['id']}}" class="{{$switchClass}}"></label>
                            <span class=""> {{$group['name']}}:</span>
                        </div>
                    @endforeach
                </div>

            <div class="form-group">
                {!! Form::submit("send $category messages",['class' => $btnClass.' btn-block form-control submitBtn']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('pageScripts')
    <script type="text/javascript">
        $(".group_recipients").change(function () {
            var allRecipients = true;

            $(".group_recipients").each(function () {
                if(!($(this).prop("checked")))
                    allRecipients = false;
            });

            if(allRecipients)
                $("#all_recipients").prop("checked", true);
            else
                $("#all_recipients").removeAttr("checked");
        });

        $("#message").keyup(function () {
            $("#badgeClass").text(Math.ceil($(this).val().length/160));
        });

        $("#all_recipients").change(function () {
            if ($(this).prop("checked"))
           {
               $(".group_recipients").each(function () {
                   $(this).prop("checked",true);
               })
           }
        });
        
        $("#useText").click(function () {
            $("#message_box").removeClass("hidden");
            $("#message").attr("required","required");

            $("#file_box").addClass("hidden");
            $("#voiceClip").removeAttr("required");
        });

        $("#useFile").click(function () {
            $("#message_box").addClass("hidden");
            $("#message").removeAttr("required");

            $("#file_box").removeClass("hidden");
            $("#voiceClip").attr("required","required");
        });
        
        $(".submitBtn").click(function () {

            if($("#message_box").hasClass("hidden") && $("#file_box").hasClass("hidden") )
            {
                sweetAlertInitialize();
                swal({
                    type: "error",
                    title: "Please Select a file or provide a message",
                    confirmButtonClass:"btn-raised btn-danger",
                    confirmButtonText:"OK"
                });
                return false;
            }else if( $("#message_box").hasClass("hidden"))
            {
                $("#message").removeAttr("required");
            }else if( $("#file_box").hasClass("hidden"))
            {
                $("#voiceClip").removeAttr("required");
            }


        });


    </script>
@endsection
