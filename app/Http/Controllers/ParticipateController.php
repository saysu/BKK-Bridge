<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\ParticipateUser;

class ParticipateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $participate = new ParticipateUser;
        $participate ->event_id = $request->event_id;
        $participate ->user_id = Auth::id();
        $participate ->save();
 
        return redirect()->route('events.show', $participate ->event_id)->with('flash_message', '参加が完了しました');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($eventId, $participateId)
    {
        $participate = ParticipateUser::find($participateId);
        $participate->delete();
        return redirect()->route('events.show', $eventId)->with('flash_message', 'キャンセル致しました');


    }
}
