<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller {

    public function index() {
        $events = \App\Event::where('date', '>=', \Carbon\Carbon::now())->paginate(5);
        return view('events.index', compact('events'));
    }

    public function myindex() {

        $events = \Auth::user()->myEvents()->paginate(5);
        return view('events.index', compact('events'));
    }

    public function attending() {

        $events = \Auth::user()->attending()->paginate(5);
        return view('events.index', compact('events'));
    }

    public function pending() {

        $events = \Auth::user()->pending()->paginate(5);
        return view('events.index', compact('events'));
    }

    public function accept($id, $member_id) {
        $event = \App\Event::find($id);
        $member = \App\EventMember::find($member_id);
        if ($event AND $member) {
            $member->state = 1;
            $member->save();

            $member->user->notify(new \App\Notifications\Accepted(['event_id' => $event->id]));
            return back()->with('success', 'Yay! Hai accettato con successo la richiesta :)');
        }
    }

    public function reject($id, $member_id) {
        $event = \App\Event::find($id);
        $member = \App\EventMember::find($member_id);
        if ($event AND $member) {
            $member->state = 2;
            $member->save();

            $member->user->notify(new \App\Notifications\Rejected(['event_id' => $event->id]));
            return back()->with('success', 'Ops! Hai rifiutato la richiesta :(');
        }
    }

    public function invite($id) {
        $event = \App\Event::find($id);
        if ($event) {
            $members = \App\User::whereDoesntHave("events", function($q) use($event) {
                        $q->where('event_id', $event->id);
                    })->where('id', '<>', \Auth::user()->id)->paginate(9);
            return view('events.invite_members', compact('event', 'members'));
        }
    }

    public function invite_member($id, $member_id) {
        $event = \App\Event::find($id);
        $member = \App\User::find($member_id);
        if ($event AND $member) {

            $join = new \App\EventMember;
            $join->user_id = $member->id;
            $join->event_id = $event->id;
            $join->type = 2;
            $join->save();

            $member->notify(new \App\Notifications\Invite(['event_id' => $event->id, 'user_id' => \Auth::user()->id]));

            return back()->with('success', 'Perfetto! Il tuo invito è stato inviato');
        }
    }

    public function join($id) {

        $event = \App\Event::find($id);

        if ($event) {

            $join = new \App\EventMember;
            $join->user_id = \Auth::user()->id;
            $join->event_id = $event->id;
            $join->type = 1;
            $join->save();

            $event->user->notify(new \App\Notifications\Join(['event_id' => $event->id, 'user_id' => \Auth::user()->id]));

            return back()->with('success', 'Swoosh! La tua richiesta è stata inviata');
        }
    }

    public function show($id) {

        $event = \App\Event::find($id);
        return view('events.show', compact('event'));
    }

    public function edit($id) {

        $event = \App\Event::find($id);
        if (\Auth::user()->myEvents->where('id', $id)->first() AND $event) {
            $jobs = \App\Job::all();
            return view('events.edit', compact('event', 'jobs'));
        }
    }

    public function create() {

        $jobs = \App\Job::all();
        return view('events.create', compact('jobs'));
    }

    public function store_message(Request $request, $id) {

        $validator = \Validator::make($request->all(), ['message' => 'required',]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }


        $item = new \App\EventMessage;
        $item->user_id = \Auth::user()->id;
        $item->event_id = $id;
        $item->message = $request->message;
        $item->save();

        return back()->with('success', 'Il messaggio è stato postato sulla bacheca!');
    }

    public function store(Request $request) {

        $validator = \Validator::make($request->all(), [
                    // 'job' => 'required|integer',
                    'members_total' => 'required|integer',
                    'members_confirmed' => 'required|integer',
                    'local' => 'required',
                    'date' => 'required|date',
                    'time_start' => 'required|date_format:H:i',
                    'time_end' => 'required|date_format:H:i',
                    'cost' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $item = new \App\Event;
        $item->user_id = \Auth::user()->id;
        $item->job_id = $request->job;
        $item->num_members = $request->members_total;
        $item->num_members_confirmed = $request->members_confirmed;
        $item->local = $request->local;
        $item->date = \Carbon\Carbon::parse($request->date);
        $item->time_start = $request->time_start;
        $item->time_end = $request->time_end;
        $item->cost = $request->cost;
        if ($request->title) {
            $item->title = $request->title;
        }
        if ($request->description) {
            $item->description = $request->description;
        }
        $item->save();
        return redirect('/events/' . $item->id)->with('success', 'Evento pubblicato correttamente!');
    }

    public function update(Request $request, $id) {

        $validator = \Validator::make($request->all(), [
                    'job' => 'required|integer',
                    'members_total' => 'required|integer',
                    'members_confirmed' => 'required|integer',
                    'local' => 'required',
                    'date' => 'required|date',
                    'time_start' => 'required|date_format:H:i',
                    'time_end' => 'required|date_format:H:i',
                    'cost' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $item = \App\Event::find($id);

        $item->job_id = $request->job;
        $item->num_members = $request->members_total;
        $item->num_members_confirmed = $request->members_confirmed;
        $item->local = $request->local;
        $item->date = \Carbon\Carbon::parse($request->date);
        $item->time_start = $request->time_start;
        $item->time_end = $request->time_end;
        $item->cost = $request->cost;
        if ($request->title) {
            $item->title = $request->title;
        }
        if ($request->description) {
            $item->description = $request->description;
        }
        $item->save();
        return redirect('/events/' . $item->id)->with('success', 'Evento aggiornato correttamente!');
    }

}
