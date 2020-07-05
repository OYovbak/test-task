<?php

namespace App\Http\Controllers;

use App\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ParticipantController extends Controller
{
    public function index(){
        $participant = Participant::all();
        return response()->json($participant);
    }
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email|unique:participants'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        $data = $request->all();
        $participant = Participant::create($data);
        return response()->json($participant, 201);
    }
    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'nullable',
            'surname' => 'nullable',
            'email' => 'nullable|sometimes|email|unique:participants',
            'id' => 'required',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        $participant = Participant::findOrFail($request->id);
        if($request->name && $request->name!=$participant->name) $participant->name=$request->name;
        if($request->surname && $request->surname!=$participant->surname) $participant->surname=$request->surname;
        if($request->email && $request->email!=$participant->email) $participant->email=$request->email;
        $participant->save();
        return response()->json($participant, 200);
    }
    public function delete(Request $request){
        if(!$request->id){
            return response()->json('Pls add id to delete');
        }
        $participant = Participant::where('id', '=', $request->id)->first();
        if($participant === null){
            return response()->json('Pls try to put another id');
        }
        $participant->delete();
        return response()->json(null, 204);
    }
}
