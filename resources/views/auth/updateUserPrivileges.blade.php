<?php
/**
 * Created by PhpStorm.
 * User: glasses
 * Date: 10/8/16
 * Time: 8:12 PM
 */
?>
@extends('layouts.app')
@section('title')
    Privileges
@endsection
@section('pageDescription')
    Edit User Privileges
@endsection
@section('routeName')
    accounts / edit privileges
@endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="">
                <div class="panel panel-success">
                    <div class="panel-heading text-center">Edit User Privileges</div>

                    <div class="panel-body col-md-offset-1 col-md-10">

                        {!! Form::open(['method' => 'PATCH' , 'action' => ['AccountsController@update', 'category' => 'privilege']]) !!}
                           <table class="table table-hover table-responsive">
                                <tbody>

                                        <input type="hidden" name="user_id" value="{{$privileges[0]->user_id}}">
                                        <input type="hidden" name="category" value="privilege">

                                        <div id="membershipPermissions">
                                            <tr class="bg-purple">
                                                <td colspan="2">
                                                    <a class="btn btn-block disabled text-white"> Membership </a>
                                                </td>
                                            </tr>

                                            <tr class="">
                                                <td>Can Add New Member</td>
                                                <td>
                                                    <div class="switch pull-right">
                                                        <input name="addNewMember" id="addNewMember" type="checkbox" value="1" {{(bool)$privileges[0]->addNewMember ? "checked" : ""}}>
                                                        <label for="addNewMember" class="switch-success"></label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr class="success">
                                                <td>Can Update Member Info</td>
                                                <td>
                                                    <div class="switch pull-right">
                                                        <input name="updateMemberInfo" id="updateMemberInfo" type="checkbox" value="1" {{(bool)$privileges[0]->updateMemberInfo ? "checked" : ""}}>
                                                        <label for="updateMemberInfo" class="switch-success"></label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr class="">
                                                <td>Can View Member Details</td>
                                                <td>
                                                    <div class="switch pull-right">
                                                        <input name="viewMemberDetails" id="viewMemberDetails" type="checkbox" value="1" {{(bool)$privileges[0]->viewMemberDetails ? "checked" : ""}}>
                                                        <label for="viewMemberDetails" class="switch-success"></label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr class="info">
                                                <td>Can View Membership List</td>
                                                <td>
                                                    <div class="switch pull-right">
                                                        <input name="viewMembershipList" id="viewMembershipList" type="checkbox" value="1" {{(bool)$privileges[0]->viewMembershipList ? "checked" : ""}}>
                                                        <label for="viewMembershipList" class="switch-success"></label>
                                                    </div>
                                                </td>
                                            </tr>


                                            <tr class="">
                                                <td>Can  Remove Member Details</td>
                                                <td>
                                                    <div class="switch pull-right">
                                                        <input name="removeMemberDetails" id="removeMemberDetails" type="checkbox" value="1" {{(bool)$privileges[0]->removeMemberDetails ? "checked" : ""}}>
                                                        <label for="removeMemberDetails" class="switch-success"></label>
                                                    </div>
                                                </td>
                                            </tr>

                                        </div>


                                        <div id="financePermission">
                                            <tr class="bg-purple">
                                                <td colspan="2">
                                                    <a class="btn btn-block disabled text-white"> Finances </a>
                                                </td>
                                            </tr>

                                            <tr class="warning">
                                                <td>Can Record Tithe</td>
                                                <td>
                                                    <div class="switch pull-right">
                                                        <input name="recordTithe" id="recordTithe" type="checkbox" value="1" {{(bool)$privileges[0]->recordTithe ? "checked" : ""}}>
                                                        <label for="recordTithe" class="switch-success"></label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr class="">
                                                <td>Can Record Welfare</td>
                                                <td>
                                                    <div class="switch pull-right">
                                                        <input name="recordWelfare" id="recordWelfare" type="checkbox" value="1" {{(bool)$privileges[0]->recordWelfare ? "checked" : ""}}>
                                                        <label for="recordWelfare" class="switch-success"></label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr class="danger">
                                                <td>Can Record Donations</td>
                                                <td>
                                                    <div class="switch pull-right">
                                                        <input name="recordDonations" id="recordDonations" type="checkbox" value="1" {{(bool)$privileges[0]->recordDonations ? "checked" : ""}}>
                                                        <label for="recordDonations" class="switch-success"></label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr class="">
                                                <td>Can Record Offertory</td>
                                                <td>
                                                    <div class="switch pull-right">
                                                        <input name="recordOffertory" id="recordOffertory" type="checkbox" value="1" {{(bool)$privileges[0]->recordOffertory ? "checked" : ""}}>
                                                        <label for="recordOffertory" class="switch-success"></label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr class="active">
                                                <td>Can Record Expenditure</td>
                                                <td>
                                                    <div class="switch pull-right">
                                                        <input name="recordExpenditure" id="recordExpenditure" type="checkbox" value="1" {{(bool)$privileges[0]->recordExpenditure ? "checked" : ""}}>
                                                        <label for="recordExpenditure" class="switch-success"></label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr class="">
                                                <td>Can Record Pledges</td>
                                                <td>
                                                    <div class="switch pull-right">
                                                        <input name="recordPledges" id="recordPledges" type="checkbox" value="1" {{(bool)$privileges[0]->recordPledges ? "checked" : ""}}>
                                                        <label for="recordPledges" class="switch-success"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="success">
                                                <td>Can Redeem Pledges</td>
                                                <td>
                                                    <div class="switch pull-right">
                                                        <input name="redeemPledges" id="redeemPledges" type="checkbox" value="1" {{(bool)$privileges[0]->redeemPledges ? "checked" : ""}}>
                                                        <label for="redeemPledges" class="switch-success"></label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr class="">
                                                <td>View Member Payment History</td>
                                                <td>
                                                    <div class="switch pull-right">
                                                        <input name="viewMemberPaymentHistory" id="viewMemberPaymentHistory" type="checkbox" value="1" {{(bool)$privileges[0]->viewMemberPaymentHistory ? "checked" : ""}}>
                                                        <label for="viewMemberPaymentHistory" class="switch-success"></label>
                                                    </div>
                                                </td>
                                            </tr>

                                        </div>

                                        <div id="notificationsPermissions">
                                            <tr class="bg-purple">
                                                <td colspan="2">
                                                    <a class="btn btn-block disabled text-white"> Notifications </a>
                                                </td>
                                            </tr>

                                            <tr class="info">
                                                <td>Can Send SMS Notifications</td>
                                                <td>
                                                    <div class="switch pull-right">
                                                        <input name="sendSMSNotifications" id="sendSMSNotifications" type="checkbox" value="1" {{(bool)$privileges[0]->sendSMSNotifications ? "checked" : ""}}>
                                                        <label for="sendSMSNotifications" class="switch-success"></label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr class="">
                                                <td>Can Send Voice Notifications</td>
                                                <td>
                                                    <div class="switch pull-right">
                                                        <input name="sendVoiceNotifications" id="sendVoiceNotifications" type="checkbox" value="1" {{(bool)$privileges[0]->sendVoiceNotifications ? "checked" : ""}}>
                                                        <label for="sendVoiceNotifications" class="switch-success"></label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr class="warning">
                                                <td>Can Send Email Notifications</td>
                                                <td>
                                                    <div class="switch pull-right">
                                                        <input name="sendEmailNotifications" id="sendEmailNotifications" type="checkbox" value="1" {{(bool)$privileges[0]->sendEmailNotifications ? "checked" : ""}}>
                                                        <label for="sendEmailNotifications" class="switch-success"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </div>


                                        <div id="userAccountPermissions">
                                            <tr class="bg-purple">
                                                <td colspan="2">
                                                    <a class="btn btn-block disabled text-white"> User Accounts </a>
                                                </td>
                                            </tr>

                                            <tr class="">
                                                <td>Can Add New User Account</td>
                                                <td>
                                                    <div class="switch pull-right">
                                                        <input name="addAccount" id="addAccount" type="checkbox" value="1" {{(bool)$privileges[0]->addAccount ? "checked" : ""}}>
                                                        <label for="addAccount" class="switch-success"></label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr class="danger">
                                                <td>Can Remove User Account</td>
                                                <td>
                                                    <div class="switch pull-right">
                                                        <input name="removeAccount" id="removeAccount" type="checkbox" value="1" {{(bool)$privileges[0]->removeAccount ? "checked" : ""}}>
                                                        <label for="removeAccount" class="switch-success"></label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr class="">
                                                <td>Can Edit  User Privileges</td>
                                                <td>
                                                    <div class="switch pull-right">
                                                        <input name="editAccountPrivileges" id="editAccountPrivileges" type="checkbox" value="1" {{(bool)$privileges[0]->editAccountPrivileges ? "checked" : ""}}>
                                                        <label for="editAccountPrivileges" class="switch-success"></label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr class="warning">
                                                <td>View List Of Users</td>
                                                <td>
                                                    <div class="switch pull-right">
                                                        <input name="viewUsersList" id="viewUsersList" type="checkbox" value="1" {{(bool)$privileges[0]->viewUsersList ? "checked" : ""}}>
                                                        <label for="viewUsersList" class="switch-success"></label>
                                                    </div>
                                                </td>
                                            </tr>

                                        </div>

                                        <div id="utilitiesPermissions">
                                            <tr class="bg-purple">
                                                <td colspan="2">
                                                    <a class="btn btn-block disabled text-white"> Utilities </a>
                                                </td>
                                            </tr>

                                            <tr class="active">
                                                <td>Can Record Attendance</td>
                                                <td>
                                                    <div class="switch pull-right">
                                                        <input name="recordAttendance" id="recordAttendance" type="checkbox" value="1" {{(bool)$privileges[0]->recordAttendance ? "checked" : ""}}>
                                                        <label for="recordAttendance" class="switch-success"></label>
                                                    </div>
                                                </td>
                                            </tr>


                                            <tr class="">
                                                <td>Can Update Church Details</td>
                                                <td>
                                                    <div class="switch pull-right">
                                                        <input name="updateChurchDetails" id="updateChurchDetails" type="checkbox" value="1" {{(bool)$privileges[0]->updateChurchDetails ? "checked" : ""}}>
                                                        <label for="updateChurchDetails" class="switch-success"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="success">
                                                <td>Can Add Groups/Sub-Ministries</td>
                                                <td>
                                                    <div class="switch pull-right">
                                                        <input name="addGroupOrMinistry" id="addGroupOrMinistry" type="checkbox" value="1" {{(bool)$privileges[0]->addGroupOrMinistry ? "checked" : ""}}>
                                                        <label for="addGroupOrMinistry" class="switch-success"></label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr class="">
                                                <td>Can Update Birthday Wisher Details</td>
                                                <td>
                                                    <div class="switch pull-right">
                                                        <input name="updateBirthDayWisherDetails" id="updateBirthDayWisherDetails" type="checkbox" value="1" {{(bool)$privileges[0]->updateBirthDayWisherDetails ? "checked" : ""}}>
                                                        <label for="updateBirthDayWisherDetails" class="switch-success"></label>
                                                    </div>
                                                </td>
                                            </tr>

                                        </div>

                                        <div id="reportsPermissions">
                                            <tr class="bg-purple">
                                                <td colspan="2">
                                                    <a class="btn btn-block disabled text-white"> Reports </a>
                                                </td>
                                            </tr>

                                            <tr class="info">
                                                <td>Can View Tithe Reports</td>
                                                <td>
                                                    <div class="switch pull-right">
                                                        <input name="viewTitheReport" id="viewTitheReport" type="checkbox" value="1" {{(bool)$privileges[0]->viewTitheReport ? "checked" : ""}}>
                                                        <label for="viewTitheReport" class="switch-success"></label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr class="">
                                                <td>Can View Welfare Reports</td>
                                                <td>
                                                    <div class="switch pull-right">
                                                        <input name="viewWelfareReport" id="viewWelfareReport" type="checkbox" value="1" {{(bool)$privileges[0]->viewWelfareReport ? "checked" : ""}}>
                                                        <label for="viewWelfareReport" class="switch-success"></label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr class="warning">
                                                <td>Can View Pledge Reports</td>
                                                <td>
                                                    <div class="switch pull-right">
                                                        <input name="viewPledgeReport" id="viewPledgeReport" type="checkbox" value="1" {{(bool)$privileges[0]->viewPledgeReport ? "checked" : ""}}>
                                                        <label for="viewPledgeReport" class="switch-success"></label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr class="">
                                                <td>Can View Activity Logger Reports</td>
                                                <td>
                                                    <div class="switch pull-right">
                                                        <input name="viewActivityLogReport" id="viewActivityLogReport" type="checkbox" value="1" {{(bool)$privileges[0]->viewActivityLogReport ? "checked" : ""}}>
                                                        <label for="viewActivityLogReport" class="switch-success"></label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr class="danger">
                                                <td>Can View Offertory Reports</td>
                                                <td>
                                                    <div class="switch pull-right">
                                                        <input name="viewOffertoryReport" id="viewOffertoryReport" type="checkbox" value="1" {{(bool)$privileges[0]->viewOffertoryReport ? "checked" : ""}}>
                                                        <label for="viewOffertoryReport" class="switch-success"></label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr class="">
                                                <td>Can View Donations Reports</td>
                                                <td>
                                                    <div class="switch pull-right">
                                                        <input name="viewDonationsReport" id="viewDonationsReport" type="checkbox" value="1" {{(bool)$privileges[0]->viewDonationsReport ? "checked" : ""}}>
                                                        <label for="viewDonationsReport" class="switch-success"></label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr class="active">
                                                <td>Can View Attendance Reports</td>
                                                <td>
                                                    <div class="switch pull-right">
                                                        <input name="viewAttendanceReport" id="viewAttendanceReport" type="checkbox" value="1" {{(bool)$privileges[0]->viewAttendanceReport ? "checked" : ""}}>
                                                        <label for="viewAttendanceReport" class="switch-success"></label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr class="">
                                                <td>Can View Membership Reports</td>
                                                <td>
                                                    <div class="switch pull-right">
                                                        <input name="viewMembershipReport" id="viewMembershipReport" type="checkbox" value="1" {{(bool)$privileges[0]->viewMembershipReport ? "checked" : ""}}>
                                                        <label for="viewMembershipReport" class="switch-success"></label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr class="success">
                                                <td>Can View Account Usage Reports</td>
                                                <td>
                                                    <div class="switch pull-right">
                                                        <input name="viewAccountUsageReport" id="viewAccountUsageReport" type="checkbox" value="1" {{(bool)$privileges[0]->viewAccountUsageReport ? "checked" : ""}}>
                                                        <label for="viewAccountUsageReport" class="switch-success"></label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr class="">
                                                <td>Can View Expenditure Reports</td>
                                                <td>
                                                    <div class="switch pull-right">
                                                        <input name="viewExpensesReport" id="viewExpensesReport" type="checkbox" value="1" {{(bool)$privileges[0]->viewExpensesReport ? "checked" : ""}}>
                                                        <label for="viewExpensesReport" class="switch-success"></label>
                                                    </div>
                                                </td>
                                            </tr>

                                        </div>
                                </tbody>
                           </table>
                        <div class="form-group">
                            {!! Form::submit("Update Privileges messages",['class' => 'btn-primary btn-block form-control']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
            {{--<div class="col-md-1"></div>--}}
        </div>
    </div>

@endsection
