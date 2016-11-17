<?php

namespace App\Http\Controllers;

use App\ActivityLogger;
use App\Privilege;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AccountsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if((bool)Auth::User()->privileges()->get()[0]->viewMembershipList)
        {
//            ActivityLogger::create(['user_id' => Auth::User()->id, 'logMessage' => "Viewed User's list"]);
            $this->dispatch(new \App\Jobs\ActivityLogger(Auth::User()->id,"Viewed User's list"));
            return view('auth.userList')->with(['iterator' => 0 ,'users' => User::paginate(20), 'tableContextClasses' => config("SaproConf.tableContextColors")]);
        }
        else
        {
            return view('errors.401');
        }
    }

    public function destroy(Request $request, $userId)
    {
        if((bool)Auth::User()->privileges()->get()[0]->viewMembershipList)
        {
            User::findOrFail($userId)->delete();
//            ActivityLogger::create(['user_id' => Auth::User()->id, 'logMessage' => "Removed User with id ".$userId]);
            $this->dispatch(new \App\Jobs\ActivityLogger(Auth::User()->id,"Removed User with id ".$userId));
            $request->session()->flash("success","User Details Removed!!");
            return redirect('/accounts');
        }else
        {
            return view('errors.401');
        }

    }

    public function create(Request $request)
    {
        if ($request->has("category") && $request->input("category") == "account")
        {
            if((bool)Auth::User()->privileges()->get()[0]->addAccount)
            {
                return view('auth.register');
            }else
            {
                return view('errors.401');
            }
        }
        else if ($request->has("category") && $request->input("category") == "privileges")
        {
            if((bool)Auth::User()->privileges()->get()[0]->editAccountPrivileges)
            {
                return view("auth.updateUserPrivileges")->with(['privileges' => (object)User::findOrFail($request->input('user'))->privileges()->get()]);
            }else
            {
                return view('errors.401');
            }

        }
        else
        {
            return redirect("/home");
        }

    }

    public function store(Request $request)
    {
        if((bool)Auth::User()->privileges()->get()[0]->addAccount)
        {
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
            ]);
            Privilege::create(['user_id' => $user->id]);
//            ActivityLogger::create(['user_id' => Auth::User()->id, 'logMessage' => "Added New User Account with Account ".$user->id." - user privileges entry created as well"]);
            $this->dispatch(new \App\Jobs\ActivityLogger(Auth::User()->id,"Added New User Account with Account ".$user->id." - user privileges entry created as well"));
            $request->session()->flash('success',"User Added Successfully");
            return redirect('/accounts');
        }else
        {
            return view('errors.401');
        }
    }


    public function show()
    {
        if((bool)Auth::User()->privileges()->get()[0]->viewUsersList)
        {

            return view('auth.updateCredentials')->with(['user' => Auth::User() ]);
        }
        else
        {
            return view('errors.401');
        }

    }

    public function update(Request $request, $userId)
    {
        if ($request->has('category') && $request->input('category') == "privilege")
        {
            if((bool)Auth::User()->privileges()->get()[0]->editAccountPrivileges)
            {
                $requestFields = $request->all();
                User::findOrFail($request->input('user_id'))->privileges()->update(array_except(array_except(array_except($requestFields,"_method"),"_token"),"category"));
//                ActivityLogger::create(['user_id' => Auth::User()->id, 'logMessage' => "Updated Privileges for user with id ".$request->input('user_id')]);
                $this->dispatch(new \App\Jobs\ActivityLogger(Auth::User()->id,"Updated Privileges for user with id ".$request->input('user_id')));
                $request->session()->flash("success","User Privileges Updated Successfully..");
                return redirect()->back();
            }else
            {
                return view('errors.401');
            }
        }else
        {
            $user = User::findOrFail($userId);
            if (empty($request->input('password')) || empty($request->input('password-confirm')) || (trim($request->input('password')) !== trim($request->input('password-confirm'))))
            {
                $request->session()->flash("error","Invalid Password Or Password Confirm Value");
                return redirect()->back()->withInput();
            }else
            {
                $user->update([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'password' => bcrypt($request->input('password'))
                ]);
//                ActivityLogger::create(['user_id' => Auth::User()->id, 'logMessage' => "Update Personal Account Details "]);
                $this->dispatch(new \App\Jobs\ActivityLogger(Auth::User()->id,"Update Personal Account Details "));
                $request->session()->flash("success","User Credentials Updated Successfully!!!");
                return redirect("/accounts");
            }
        }
    }
}
