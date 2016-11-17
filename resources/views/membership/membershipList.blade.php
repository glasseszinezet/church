<?php
/**
 * Created by PhpStorm.
 * User: eugene
 * Date: 9/5/16
 * Time: 6:22 PM
 */
?>
@extends('layouts.app')
@section('title')
    Member ship List
@endsection
@section('pageDescription')
    Membership List
@endsection
@section('routeName')
    {{Route::getCurrentRoute()->getPath()}} / membershipList
@endsection
@section('content')
    @if($members->isEmpty())
        {{ Session::flash("error", "No Member Records Found") }}
    @else
        <div class="row">
                <table class="table table-hover table-responsive">
                    <thead>
                    <tr class="text-center">
                        <th class="text-center">#</th>
                        <th class="text-center">Gender</th>
                        <th class="text-center">Full Name</th>
                        <th class="text-center">Phone</th>
                        <th class="text-center">Alternate Phone</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Tools</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach($members as $member)
                            <tr class="{{ $tableContextColors[$iterator++] }}">
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td class="text-center">{{$member->gender}}</td>
                                <td class="text-center">{{$member->firstName." ".$member->otherNames." ".$member->lastName}}</td>
                                <td class="text-center">{{$member->phone}}</td>
                                <td class="text-center">{{ isset($member->alternatePhone) && !empty($member->alternatePhone) ? $member->alternatePhone : "None"  }}</td>
                                <td class="text-center">{{$member->email}}</td>
                                <td class="text-center">{{$member->status}}</td>
                                <td class="text-center">
                                    <a href="{{action("MembershipController@edit",[$member->id])}}">
                                        <i class="text-info ti-pencil-alt" aria-hidden="true" data-toggle="tooltip" title="Update Member Details"></i>
                                    </a>
                                    <a href="{{action("MembershipController@show",[$member->id])}}" >
                                        <i class="text-success ti-view-list-alt" aria-hidden="true" data-toggle="tooltip" title="View Detailed Member Info"></i>
                                    </a>
                                    <a href="{{action("FinancesController@show",[$member->id])}}" >
                                        <i class="text-warning ti-money" aria-hidden="true" data-toggle="tooltip" title="View Member Payment History"></i>
                                    </a>
                                    <a href="{{action("MembershipController@destroy",[$member->id])}}">
                                        <i class="text-danger ti-close" aria-hidden="true" data-toggle="tooltip" title="Remove Member" onclick="event.preventDefault(); document.getElementById('delete-member-form').submit();"></i>
                                        <form id="delete-member-form" action="{{action("MembershipController@destroy",[$member->id])}}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            {{method_field('DELETE')}}
                                        </form>

                                    </a>
                                </td>
                                @if($iterator >= count($tableContextColors))
                                    @php($iterator = 0)
                                @endif
                            </tr>
                        @endforeach
                        <tr style="align-content: center">
                            <td colspan="8" class="text-center">{{$members->links()}}</td>
                        </tr>

                    </tbody>
                </table>
        </div>
    @endif
@endsection
