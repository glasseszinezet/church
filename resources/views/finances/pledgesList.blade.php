<?php
/**
 * Created by PhpStorm.
 * User: glasses
 * Date: 9/13/16
 * Time: 5:19 PM
 */
?>
@extends('layouts.app')
@section('title')
    Pledges List
@endsection
@section('pageDescription')
     List Of All Pledges
@endsection
@section('routeName')
    {{Route::getCurrentRoute()->getPath()}} / Pledges List
@endsection
@section('content')

    @if(isset($pledges) && !empty($pledges) && $pledges->count() > 0)
        <div class="row">
            <table class="table table-hover table-responsive">
                <thead>
                <tr class="text-center">
                    <th>#</th>
                    <th>Amount</th>
                    <th>Currency</th>
                    <th>Member - Full Name</th>
                    <th>Phone</th>
                    <th>Pledge Date</th>
                    <th>Redeemed</th>
                    <th>Tools</th>
                </tr>
                </thead>
                <tbody>

                @php($iterator = 0)
                @foreach($pledges as $pledge)
                    <tr class="{{ $tableContextClasses[$iterator++] }}">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$pledge->amount}}</td>
                        <td>{{$pledge->currency->name." (".$pledge->currency->ISO_4217_CODE.")"}}</td>
                        <td>{{$pledge->member->firstName." ".$pledge->member->otherNames." ".$pledge->member->lastName}}</td>
                        <td>{{$pledge->member->phone}}</td>
                        <td>{{$pledge->created_at}}</td>
                        <td>{{($pledge->redeemed) ? "YES" : "NO"}}</td>
                        <td class="">
                            @if(!($pledge->redeemed))
                                <a href="{{action("FinancesController@update",[$pledge->id])}}">
                                    <i class="text-success ti-check" aria-hidden="true" data-toggle="tooltip" title="Redeem Pledge" onclick="event.preventDefault(); document.getElementById('delete-member-form').submit();"></i>
                                    <form id="delete-member-form" action="{{action("FinancesController@update",[$pledge->id])}}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                        {{method_field('PATCH')}}
                                    </form>
                                </a>
                            @endif
                        </td>
                        @if($iterator >= count($tableContextClasses))
                            @php($iterator = 0)
                        @endif
                    </tr>
                @endforeach
                <tr style="align-content: center">
                    <td colspan="8" class="text-center">{{$pledges->links()}}</td>
                </tr>

                </tbody>
            </table>
        </div>
    @else
        {{ Session::flash("error","No Pledge Records Found") }}
    @endif
@endsection
