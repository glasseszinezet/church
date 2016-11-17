<?php

namespace App\Http\Controllers;

use App\ActivityLogger;
use App\Currency;
use App\Donation;
use App\Expenditure;
use App\Member;
use App\Offertory;
use App\Pledge;
use App\Service;
use App\Tithe;
use App\Welfare;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FinancesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if((bool)Auth::User()->privileges()->get()[0]->recordPledges)
            return view('finances.pledgesList')->with(['pledges' => Pledge::paginate(20), 'tableContextClasses' => config("SaproConf.tableContextColors")]);
        else
            return view('errors.401');
    }

    public function create(Request $request)
    {
        $currencyInitialiseForGhana = 85;
        $countries = Currency::select(DB::raw("CONCAT(name,' (',ISO_4217_CODE,')') AS CURRENCY, id"))->pluck('CURRENCY', 'id');
        $memberList = Member::select(DB::raw("CONCAT(firstName,' ',otherNames,' ',lastName) AS fullName, id"))->pluck('fullName', 'id');


        switch ($request->input('type'))
        {
            case 'tithe':
                if((bool)Auth::User()->privileges()->get()[0]->recordTithe)
                 return view('finances.recordTithe')->with(
                    [
                        'currencies' => $countries,
                        'members' => $memberList,
                        'initialise' => $currencyInitialiseForGhana
                    ]);
                else
                    return view('errors.401');
            break;
            case 'welfare':
                if((bool)Auth::User()->privileges()->get()[0]->recordWelfare)
                    return view('finances.recordWelfare')->with(
                    [
                        'currencies' => $countries,
                        'members' => $memberList,
                        'initialise' => $currencyInitialiseForGhana
                    ]);
                else
                    return view('errors.401');
            break;
            case 'pledges':
                if((bool)Auth::User()->privileges()->get()[0]->recordPledges)
                    return view('finances.recordPledge')->with(
                    [
                        'currencies' => $countries,
                        'members' => $memberList,
                        'initialise' => $currencyInitialiseForGhana
                    ]);
                else
                    return view('errors.401');
            break;
            case 'offertory':
                if((bool)Auth::User()->privileges()->get()[0]->recordOffertory)
                    return view('finances.recordOffertory')->with(
                    [
                        'currencies' => $countries,
                        'services' => Service::pluck('name','id'),
                        'initialise' => $currencyInitialiseForGhana
                    ]);
                else
                    return view('errors.401');
            break;
            case 'donations':
                if((bool)Auth::User()->privileges()->get()[0]->recordDonations)
                    return view('finances.recordDonation')->with(
                    [
                        'currencies' => $countries,
                        'members' => $memberList,
                        'initialise' => $currencyInitialiseForGhana
                    ]);
                else
                    return view('errors.401');
            break;

            case 'expenditure':
                if((bool)Auth::User()->privileges()->get()[0]->recordExpenditure)
                 return view('finances.recordExpenditure')->with(
                    [
                        'currencies' => $countries,
//                        'members' => $memberList,
                        'initialise' => $currencyInitialiseForGhana
                    ]);
                else
                    return view('errors.401');
            break;


        }
        return redirect('/home');
    }

    public function store(Request $request)
    {
        $request['user_id'] = Auth::User()->id;
        switch ($request->input('type'))
        {

            case 'tithe':
                if((bool)Auth::User()->privileges()->get()[0]->recordTithe)
                {

                    $tithe = Tithe::create($request->all());
                    $request->session()->flash("success","Tithe Recorded Successfully!!");
//                    ActivityLogger::create(['user_id' => Auth::User()->id, 'logMessage' =>"Recorded tithe with id : ".$tithe->id]);
                    $this->dispatch(new \App\Jobs\ActivityLogger(Auth::User()->id,"Recorded tithe with id : ".$tithe->id));
                }
                else
                {
                    return view('errors.401');
                }
                break;
            case 'welfare':
                if((bool)Auth::User()->privileges()->get()[0]->sendSMSNotifications)
                {
                  $welfare =  Welfare::create($request->all());
                    $request->session()->flash("success","Welfare Recorded Successfully!!");
//                    ActivityLogger::create(['user_id' => Auth::User()->id, 'logMessage' =>"Recorded Welfare with id ".$welfare->id]);
                    $this->dispatch(new \App\Jobs\ActivityLogger(Auth::User()->id,"Recorded Welfare with id ".$welfare->id));
                }
                else
                {
                    return view('errors.401');
                }
                break;
            case 'pledge':
                if((bool)Auth::User()->privileges()->get()[0]->sendSMSNotifications)
                {
                    $pledge = Pledge::create($request->all());
                    $request->session()->flash("success","Pledge Recorded Successfully!!");
//                    ActivityLogger::create(['user_id' => Auth::User()->id, 'logMessage' =>"Recorded Pledge with id : ".$pledge->id]);
                    $this->dispatch(new \App\Jobs\ActivityLogger(Auth::User()->id,"Recorded Pledge with id : ".$pledge->id));
                }
                else
                {
                    return view('errors.401');
                }
                break;
            case 'Offertory':
                if((bool)Auth::User()->privileges()->get()[0]->sendSMSNotifications)
                {
                    $offertory = Offertory::create($request->all());
                    $request->session()->flash("success","Offertory Recorded Successfully!!");
//                    ActivityLogger::create(['user_id' => Auth::User()->id, 'logMessage' =>"Added Offertory with id: ".$offertory->id]);
                    $this->dispatch(new \App\Jobs\ActivityLogger(Auth::User()->id,"Added Offertory with id: ".$offertory->id));
                }
                else
                {
                    return view('errors.401');
                }


                break;
            case 'donation':
                if((bool)Auth::User()->privileges()->get()[0]->sendSMSNotifications)
                {

                    $donation = Donation::create($request->all());
                    $request->session()->flash("success","Donation Recorded Successfully!!");
//                    ActivityLogger::create(['user_id' => Auth::User()->id, 'logMessage' =>"Recorded donation with id : ".$donation->id]);
                    $this->dispatch(new \App\Jobs\ActivityLogger(Auth::User()->id,"Recorded donation with id : ".$donation->id));
                }
                else
                {
                    return view('errors.401');
                }

                break;
            case 'expenditure':
                if((bool)Auth::User()->privileges()->get()[0]->sendSMSNotifications)
                {
                    $expenditure = Expenditure::create($request->all());
                    $request->session()->flash("success","Expenditure Recorded Successfully!!");
//                    ActivityLogger::create(['user_id' => Auth::User()->id, 'logMessage' =>"Added Expenditure with Id: ".$expenditure->id]);
                    $this->dispatch(new \App\Jobs\ActivityLogger(Auth::User()->id,"Added Expenditure with Id: ".$expenditure->id));
                }
                else
                {
                    return view('errors.401');
                }

                break;
            default:
                $request->session()->flash("error","Resources Not Found...!!!");
        }
        return redirect("/home");
    }

    public function update(Request $request, $pledge_id)
    {
        if((bool)Auth::User()->privileges()->get()[0]->redeemPledges)
        {
            $pledge = Pledge::findOrFail($pledge_id);
            if ($pledge->redeemed)
            {
                $request->session()->flash("error","Pledge has already been redeemed.!!!");
                return redirect("/finances");
            }else
            {
                $pledge->redeemed = true;
                $pledge->save();
//                ActivityLogger::create(['user_id' => Auth::User()->id, 'logMessage' =>"Redeemed Pledge with id:  ".$pledge->id]);
                $this->dispatch(new \App\Jobs\ActivityLogger(Auth::User()->id,"Redeemed Pledge with id:  ".$pledge->id));
                $request->session()->flash("success","Pledge has Redeemed successfully. !!!");
                return redirect()->back();
            }
        }else
        {
            return view('errors.401');
        }

    }

    public function show($member_id)
    {
        if((bool)Auth::User()->privileges()->get()[0]->viewMemberPaymentHistory)
        {
            $member = Member::findOrFail($member_id);
//            ActivityLogger::create(['user_id' => Auth::User()->id, 'logMessage' =>"Viewed Payment history for member with id ".$member->id]);
            $this->dispatch(new \App\Jobs\ActivityLogger(Auth::User()->id,"Viewed Payment history for member with id ".$member->id));
            return view("finances.memberPaymentHistory")
                ->with([
                    "member" => $member,
                    'tableContextClasses' => config("SaproConf.tableContextColors")
                ]);
        }else
        {
            return view('errors.401');
        }

    }

}
