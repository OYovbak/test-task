<?php

namespace App\Http\Controllers;

use App\Event;
use App\Participant;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        return response()->json(Event::all());
    }

    public function show($id){
        $event = Event::findOrFail($id);
        $participants = $event->participant()->get();
        $result = [
          'event' => $event,
          'participants' => $participants
        ];
        return response()->json($result);
    }

    public function addParticipant(Request $request){
        $event = Event::findOrFail($request->id);
        if(!$request->participant_id){
            return response()->json('Pls add id of participant (participant_id)');
        }
        $participant = Participant::where('id', '=', $request->participant_id)->first();
        if($participant === null){
            return response()->json('Pls try to put another participant id');
        }
        $event->participant()->attach($participant->id);
        return response()->json('Participant was add to event');
    }

    public function deleteParticipant(Request $request){
        $event = Event::findOrFail($request->id);
        if(!$request->participant_id){
            return response()->json('Pls add id of participant (participant_id)');
        }
        $participant = Participant::where('id', '=', $request->participant_id)->first();
        if($participant === null){
            return response()->json('Pls try to put another participant id');
        }
        $event->participant()->detach($participant->id);
        return response()->json('Participant was delete from event');
    }
}
