<?php

namespace App\Http\Controllers;

use App\ActivityLogger;
use App\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {

        if ($request->input("startDate"))
            $startDate = Carbon::createFromFormat("Y-m-d",$request->input("startDate"));
        else
            $startDate = Carbon::now()->subDays(7);

        if ($request->input("stopDate"))
            $stopDate = Carbon::createFromFormat("Y-m-d",$request->input("stopDate"));
        else
            $stopDate = Carbon::now();


        if ($stopDate->lte($startDate))
        {
            \Log::error("Invalid Date Ranger");
            $request->session()->flash("error","Invalid Date Range. stop-date must be greater than start-date");
            return redirect()->back()->withInput();
        }else
        {
            if ($stopDate->gt(Carbon::now()))
                $stopDate = Carbon::now();

            \Log::debug("Date range is okay. For Graphing :)");
        }

        $loopDate = clone $startDate;
        switch ($request->input("category"))
        {
            case 'tithe':
                if((bool)Auth::User()->privileges()->get()[0]->viewTitheReport)
                {
                    $queries = array();
                    do
                    {
                        array_push($queries, \DB::table("tithes")->select(\DB::raw("IFNULL(SUM(amount),".((bool)config("SaproConf.useRandomsForReports") ? rand(0,4561) : 0).") AS amount, '".$loopDate->format("Y-m-d")."' AS date"))->whereRaw(\DB::raw("DATE(created_at) = DATE('".$loopDate."')")));
                        $loopDate->addDay();
                    }while ($loopDate->lte($stopDate));

                    $query = $queries[0];

                    for ($i = 1; $i < count($queries); $i++)
                        $query->unionAll($queries[$i]);

//                    ActivityLogger::create(['user_id' => Auth::User()->id, 'logMessage' => "Viewed '".$request->input("category")."' report"]);
                    $this->dispatch(new \App\Jobs\ActivityLogger(Auth::User()->id,"Viewed '".$request->input("category")."' report"));

                    return view("reports.tithe")->with(['category' => $request->input("category"), "startDate" => $startDate, "stopDate" => $stopDate,"graphData" => $query->get()]);

                }else
                {
                    return view('errors.401');
                }

                break;
            case 'activities':
                if((bool)Auth::User()->privileges()->get()[0]->viewActivityLogReport)
                {
//                    ActivityLogger::create(['user_id' => Auth::User()->id, 'logMessage' => "Viewed '".$request->input("category")."' report"]);
                    $this->dispatch(new \App\Jobs\ActivityLogger(Auth::User()->id,"Viewed '".$request->input("category")."' report"));
                    return view("reports.activities")->with(["tableContextColors" => config("SaproConf.tableContextColors"),'category' => $request->input("category"), "startDate" => $startDate, "stopDate" => $stopDate,
                        "activities" => \DB::table("activity_loggers")->orderBy("created_at",'desc')->paginate(50) ]);
                }
                else
                    return view('errors.401');
                break;
            case 'accounts':
                if((bool)Auth::User()->privileges()->get()[0]->viewAccountUsageReport)
                {
//                    ActivityLogger::create(['user_id' => Auth::User()->id, 'logMessage' => "Viewed '".$request->input("category")."' report"]);
                    $this->dispatch(new \App\Jobs\ActivityLogger(Auth::User()->id,"Viewed '".$request->input("category")."' report"));
                    return view("reports.accounts")->with(['category' => $request->input("category"), "startDate" => $startDate, "stopDate" => $stopDate,
                        "data" => json_encode(\DB::table("users")->select('name', 'numberOfLogIns')->get()->toArray()) ]);
                } else
                    return view('errors.401');
                break;
            case "welfare":
                if((bool)Auth::User()->privileges()->get()[0]->viewWelfareReport)
                {
                    $queries = array();
                    do
                    {
                        array_push($queries, \DB::table("welfares")->select(\DB::raw("IFNULL(SUM(amount),".((bool)config("SaproConf.useRandomsForReports") ? rand(0,4561) : 0).") AS amount, '".$loopDate->format("Y-m-d")."' AS date"))->whereRaw(\DB::raw("DATE(created_at) = DATE('".$loopDate."')")));
                        $loopDate->addDay();
                    }while ($loopDate->lte($stopDate));

                    $query = $queries[0];

                    for ($i = 1; $i < count($queries); $i++)
                        $query->union($queries[$i]);

                    $this->dispatch(new \App\Jobs\ActivityLogger(Auth::User()->id,"Viewed '".$request->input("category")."' report"));
//                    ActivityLogger::create(['user_id' => Auth::User()->id, 'logMessage' => "Viewed '".$request->input("category")."' report"]);
                    return view("reports.welfare")->with(['category' => $request->input("category"), "startDate" => $startDate, "stopDate" => $stopDate,"graphData" => $query->get()]);
                }else
                    return view('errors.401');

                break;
            case "donations":
                if((bool)Auth::User()->privileges()->get()[0]->viewDonationsReport)
                {
                    $dates = $queries = array();
                    do
                    {
                        array_push($dates,$loopDate->format("Y-m-d"));
                        array_push($queries, \DB::table("donations")->select(\DB::raw("IFNULL(SUM(amount),".((bool)config("SaproConf.useRandomsForReports") ? rand(0,4561) : 0).") AS amount"))->whereRaw(\DB::raw("DATE(created_at) = DATE('".$loopDate."')")));
                        $loopDate->addDay();
                    }while ($loopDate->lte($stopDate));

                    $query = $queries[0];

                    for ($i = 1; $i < count($queries); $i++)
                        $query->union($queries[$i]);

                    $this->dispatch(new \App\Jobs\ActivityLogger(Auth::User()->id,"Viewed '".$request->input("category")."' report"));
//                    ActivityLogger::create(['user_id' => Auth::User()->id, 'logMessage' => "Viewed '".$request->input("category")."' report"]);

                    return view("reports.donation")->with(['category' => $request->input("category"), "startDate" => $startDate, "stopDate" => $stopDate,"graphData" => json_encode($query->pluck('amount')), "dates" => json_encode($dates)]);

                }else
                    return view('errors.401');

                break;
            case "membership":
                if((bool)Auth::User()->privileges()->get()[0]->viewMembershipReport)
                {
                    $dates = $queries = array();
                    do
                    {
                        array_push($dates,$loopDate->format("Y-m-d"));
                        array_push($queries, \DB::table("members")->select(\DB::raw("IF(COUNT(id) = 0,".((bool)config("SaproConf.useRandomsForReports") ? rand(0,4561) : 0).", COUNT(id)) AS count"))->whereRaw(\DB::raw("DATE(created_at) <= DATE('".$loopDate."')")));
                        $loopDate->addDay();
                    }while ($loopDate->lte($stopDate));



                    $query = $queries[0];

                    for ($i = 1; $i < count($queries); $i++)
                        $query->unionAll($queries[$i]);

//                    \Log::debug($query->all());
//                    ActivityLogger::create(['user_id' => Auth::User()->id, 'logMessage' => "Viewed '".$request->input("category")."' report"]);
                    $this->dispatch(new \App\Jobs\ActivityLogger(Auth::User()->id,"Viewed '".$request->input("category")."' report"));
                    return view("reports.membership")->with(['category' => $request->input("category"), "startDate" => $startDate, "stopDate" => $stopDate,"graphData" => json_encode($query->pluck('count')), "dates" => json_encode($dates)]);

                }else
                    return view('errors.401');

                break;
            case "expenses":
                if((bool)Auth::User()->privileges()->get()[0]->viewExpensesReport)
                {
                    $dates = $queries = array();
                    do
                    {
                        array_push($dates,$loopDate->format("Y-m-d"));
                        array_push($queries, \DB::table("expenditures")->select(\DB::raw("IFNULL(SUM(amount),".((bool)config("SaproConf.useRandomsForReports") ? rand(0,4561) : 0).") AS amount"))->whereRaw(\DB::raw("DATE(created_at) = DATE('".$loopDate."')")));
                        $loopDate->addDay();
                    }while ($loopDate->lte($stopDate));

                    $query = $queries[0];

                    for ($i = 1; $i < count($queries); $i++)
                        $query->unionAll($queries[$i]);

//                    ActivityLogger::create(['user_id' => Auth::User()->id, 'logMessage' => "Viewed '".$request->input("category")."' report"]);
                    $this->dispatch(new \App\Jobs\ActivityLogger(Auth::User()->id,"Viewed '".$request->input("category")."' report"));
                    return view("reports.expenditure")->with(['category' => $request->input("category"), "startDate" => $startDate, "stopDate" => $stopDate,"graphData" => json_encode($query->pluck('amount')), "dates" => json_encode($dates)]);

                }else
                {
                    return view('errors.401');
                }

                break;
            case "offertories":
                if((bool)Auth::User()->privileges()->get()[0]->viewOffertoryReport)
                {
                    $dates = $queries = $graphData = $sessionsArray = array();

                    $services = Service::all();
                    foreach ($services as $service)
                    {
                        $sessions = $service->sessions()->get();
                        foreach ($sessions as $session)
                        {
                            $session_name = strtolower(str_replace("-","",str_replace(" ","_",$service->name."_".$session->name)));
                            array_push($sessionsArray,$session_name);
                            do
                            {
                                array_push($dates,$loopDate->format("Y-m-d"));
                                array_push($queries, \DB::table("offertories")->select(\DB::raw("IFNULL(SUM(amount),".((bool)config("SaproConf.useRandomsForReports") ? rand(0,4561) : 0).") AS $session_name"))->whereRaw(\DB::raw("DATE(created_at) = DATE('".$loopDate."')  AND service_id = ".$service->id." AND session_id = ".$session->id)));
                                $loopDate->addDay();
                            }while ($loopDate->lte($stopDate));
                            $loopDate = clone $startDate;

                            $query = $queries[0];
                            for ($i = 1; $i < count($queries); $i++)
                                $query->unionAll($queries[$i]);

                            array_push($graphData, array("name" => $session_name, "data" => $query->pluck($session_name)->toArray()));

                            $queries = array();
                        }

                    }
//                    ActivityLogger::create(['user_id' => Auth::User()->id, 'logMessage' => "Viewed '".$request->input("category")."' report"]);
                    $this->dispatch(new \App\Jobs\ActivityLogger(Auth::User()->id,"Viewed '".$request->input("category")."' report"));
                    return view("reports.offertory")->with(['category' => $request->input("category"), "startDate" => $startDate, "stopDate" => $stopDate,"graphData" => json_encode($graphData), "sessions" => json_encode($sessionsArray), "dates" => json_encode(array_unique($dates))]);

                }else
                {
                    return view('errors.401');
                }

                break;
            case "attendance":
                if((bool)Auth::User()->privileges()->get()[0]->viewAttendanceReport)
                {

                    $dates = $queries = $graphData = $sessionsArray = array();

                    $services = Service::all();
                    foreach ($services as $service)
                    {
                        $sessions = $service->sessions()->get();
                        foreach ($sessions as $session)
                        {
                            $session_name = strtolower(str_replace("-","",str_replace(" ","_",$service->name."_".$session->name)));
                            array_push($sessionsArray,$session_name);
                            do
                            {
                                array_push($dates,$loopDate->format("Y-m-d"));
                                array_push($queries, \DB::table("attendances")->select(\DB::raw("IFNULL(SUM(count),".((bool)config("SaproConf.useRandomsForReports") ? rand(0,4561) : 0).") AS $session_name"))->whereRaw(\DB::raw("DATE(created_at) = DATE('".$loopDate."')  AND service_id = ".$service->id." AND session_id = ".$session->id)));
                                $loopDate->addDay();
                            }while ($loopDate->lte($stopDate));
                            $loopDate = clone $startDate;

                            $query = $queries[0];
                            for ($i = 1; $i < count($queries); $i++)
                                $query->unionAll($queries[$i]);


                            array_push($graphData, array("name" => $session_name, "data" => array_map('intval',$query->pluck($session_name)->toArray())));
                            $queries = array();
                        }

                    }
//                    ActivityLogger::create(['user_id' => Auth::User()->id, 'logMessage' => "Viewed '".$request->input("category")."' report"]);
                    $this->dispatch(new \App\Jobs\ActivityLogger(Auth::User()->id,"Viewed '".$request->input("category")."' report"));
                    return view("reports.attendance")->with(['category' => $request->input("category"), "startDate" => $startDate, "stopDate" => $stopDate,"graphData" => json_encode($graphData), "sessions" => json_encode($sessionsArray), "dates" => json_encode(array_unique($dates))]);

                }else
                {
                    return view('errors.401');
                }

                break;
            case 'pledges':
                if((bool)Auth::User()->privileges()->get()[0]->viewPledgeReport)
                {
                    $redeemedQueries = array();
                    $nonRedeemedQueries = array();

                    do
                    {
                        array_push($nonRedeemedQueries, \DB::table("pledges")->select(\DB::raw("IFNULL(SUM(amount),".((bool)config("SaproConf.useRandomsForReports") ? rand(0,4561) : 0).") AS amount, '".$loopDate->format("Y-m-d")."' AS date"))->whereRaw(\DB::raw("DATE(updated_at) = DATE('".$loopDate."') AND redeemed = 0")));
                        array_push($redeemedQueries, \DB::table("pledges")->select(\DB::raw("IFNULL(SUM(amount),".((bool)config("SaproConf.useRandomsForReports") ? rand(0,4561) : 0).") AS amount, '".$loopDate->format("Y-m-d")."' AS date"))->whereRaw(\DB::raw("DATE(created_at) = DATE('".$loopDate."') AND redeemed = 1")));
                        $loopDate->addDay();
                    }while ($loopDate->lte($stopDate));

                    $finalRedeemedQuery = $redeemedQueries[0];

                    for ($i = 1; $i < count($redeemedQueries); $i++)
                        $finalRedeemedQuery->unionAll($redeemedQueries[$i]);

                    $finalNonRedeemedQuery = $nonRedeemedQueries[0];

                    for ($i = 1; $i < count($nonRedeemedQueries); $i++)
                        $finalNonRedeemedQuery->unionAll($nonRedeemedQueries[$i]);

//                    ActivityLogger::create(['user_id' => Auth::User()->id, 'logMessage' => "Viewed '".$request->input("category")."' report"]);
                    $this->dispatch(new \App\Jobs\ActivityLogger(Auth::User()->id,"Viewed '".$request->input("category")."' report"));
                    return view("reports.pledges")->with(['category' => $request->input("category"), "startDate" => $startDate, "stopDate" => $stopDate,"nonRedeemed" => $finalNonRedeemedQuery->get(),"redeemed" => $finalRedeemedQuery->get()]);

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
