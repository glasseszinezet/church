<?php
/**
 * Created by PhpStorm.
 * User: glasses
 * Date: 9/26/16
 * Time: 10:00 PM
 */
?>
@extends('layouts.app')
@section('title')
    Reports | Activity Logs
@endsection
@section('pageDescription')
    Activity Logs
@endsection
@section('routeName')
    {{Route::getCurrentRoute()->getPath()}} / activities
@endsection
@section('content')
    @include('layouts.partials.reports',['graphTitle' => 'Activity Logs', 'btnClass' => 'btn-success', 'paneType' => 'bg-success', "category" => $category])
    @if($activities->isEmpty())
        {{ Session::flash("error", "No Activity Logs.....") }}

    @else
        <div class="row">
            <table class="table table-hover table-responsive">
                <thead>
                <tr class="text-center">
                    <th class="text-center">#</th>
                    <th class="text-center">TIME</th>
                    <th class="text-center">USER</th>
                    <th class="text-center">ACTIVITY</th>
                </tr>
                </thead>
                <tbody>
                <?php $iterator = 0 ?>
                    @foreach($activities as $activity)
                        <tr class="{{ $tableContextColors[$iterator++] }}">
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td class="text-center">{{$activity->created_at}}</td>
                            <td class="text-center">{{App\User::find($activity->user_id)->name}}</td>
                            <td class="text-center">{{$activity->logMessage}}</td>
                        </tr>
                        @if($iterator >= count($tableContextColors))
                            @php($iterator = 0)
                        @endif
                    @endforeach
                    <tr style="align-content: center">
                        <td colspan="4" class="text-center">{{$activities->links()}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endif
@endsection
@section('pageScripts')

@endsection
