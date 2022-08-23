<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userType = Auth::user()->user_type;
        $id = Auth::user()->id;

        if ($userType=='5')    
            {
                $events = Event::where('client_id',$id) 
                        ->orderBy('start','ASC')->Paginate(5);
            }
        else
            {
                $events = Event::orderBy('start','ASC')->Paginate(5);
            }    

        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = User::where('account_type','<>','')
                       ->where('user_type','5') 
                       ->where('registration_status','1')
                       ->where('is_active','1')
                       ->orderBy('client_name')
                       ->get();

        return view('events.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventRequest $request)
    {
        $data = $request->validated();

        $data['start'] = substr($data['start'],6,4)."-".substr($data['start'],0,2)."-".substr($data['start'],3,2);        
        $data['end'] = substr($data['end'],6,4)."-".substr($data['end'],0,2)."-".substr($data['end'],3,2);        

        $event = Event::create($data);

        return back()->with('message', 'Event Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $clients = User::where('account_type','<>','')
                       ->where('registration_status','1')
                       ->where('is_active','1')
                       ->orderBy('client_name')
                       ->get();

        return view('events.edit', compact('event','clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        $data = $request->validated();
        
        $data['start'] = substr($data['start'],6,4)."-".substr($data['start'],0,2)."-".substr($data['start'],3,2);        
        $data['end'] = substr($data['end'],6,4)."-".substr($data['end'],0,2)."-".substr($data['end'],3,2);        
        
        $result = $event->update($data);
        
        //$user->roles()->sync($request->user_type);

        //return redirect()->route('users.index');
        return back()->with('message', 'Event Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index');
    }

    public function showCalendar()
    {
        return view('events.calendar');
    }
}
