<?php
/**
 * Created by PhpStorm.
 * User: glasses
 * Date: 9/16/16
 * Time: 5:05 PM
 */
?>
@extends('layouts.app')
@section('title')
    Groups
@endsection
@section('pageDescription')
@endsection
@section('routeName')
    utilities / groups & sub-ministries
@endsection
@section('content')

    <div class="widget">
        <div class="widget-heading text-center bg-info"><h5>Church Groups And Sub-Ministries</h5></div>
        <div class="widget-body">
            @if(isset($groups) && !empty($groups) && count($groups) > 0)
                <div class="row">
                    <table class="table table-hover table-responsive">
                        <thead>
                        <tr class="text-center">
                            <th class="text-center">#</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Tools</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php($i = 0)
                            @foreach($groups as $group)
                                <tr class="{{$tableContextColors[$i++]}}">
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td class="text-center">{{$group->name}}</td>
                                    <td class="text-center">
                                        <a href="{{action("UtilitiesController@edit",[$group->id, 'category' => 'groups'])}}">
                                            <i class="text-info ti-pencil-alt" aria-hidden="true" data-toggle="tooltip" title="Update Group Details"></i>
                                        </a>
                                        <a href="{{action("UtilitiesController@destroy",[$group->id])}}">
                                            <i class="text-danger ti-close" aria-hidden="true" data-toggle="tooltip" title="Delete Group" onclick="event.preventDefault(); document.getElementById('delete-member-form').submit();"></i>
                                            <form id="delete-member-form" action="{{action("UtilitiesController@destroy",[$group->id, 'category' => 'group'])}}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                                {{method_field('DELETE')}}
                                            </form>
                                        </a>
                                    </td>
                                </tr>
                                @if($i >= count($tableContextColors))
                                    @php($i = 0)
                                @endif

                            @endforeach
                            <tr style="align-content: center">
                                <td colspan="3" class="text-center">{{$groups->links()}}</td>
                            </tr>
                        </tbody>
                    </table>

                 </div>
                @else
                    <div class="text-center">
                        Not Groups Found
                    </div>
            @endif
            <div>
                <a class="btn btn-block btn-primary" href="{{action("UtilitiesController@create",['category' => 'group'])}}">Add New Group</a>
            </div>
        </div>
    </div>
@endsection
