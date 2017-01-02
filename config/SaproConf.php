<?php
/**
 * Created by PhpStorm.
 * User: glasses
 * Date: 9/10/16
 * Time: 5:51 PM
 */

return [
    "tableContextColors" => ['active','','success','','info','','warning','','danger'],
    "sendSMSConfigurations" => ["baseEndPoint" => "https://api.infobip.com/", "sendSMSEndPoint" => "sms/1/text/single", "username" => "ESoftGhana", "password" => "Password1", "fromField"=> "Church",
        "sendVoiceEndPoint" => "tts/2/messages", "VoiceFrom" => "12334"],

    "useRandomsForReports" => true,
    "sendSMS" => false,
    "sendVoice" => false,
    "sendEmail" => false,
    "messages" => [
        "donation" => "Hello @@first_name@@, Your donation of @@currency@@: @@amount@@ has been received by SaproChurch. Thank you",
        "pledge" => "Hello @@first_name@@, Your pledge of  @@currency@@: @@amount@@ has been recorded successfully by SaproChurch. Thank you",
        "pledge_redeem" => "Hello @@first_name@@, Your pledge of @@currency@@: @@amount@@ has been redeemed successfully by SaproChurch. Thank you",
        "tithe" => "Hello @@first_name@@, Your Tithe contribution of @@currency@@: @@amount@@ has been received successfully by SaproChurch. Thank you",
        "welfare" => "Hello @@first_name@@, Your welfare contribution of @@currency@@: @@amount@@ has been received successfully by SaproChurch. Thank you",
        "offertory" => "New Offertory of @@currency@@: @@amount@@ has been recorded at @@time@@",
        "expenditure" => "New Offertory of @@currency@@: @@amount@@ has been recorded at @@time@@",
    ],
    "alerts" => [
        "offertory" => [
            "0541859113",
            "0244834330"
        ],
        "expenditure" => [
            "0541859113",
            "0244834330"
        ],
    ]
];