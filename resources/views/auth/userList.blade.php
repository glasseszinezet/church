<?php
/**
 * Created by PhpStorm.
 * User: glasses
 * Date: 9/11/16
 * Time: 12:03 PM
 */
?>
@extends('layouts.app')
@section('title')
   User List
@endsection
@section('pageDescription')
    List Of All Users
@endsection
@section('routeName')
    {{Route::getCurrentRoute()->getPath()}} / userList
@endsection
@section('content')
    @if(isset($users) && !empty($users))
        <div class="row">
            <table class="table table-hover table-responsive">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Tools</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr class="{{$tableContextClasses[$iterator++]}}">
                            <td>{{$loop->iteration}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{\Carbon\Carbon::parse($user->created_at)->toDayDateTimeString()." (".\Carbon\Carbon::parse($user->created_at)->diffForHumans().")"}}</td>
                            <td>{{\Carbon\Carbon::parse($user->updated_at)->toDayDateTimeString()." (".\Carbon\Carbon::parse($user->updated_at)->diffForHumans().")"}}</td>
                            <td>
                                <a href="{{action("AccountsController@destroy",[$user->id])}}">
                                    <i class="text-danger ti-close" aria-hidden="true" data-toggle="tooltip" title=" Remove User" onclick="event.preventDefault(); document.getElementById('delete-member-form').submit();"></i>
                                    <form id="delete-member-form" action="{{action("AccountsController@destroy",[$user->id])}}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                        {{method_field('DELETE')}}
                                    </form>
                                </a>
                                <a href="{{action("AccountsController@create",['user' => $user->id, 'category' => 'privileges'])}}">
                                    <i class="text-info ti-pencil-alt2" aria-hidden="true" data-toggle="tooltip" title="Edit User Privileges" ></i>
                                </a>
                            </td>
                        </tr>
                        @if($iterator >= count($tableContextClasses))
                            @php($iterator = 0)
                        @endif
                    @endforeach
                    <tr style="align-content: center">
                        <td colspan="6" class="text-center">{{$users->links()}}</td>
                    </tr>

                </tbody>
            </table>
        </div>
    @else
        {{ Session::flash("error", "Ooops No Users Found!!!") }}
    @endif
@endsection