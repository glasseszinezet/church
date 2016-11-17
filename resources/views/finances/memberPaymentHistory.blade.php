<?php
/**
 * Created by PhpStorm.
 * User: glasses
 * Date: 9/13/16
 * Time: 7:37 PM
 */
?>
@extends('layouts.app')
@section('title')
    Payment History
@endsection
@section('pageDescription')
    Member Payment History
@endsection
@section('routeName')
    finances / Payment History /{{"(".$member->firstName." ".$member->otherNames." ".$member->lastName.")"}}
@endsection
@section('content')
    <div class="row">

        {{--Tithe Payments--}}
        <div class="widget">
            <div class="widget-heading text-center bg-success"><h5>Tithe Payments</h5></div>
                <div class="widget-body">
                    @if(isset($member->tithes) && !empty($member->tithes) && $member->tithes->count())
                        <table class="table table-hover table-responsive">
                            <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Amount</th>
                                <th>Currency</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php($iterator = 0)
                                @foreach($member->tithes as $tithe)
                                    <tr class="{{ $tableContextClasses[$iterator++] }}">
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$tithe->amount}}</td>
                                        <td>{{App\Currency::find($tithe->currency_id)->name." (".App\Currency::find($tithe->currency_id)->ISO_4217_CODE.")"}}</td>
                                        <td>{{$tithe->created_at}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="text-center"><h4>No Tithe Payments Found</h4></div>
                    @endif
                </div>
            </div>
        </div>

        {{--Welfare Payments--}}
        <div class="widget">
            <div class="widget-heading text-center bg-warning"><h5>Welfare Payments</h5></div>
            <div class="widget-body">
                @if(isset($member->welfares) && !empty($member->welfares) && $member->welfares->count() > 0)
                    <table class="table table-hover table-responsive">
                        <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>Amount</th>
                            <th>Currency</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($iterator = 0)
                        @foreach($member->welfares as $welfare)
                            <tr class="{{ $tableContextClasses[$iterator++] }}">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$welfare->amount}}</td>
                                <td>{{App\Currency::find($welfare->currency_id)->name." (".App\Currency::find($welfare->currency_id)->ISO_4217_CODE.")"}}</td>
                                <td>{{$welfare->created_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="text-center"><h4>No Welfare Payments Found</h4></div>
                @endif
            </div>
        </div>

        {{--Pledges Payments--}}
        <div class="widget">
            <div class="widget-heading text-center bg-info"><h5>Pledges</h5></div>
            <div class="widget-body">
                @if(isset($member->pledges) && !empty($member->pledges) && $member->pledges->count() > 0)
                    <table class="table table-hover table-responsive">
                        <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>Amount</th>
                            <th>Currency</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($iterator = 0)
                        @foreach($member->pledges as $pledge)
                            <tr class="{{ $tableContextClasses[$iterator++] }}">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$pledge->amount}}</td>
                                <td>{{App\Currency::find($pledge->currency_id)->name." (".App\Currency::find($pledge->currency_id)->ISO_4217_CODE.")"}}</td>
                                <td>{{$pledge->created_at}}</td>
                                <td>{{($pledge->redeemed) ? "Redeemed" : "Not Redeemed"}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="text-center"><h4>No Pledges Found</h4></div>
                @endif
            </div>
        </div>

        {{--Donations Payments--}}
        <div class="widget">
            <div class="widget-heading text-center bg-demo"><h5>Donations</h5></div>
            <div class="widget-body">
                @if(isset($member->donations) && !empty($member->donations) && $member->donations->count() > 0)
                    <table class="table table-hover table-responsive">
                        <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>Amount</th>
                            <th>Currency</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($iterator = 0)
                        @foreach($member->donations as $donation)
                            <tr class="{{ $tableContextClasses[$iterator++] }}">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$donation->amount}}</td>
                                <td>{{App\Currency::find($donation->currency_id)->name." (".App\Currency::find($donation->currency_id)->ISO_4217_CODE.")"}}</td>
                                <td>{{$donation->created_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="text-center"><h4>No Donations Found</h4></div>
                @endif
            </div>
        </div>


    </div>
@endsection
