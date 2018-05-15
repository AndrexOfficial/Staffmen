<?php

namespace App\Http\Controllers\Event;

use App\Models\Event\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $today = Carbon::now()->format('Y-m-d');
        $upcomingEvents = Event::where('end_date', '>', $today)
            ->orderBy('start_date', 'desc')
            ->get();
        $ongoingEvents = Event::where('end_date', '=', $today)
            ->orderBy('start_date', 'desc')
            ->limit(4)
            ->get();
        $pastEvents = Event::where('end_date', '<', $today)
            ->orderBy('start_date', 'desc')
            ->limit(3)
            ->get();

        return view('events.events-list')
            ->with('upcomingEvents', $upcomingEvents)
            ->with('ongoingEvents', $ongoingEvents)
            ->with('pastEvents', $pastEvents);
    }
    public function view(Event $event)
    {
        return view('events.event-view')->with('event', $event);
    }
    /*
    public function edit(Event $event)
    {
        return view('events.event-edit')->with('event', $event);
    }
    */
    public function add()
    {
        return view('events.event-add');
    }
    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'title' => 'required',
           'description' => 'required',
           'address' => 'required',
           'start_date' => 'required',
           'end_date' => 'required',
           'lat' => 'required',
           'lng' => 'required',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        Event::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'address' => $request->input('address'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'lat' => $request->input('lat'),
            'long' => $request->input('lng'),
            'user_id' => $request->user()->id
        ]);

        return redirect()->intended('events');
    }
}
