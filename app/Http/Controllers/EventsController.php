<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Calendar;
use App\Model\admin\Event;

class EventsController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth:admin')->except('show');
    }


    public function create()
    {
    	return view('admin.addevents');
    }

    public function addEvent(Request $request)
    {
    	$this->validate($request,[
            'event_name'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            ]);
    	$event = new Event;
    	$event->event_name = $request->event_name;
    	$event->start_date = $request->start_date;
    	$event->end_date = $request->end_date;
    	$event->save();
    	return back();

    }

    public function show(){
    	$events = Event::get();
    	$event_list = [];
    	foreach($events as $event){
    		$event_list[] = Calendar::event(
    		$event->event_name, true,
    		new \DateTime($event->start_date),
    		new \DateTime($event->end_date.'+1 day')
    			);
    		$calendar_details = Calendar::addEvents($event_list);
    		return view('user.events',compact('calendar_details'));
    	}
    }



}
