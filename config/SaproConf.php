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

];