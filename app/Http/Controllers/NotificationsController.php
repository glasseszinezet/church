<?php

namespace App\Http\Controllers;

use App\ActivityLogger;
use App\Group;
use App\Mail\Notifications;
use App\Member;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Request $request)
    {
        switch ($request->input("category"))
        {
            case 'sms':
                if((bool)Auth::User()->privileges()->get()[0]->sendSMSNotifications)
                    return view('layouts.partials.notifications')->with(["category" => $request->input("category"), "groups" => Group::orderBy('name')->select('id','name')->get()->toArray(), "btnClass" => "btn-success", "bgClass" => "bg-success", "switchClass" => "switch-success"]);
                else
                    return view('errors.401');
                break;
            case 'voice':
                if((bool)Auth::User()->privileges()->get()[0]->sendVoiceNotifications)
                    return view('layouts.partials.notifications')->with(["category" => $request->input("category"), "groups" => Group::orderBy('name')->select('id','name')->get()->toArray(), "btnClass" => "btn-warning", "bgClass" => "bg-warning", "switchClass" => "switch-warning"]);
                else
                    return view('errors.401');
                break;
            case 'mail':
                if((bool)Auth::User()->privileges()->get()[0]->sendEmailNotifications)
                    return view('layouts.partials.notifications')->with(["category" => $request->input("category"), "groups" => Group::orderBy('name')->select('id','name')->get()->toArray(), "btnClass" => "btn-danger", "bgClass" => "bg-danger", "switchClass" => "switch-error"]);
                else
                    return view('errors.401');
                break;
            default:
                return redirect("/home");
        }
    }

    public function store(Request $request)
    {

        $recipients =  (Array)$request->input("recipients");

        if (in_array("allMembers",$recipients))
        {
            \Log::debug("Notification is to all church Members");
            if (in_array("activeMembersOnly",$recipients))
                $notificationDetails = Member::where('status','active')->select(['phone','email','firstName'])->get()->toArray();
            else
                $notificationDetails = Member::select(['phone','email','firstName'])->get()->toArray();


        }else
        {
            \Log::debug("Notification is to members of specific groups. Fetching group members");

            $members = collect([]);
            $groups = Group::all();
            foreach ($groups as $group)
                if (in_array("group_".$group->id,$recipients))
                {
                    if (in_array("activeMembersOnly",$recipients))
                        $members->prepend($group->members()->where("status","active")->select(['phone','email','firstName'])->get());
                    else
                        $members->prepend($group->members()->select(['phone','email','firstName'])->get());
                }
            $notificationDetails = array_collapse($members->toArray());

        }

        switch ($request->input("category"))
        {
            case 'sms':
                if((bool)Auth::User()->privileges()->get()[0]->sendSMSNotifications)
                {

                    $SMSRecipients = array();
                    foreach ($notificationDetails as $notificationDetail)
                        array_push($SMSRecipients, $notificationDetail['phone']);

                    $SMSRecipients = array_unique($SMSRecipients);

//                    ActivityLogger::create(['user_id' => Auth::User()->id, 'logMessage' => "Sent SMS Notifications to ".count($SMSRecipients)." member(s)"]);
                    $this->dispatch(new \App\Jobs\ActivityLogger(Auth::User()->id,"Sent SMS Notifications to ".count($SMSRecipients)." member(s)"));
                    if ((bool)config("SaproConf.sendSMS"))
                    {
                        self::sendSMS($request->input("message"),$SMSRecipients);
                        $request->session()->flash("success","SMS Sent To ".count($SMSRecipients)." Member(s)");
                    }else
                    {
                        $request->session()->flash("success","Sending SMS Notifications to ".count($SMSRecipients)." Member(s) Simulated Successfully.");
                    }
                }else
                {
                    return view('errors.401');
                }

                break;
            case 'voice':
                if((bool)Auth::User()->privileges()->get()[0]->sendVoiceNotifications)
                {
                    $VoiceRecipients = array();
                    foreach ($notificationDetails as $notificationDetail)
                        array_push($VoiceRecipients, $notificationDetail['phone']);

                    $VoiceRecipients = array_unique($VoiceRecipients);

                    $voiceClipURL = null;
                    if ($request->hasFile("voiceClip"))
                    {
                        if (in_array($request->file("voiceClip")->getMimeType(), array("audio/mpeg","audio/x-wav")))
                        {
                            $fileName = md5(time()).".".$request->file("voiceClip")->getClientOriginalExtension();

                            $request->file("voiceClip")->move(public_path()."/uploads",$fileName);
                            $voiceClipURL = \URL::asset('uploads/'.$fileName);
                            \Log::debug($voiceClipURL);
                        }else
                        {
                            $request->session()->flash("error","Invalid file type. File should be MP3 or WAV ");
                            return redirect()->back()->withInput();
                        }
                    }

//                    ActivityLogger::create(['user_id' => Auth::User()->id, 'logMessage' => "Sent Voice Notifications to ".count($VoiceRecipients)." member(s)"]);
                    $this->dispatch(new \App\Jobs\ActivityLogger(Auth::User()->id,"Sent Voice Notifications to ".count($VoiceRecipients)." member(s)"));
                    if ((bool)config("SaproConf.sendVoice"))
                    {
                        if ($voiceClipURL != null)
                        {
                            self::sendVoice(null,$voiceClipURL, $VoiceRecipients);
                            $request->session()->flash("success","Voice Notifications Sent To ".count($VoiceRecipients)." Member(s)");
                        }else
                        {
                            self::sendVoice($request->input("message"),null, $VoiceRecipients);
                            $request->session()->flash("success","Voice Notifications Sent To ".count($VoiceRecipients)." Member(s)");
                        }
                    }else
                    {
                        $request->session()->flash("success","Sending Voice Notifications to ".count($VoiceRecipients)." Member(s) Simulated Successfully.");
                    }
                }else
                {
                    return view('errors.401');
                }


                break;
            case "mail":
                if((bool)Auth::User()->privileges()->get()[0]->sendEmailNotifications)
                {
                    $mailRecipients = array();
                    foreach ($notificationDetails as $notificationDetail)
                        array_push($mailRecipients, array("mail" => $notificationDetail['email'], "name" => $notificationDetail['firstName'] ));

//                    ActivityLogger::create(['user_id' => Auth::User()->id, 'logMessage' => "Sent Email Notifications to ".count($mailRecipients)." member(s)"]);
                    $this->dispatch(new \App\Jobs\ActivityLogger(Auth::User()->id,"Sent Email Notifications to ".count($mailRecipients)." member(s)"));
                    if ((bool)config("SaproConf.sendEmail"))
                    {
//                        \Log::debug("Mail Message:: \t".$request->input("message"));
                        self::sendEmail($request->input("message"),$mailRecipients);
                        $request->session()->flash("success","Email Notifications Sent To ".count($mailRecipients)." Member(s)");
                    }else
                    {
                        $request->session()->flash("success","Sending Email Notifications to ".count($mailRecipients)." Member(s) Simulated Successfully.");
                    }
                }else
                {
                    return view('errors.401');
                }

                break;
        }
        return redirect("/home");
    }

    public static function sendSMS($message, $recipients = array())
    {

        $formattedRecipients = self::formattmsisdns($recipients);

        $requestBody = json_encode(array("from" => config('SaproConf.sendSMSConfigurations.fromField'), "to" => $formattedRecipients, "text" => $message));
        \Log::debug("Request Body");
        \Log::debug($requestBody);
        $process = curl_init(config('SaproConf.sendSMSConfigurations.baseEndPoint').config('SaproConf.sendSMSConfigurations.sendSMSEndPoint'));
        curl_setopt($process, CURLOPT_HEADER, 1);
        curl_setopt($process, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: '.strlen($requestBody), "Accept: application/json", "Authorization: Basic ".base64_encode(config('SaproConf.sendSMSConfigurations.username') . ":" . config('SaproConf.sendSMSConfigurations.password'))));

        curl_setopt($process, CURLOPT_POSTFIELDS, ($requestBody));
        curl_setopt($process, CURLOPT_RETURNTRANSFER, TRUE);
        $return = curl_exec($process);

        if ($return === false)
        {
            \Log::error("Request Failed");
            \Log::error(curl_error($process));
        }
        else
            \Log::debug("Send SMS Response: ".$return);

        curl_close($process);

    }

    public static function sendVoice($message = null, $clipURL = null, $recipients)
    {

        $formattedRecipients = self::formattmsisdns($recipients);

        if ($message == null)
            $requestBody = json_encode(array("from" => config('SaproConf.sendSMSConfigurations.VoiceFrom'), "to" => $formattedRecipients, "audioFileUrl" => $clipURL));
        else
            $requestBody = json_encode(array("from" => config('SaproConf.sendSMSConfigurations.VoiceFrom'), "to" => $formattedRecipients, "text" => $message));

        \Log::debug(config('SaproConf.sendSMSConfigurations.baseEndPoint').config('SaproConf.sendSMSConfigurations.sendVoiceEndPoint'));
        \Log::debug($requestBody);

        $process = curl_init(config('SaproConf.sendSMSConfigurations.baseEndPoint').config('SaproConf.sendSMSConfigurations.sendVoiceEndPoint'));
        curl_setopt($process, CURLOPT_HEADER, 1);
        curl_setopt($process, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: '.strlen($requestBody), "Accept: application/json", "Authorization: Basic ".base64_encode(config('SaproConf.sendSMSConfigurations.username') . ":" . config('SaproConf.sendSMSConfigurations.password'))));

        curl_setopt($process, CURLOPT_POSTFIELDS, ($requestBody));
        curl_setopt($process, CURLOPT_RETURNTRANSFER, TRUE);
        $return = curl_exec($process);

        if ($return === false)
        {
            \Log::error("Request Failed");
            \Log::error(curl_error($process));
        }
        else
            \Log::debug("Voice Response: ".$return);

        curl_close($process);

    }

    public static function sendEmail($message, $recipients)
    {
        foreach ($recipients as $recipient)
        {
//            \Log::debug($recipient['mail']."\t Name: ".$recipient['name']);
            \Mail::to($recipient['mail'])->send(new Notifications($recipient['name'],$message));
        }
    }

    private static function formattmsisdns($recipients = array())
    {
        $finalRecipientList = array();
        foreach($recipients as $recipient)
            array_push($finalRecipientList,"233".substr($recipient,1,strlen($recipient)));

        return array_unique($finalRecipientList);
    }
}
