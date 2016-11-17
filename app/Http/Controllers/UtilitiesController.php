<?php

namespace App\Http\Controllers;

use App\ActivityLogger;
use App\Attendance;
use App\BirthdayWisher;
use App\Church;
use App\Group;
use App\Service;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class UtilitiesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
        switch ($request->input("category"))
        {
            case 'groups':
                if((bool)Auth::User()->privileges()->get()[0]->addGroupOrMinistry)
                {
//                    ActivityLogger::create(['user_id' => Auth::User()->id, 'logMessage' =>"Viewed list of groups/sub-ministries"]);
                   dispatch(new \App\Jobs\ActivityLogger(Auth::User()->id,"Viewed list of groups/sub-ministries"));
                    return view("utilities.groupsList")->with(['groups' => Group::paginate(20),'tableContextColors' => config('SaproConf.tableContextColors')]);
                }
                else
                    return view('errors.401');
                break;
            default:
                return redirect("/home");
                break;
        }
    }

    public function create(Request $request)
    {
        switch ($request->input("category"))
        {

            case 'attendance':
                if((bool)Auth::User()->privileges()->get()[0]->recordAttendance)
                    return view('utilities.recordAttendance')->with(['services' => Service::pluck('name', 'id')]);
                else
                    return view('errors.401');
                break;
            case 'church':
                if((bool)Auth::User()->privileges()->get()[0]->updateChurchDetails)
                    return view('utilities.updateChurchInfo')->with(['church' => Church::findOrFail(1)]);
                else
                    return view('errors.401');
                break;
            case 'group':
                if((bool)Auth::User()->privileges()->get()[0]->addGroupOrMinistry)
                    return view("utilities.addGroup");
                else
                    return view('errors.401');
                break;

            case 'bdWisher':
                if((bool)Auth::User()->privileges()->get()[0]->updateBirthDayWisherDetails)
                    return view("utilities.updateBirthDayWisherDetails")->with(['config' => BirthdayWisher::findOrFail(1)]);
                else
                    return view('errors.401');
                break;
            default:
                $request->session()->flash("error","Invalid Request.");
                return redirect("/home");
                break;
        }
    }

    public function edit(Request $request, $id)
    {
        switch ($request->input("category"))
        {
            case  'groups':
                if((bool)Auth::User()->privileges()->get()[0]->addGroupOrMinistry)
                    return view("utilities.updateGroup")->with(["group" =>  Group::findOrFail($id)]);
                else
                    return view('errors.401');
                break;
            default:
                return redirect("/home");
        }
    }

    public function store(Request $request)
    {
        switch ($request->input("category"))
        {
            case 'group':
                if((bool)Auth::User()->privileges()->get()[0]->addGroupOrMinistry)
                {
                    $group = Group::create($request->all());
//                    ActivityLogger::create(['user_id' => Auth::User()->id, 'logMessage' =>"Added New Group with name: ".$group->name]);
                    dispatch(new \App\Jobs\ActivityLogger(Auth::User()->id,"Added New Group with name: ".$group->name));
                    $request->session()->flash("success","Group Added Successfully Successfully");
                    return redirect("/utilities?category=groups");
                }else
                {
                    return view('errors.401');
                }
                break;
            case 'attendance':
                if((bool)Auth::User()->privileges()->get()[0]->recordAttendance)
                {
                    Attendance::create($request->all());
//                    ActivityLogger::create(['user_id' => Auth::User()->id, 'logMessage' =>"Added Attendance Records "]);
                    dispatch(new \App\Jobs\ActivityLogger(Auth::User()->id,"Added Attendance Records "));
                    $request->session()->flash("success","Attendance Recorded Successfully");
                    return redirect("/home");
                }else
                {
                    return view('errors.401');
                }

                break;
            case 'bdayWisher':
                if((bool)Auth::User()->privileges()->get()[0]->updateBirthDayWisherDetails)
                {
                    $birthdayWisher = BirthdayWisher::findOrFail(1);
                    $birthdayWisher->message = $request->input("message");
                    $birthdayWisher->activeMembersOnly = ($request->has('activeMembersOnly') && (boolean)$request->input('activeMembersOnly')) ? 1 : 0;
                    $birthdayWisher->save();
//                    ActivityLogger::create(['user_id' => Auth::User()->id, 'logMessage' =>"Updated Birthday Wisher Details"]);
                    dispatch(new \App\Jobs\ActivityLogger(Auth::User()->id,"Updated Birthday Wisher Details"));
                    $request->session()->flash("success","Birthday Wisher Details Updated Successfully.");
                    return redirect("/home");
                }else
                {
                    return view('errors.401');
                }
                break;
            default:
                $request->session()->flash("error","Invalid Request.");
                return redirect("/home");
                break;
        }
    }

    public function update(Request $request, $id)
    {
        switch ($request->input("category"))
        {
            case 'church':
                if((bool)Auth::User()->privileges()->get()[0]->updateChurchDetails)
                {
                    $church = Church::findOrFail($id);
                    if (in_array($request->file("logoName")->getMimeType(), array("image/png","image/jpeg","image/gif")))
                    {
                        $imageName = md5(time()).".".$request->file("logoName")->getClientOriginalExtension();
                        $request->file('logoName')->move(public_path()."/uploads",$imageName);

                        $church->update($request->all());
                        $church->logoName = $imageName;
                        $church->save();
//                        ActivityLogger::create(['user_id' => Auth::User()->id, 'logMessage' =>"Updated Church Details"]);
                        dispatch(new \App\Jobs\ActivityLogger(Auth::User()->id,"Updated Church Details"));
                        $request->session()->flash("success","Church Information Updated successfully.");
                        return redirect("/home");
                    }else
                    {
                        $request->session()->flash("error","Invalid File Format must be PNG, JPEG or GIF");
                        return redirect()->back()->withInput();
                    }
                }else
                {
                    return view('errors.401');
                }
                break;
            case  'group':
                if((bool)Auth::User()->privileges()->get()[0]->addGroupOrMinistry)
                {
                    $group = Group::findOrFail($id);
//                    ActivityLogger::create(['user_id' => Auth::User()->id, 'logMessage' =>"Updated details of Group/ Ministry with name ".$group->name]);
                    dispatch(new \App\Jobs\ActivityLogger(Auth::User()->id,"Updated details of Group/ Ministry with name ".$group->name));
                    $group->update($request->all());
                    $request->session()->flash("success","Group Details Updated Successfully..");
                    return redirect("/utilities?category=groups");
                }else
                {
                    return view('errors.401');
                }
                break;
            default:
                return redirect("/home");
                break;
        }
    }

    public function destroy(Request $request, $id)
    {
        switch ($request->input("category"))
        {
            case 'group':
                if((bool)Auth::User()->privileges()->get()[0]->addGroupOrMinistry)
                {
                    $group = Group::findOrFail($id);
//                    ActivityLogger::create(['user_id' => Auth::User()->id, 'logMessage' =>"Removed Group/ Ministry with name ".$group->name]);
                    dispatch(new \App\Jobs\ActivityLogger(Auth::User()->id,"Removed Group/ Ministry with name ".$group->name));
                    $group->delete();
                    $request->session()->flash("success","Group Removed Successfully");
                    return redirect(url("utilities?category=groups"));
                }else
                {
                    return view('errors.401');
                }
                break;
            default:
                return redirect("/home");
            break;
        }
    }

}
