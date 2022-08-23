<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Response;

class DashboardsController extends Controller
{
    public function index()
    {
        dd('111');
    }

    public function dashboard()
    {
        $client_id = Auth::user()->id;

        $user_type = Auth::user()->user_type;
        
        if ($user_type=='5') {
            return View("dashboard",[
                'newClients' => User::whereMonth("created_at",Carbon::today()->month)->where('account_type','<>','')->where('registration_status','1')->orderBy('created_at', 'DESC')->take(10)->get(),
                'events' => Event::where("client_id",$client_id)->orderBy('start', 'DESC')->take(10)->get(),
            ]); }
        else {
            return View("dashboard",[
                'newClients' => User::whereMonth("created_at",Carbon::today()->month)->where('account_type','<>','')->where('registration_status','1')->orderBy('created_at', 'DESC')->take(10)->get(),
                'events' => Event::where("title1","<>","")->orderBy('start', 'DESC')->take(10)->get(),
            ]); 
        }
    }

}