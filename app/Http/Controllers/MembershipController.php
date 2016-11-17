<?php

namespace App\Http\Controllers;

use App\ActivityLogger;
use App\Group;
use App\Position;
use App\Country;
use App\Member;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class MembershipController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if((bool)Auth::User()->privileges()->get()[0]->viewMembershipList)
            return view('membership.membershipList')->with(['iterator' => 0,'members' => Member::orderBy('firstName')->orderBy('otherNames')->orderBy('lastName')->paginate(20), 'tableContextColors' => config('SaproConf.tableContextColors')]);
        else
            return view('errors.401');
    }

    public function create()
    {
        if((bool)Auth::User()->privileges()->get()[0]->addNewMember)
            return view('membership.addNewMember')->with(
            [
                'countries' => Country::pluck('name','code'),
                'positions' => Position::pluck('title','id'),
                'groups' => Group::pluck('name','id'),
            ]
        );
        else
            return view('errors.401');
    }

    public function store(Request $request)
    {
        if((bool)Auth::User()->privileges()->get()[0]->addNewMember)
        {
            if ($this->memberExists($request->input('firstName'),$request->input('lastName'),$request->input('otherNames')))
            {
                $request->session()->flash("error","A member Already exists with the given credentials");
                return redirect()->back()->withInput();
            }else
            {
                $member = Member::create($request->all());
                $member->groups()->sync($request->input('churchGroups'));
//                ActivityLogger::create(['user_id' => Auth::User()->id, 'logMessage' =>"Added New Member with id ".$member->id]);
                $this->dispatch(new \App\Jobs\ActivityLogger(Auth::User()->id,"Added New Member with id ".$member->id));
                $request->session()->flash("success","Member Added Successfully.");
                return redirect('home');
            }
        }else
        {
            return view('errors.401');
        }

    }

    public function show($memberId)
    {
        if((bool)Auth::User()->privileges()->get()[0]->viewMemberDetails)
        {
            $member = Member::findOrFail($memberId);
//            ActivityLogger::create(['user_id' => Auth::User()->id, 'logMessage' =>"Viewed Member details. ->  id ".$member->id]);
            $this->dispatch(new \App\Jobs\ActivityLogger(Auth::User()->id,"Viewed Member details. ->  id ".$member->id));
            return view('membership.viewMemberDetails')->with(['member' => $member,'tableContextColors' => config('SaproConf.tableContextColors'),]);
        }else
        {
            return view('errors.401');
        }

    }

    public function edit($memberId)
    {
        if((bool)Auth::User()->privileges()->get()[0]->updateMemberInfo)
        {
            $member = Member::findOrFail($memberId);
            return view('membership.updateMemberInfo')->with(['countries' => Country::pluck('name','code'), 'positions' => Position::pluck('title','id'), 'groups' => Group::pluck('name','id'), 'member' => $member,]);
        }else
        {
            return view('errors.401');
        }

    }

    public function destroy(Request $request, $memberId)
    {
        if((bool)Auth::User()->privileges()->get()[0]->removeMemberDetails)
        {
            $member = Member::findOrFail($memberId);
            $member->delete();
            $request->session()->flash("success","Member Details Removed!!");

//            ActivityLogger::create(['user_id' => Auth::User()->id, 'logMessage' =>"Removed Member with  id ".$member->id]);
            $this->dispatch(new \App\Jobs\ActivityLogger(Auth::User()->id,"Removed Member with  id ".$member->id));
            return redirect('/home');
        }else
        {
            return view('errors.401');

        }

    }

    public function update(Request $request, $memberId)
    {
        if((bool)Auth::User()->privileges()->get()[0]->updateMemberInfo)
        {
            $member = Member::findOrFail($memberId);
            $member->update($request->all());
            $member->groups()->sync($request->input('churchGroups'));
            $this->dispatch(new \App\Jobs\ActivityLogger(Auth::User()->id,"Update Member info ->  id ".$member->id));
//            ActivityLogger::create(['user_id' => Auth::User()->id, 'logMessage' =>"Update Member info ->  id ".$member->id]);
            $request->session()->flash("success","Member Details Updated");
            return redirect('/home');
        }else
        {
            return view('errors.401');
        }
    }

    public function memberExists($firstName, $lastName, $otherNames)
    {
        \Log::info("Checking if the following credentials already exist. $firstName, $lastName, $otherNames");
        return !(Member::where('firstName',trim($firstName))->where('lastName',trim($lastName))->where('otherNames',trim($otherNames))->get()->isEmpty());
    }
}
