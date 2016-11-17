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
    View Member Detail
@endsection
@section('pageDescription')
    View Member Details
@endsection
@section('routeName')
    membership/details
@endsection
@section('content')
    @if(isset($member) && !empty($member))
        <table class="table table-hover table-responsive text-center">
            <thead>
            <tr>
                <th class="text-center">Category</th>
                <th class="text-center">Details</th>
            </tr>
            </thead>
            <tbody>

                <tr class="{{$tableContextColors[0]}}">
                    <td><strong>Gender:</strong></td>
                    <td>{{ $member->gender }}</td>
                </tr>

                <tr {{$tableContextColors[1]}}>
                    <td><strong>First Name:</strong></td>
                    <td>{{ $member->firstName }}</td>
                </tr>

                <tr class="{{$tableContextColors[2]}}">
                    <td><strong>Last Name:</strong></td>
                    <td>{{ $member->lastName }}</td>
                </tr>

                <tr class="{{$tableContextColors[3]}}">
                    <td><strong>Other Name(s):</strong></td>
                    <td>{{ $member->otherNames }}</td>
                </tr>

                <tr class="{{$tableContextColors[4]}}">
                    <td><strong>Date Of Birth:</strong></td>
                    <td>{{ \Carbon\Carbon::parse($member->dateOfBirth)->toFormattedDateString()." (".\Carbon\Carbon::parse($member->dateOfBirth)->diffForHumans().")" }}</td>
                </tr>

                <tr class="{{$tableContextColors[5]}}">
                    <td><strong>Age:</strong></td>
                    <td>{{ $member->age }}</td>
                </tr>

                <tr class="{{$tableContextColors[6]}}">
                    <td><strong>Nationality:</strong></td>
                    <td>{{ App\Country::where('code','=',$member->nationality)->get()->first()->name }}</td>
                </tr>

                <tr class="{{$tableContextColors[7]}}">
                    <td><strong>Place Of Birth, Home-Town:</strong></td>
                    <td>{{ $member->placeOfBirth.", ".(isset($member->homeTown) && !empty($member->homeTown) ? $member->homeTown: "Not Known") }}</td>
                </tr>

                <tr class="{{$tableContextColors[8]}}">
                    <td><strong>Phone(s) and Email</strong></td>
                    <td>{{ $member->phone."".(isset($member->alternatePhone) && !empty($member->alternatePhone) ? ",".$member->alternatePhone: "").", ".$member->email }}</td>
                </tr>


                {{-- New Starting point--}}

                <tr class="{{$tableContextColors[0]}}">
                    <td><strong>Address:</strong></td>
                    <td>{{ $member->address.", ".$member->houseNumber.", ".$member->suburb }}</td>
                </tr>

                <tr {{$tableContextColors[1]}}>
                    <td><strong>Marriage Info:</strong></td>
                    <td>{{"Status: ".$member->marriageStatus." ,Spouse: ".((isset($member->nameOfSpouse) && !empty($member->nameOfSpouse)) ? $member->nameOfSpouse : "None")." ,Spouse Contact: ".((isset($member->spousePhone) && !empty($member->spousePhone)) ? $member->spousePhone : "None")." ,Children: ".((isset($member->numberOfChildren) && !empty($member->numberOfChildren)) ? $member->numberOfChildren : "None")}}</td>

                </tr>

                <tr class="{{$tableContextColors[2]}}">
                    <td><strong>Parents:</strong></td>
                    <td>{{ "Father: ".$member->fathersName.", Mother: ".$member->mothersName }}</td>
                </tr>

                <tr class="{{$tableContextColors[3]}}">
                    <td><strong>Next Of Kin:</strong></td>
                    <td>{{ $member->nextOfKin }}</td>
                </tr>

                <tr class="{{$tableContextColors[4]}}">
                    <td><strong>Date Joined Church:</strong></td>
                    <td>{{ \Carbon\Carbon::parse($member->dateMemberJoinedChurch)->toFormattedDateString()." (".\Carbon\Carbon::parse($member->dateMemberJoinedChurch)->diffForHumans().")" }}</td>
                </tr>

                <tr class="{{$tableContextColors[5]}}">
                    <td><strong>Status (Church):</strong></td>
                    <td>{{ $member->status }}</td>
                </tr>

                <tr class="{{$tableContextColors[6]}}">
                    <td><strong>Confirmation Details:</strong></td>
                    <td>{{ "Date: ".\Carbon\Carbon::parse($member->dateConfirmed)->toFormattedDateString().", at: ".$member->confirmationLocation.", by: ".$member->confirmationMinister }}</td>
                </tr>

                <tr class="{{$tableContextColors[7]}}">
                    <td><strong>Baptism Details:</strong></td>
                    <td>{{ "Date: ".\Carbon\Carbon::parse($member->dateBaptized)->toFormattedDateString().", at: ".$member->baptismLocation.", by: ".$member->baptismMinister }}</td>
                </tr>

                <tr class="{{$tableContextColors[8]}}">
                    <td><strong>Work Details</strong></td>
                    <td>{{ "Occupation: ".$member->occupation.", Work Address: ".$member->employerAddress.", Work Phone: ".$member->workPhone }}</td>
                </tr>

                <tr {{$tableContextColors[1]}}>
                    <td><strong>Church Position/Groups:</strong></td>
                    <td>{{"Position: ".(\App\Position::find($member->positionInChurch)->title).", Groups: ".(
                    ($member->groups->isEmpty() ? "None" : (implode(",",$member->groups->pluck('name')->toArray())))
                    )
                    }}</td>

                </tr>

                <tr class="{{$tableContextColors[2]}}">
                    <td><strong>Record Details:</strong></td>
                    <td>{{ "Created @: ".\Carbon\Carbon::parse($member->created_at)->toFormattedDateString()." (".\Carbon\Carbon::parse($member->created_at)->diffForHumans().")"
                    ." last Updated: ".\Carbon\Carbon::parse($member->updated_at)->toFormattedDateString()." (".\Carbon\Carbon::parse($member->updated_at)->diffForHumans().")" }}</td>
                </tr>
            </tbody>
        </table>
    @else
        <script>

            sweetAlertInitialize();
            swal({
                type: "error",
                title: "No data was found for the specified details",
                confirmButtonClass:"btn-raised btn-danger",
                confirmButtonText:"OK"
            })
        </script>
    @endif
@endsection