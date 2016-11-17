<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $startDate = Carbon::now()->subDays(7);
        $stopDate = Carbon::now();
        $loopDate = clone $startDate;

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
        $this->dispatch(new \App\Jobs\ActivityLogger(\Auth::User()->id,"Viewed Membership report (dashboard)"));
        return view("reports.membership")->with(['category' => "membership", "startDate" => $startDate, "stopDate" => $stopDate,"graphData" => json_encode($query->pluck('count')), "dates" => json_encode($dates)]);

//        return view('home');
    }
}
