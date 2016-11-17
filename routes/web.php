<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});


Auth::routes();

Route::get('/home', 'HomeController@index');
Route::resource('membership','MembershipController');
Route::resource('accounts','AccountsController');
Route::resource('finances','FinancesController');
Route::resource('utilities','UtilitiesController');
Route::resource('reports','ReportsController');
Route::resource('notifications','NotificationsController');
Route::get('sessions',function (\Illuminate\Http\Request $request){
    if ($request->input('serviceId') != null && $request->input('serviceId') != "" )
        return App\Service::findOrFail($request->input('serviceId'))->sessions()->get()->toJson();
    else
        return null;
})->middleware('auth');

Route::get("/hi",function (){
//    return view('errors.401');
    return Auth::User()->privileges()->get()[0]->viewMembershipList;
});
Route::get('mail',function (){
    return view("mails.notifications")->with(["churchDetails" => App\Church::findOrFail(1), "member" => Auth::user()->name, "message" => "This is to inform you that our mid-week service has been moved from 6 pm to 9:45 pm.
     Also Note that they'll be a second collection to help build a school for some school. :)"]);
});
Route::get("voice",function (){
   \App\Http\Controllers\NotificationsController::sendVoice("Hello Eugene How was your day.",null,[233541859113]);
});



