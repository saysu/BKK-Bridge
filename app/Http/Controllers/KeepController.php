<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\KeepEvent;

class KeepController extends Controller
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
        $keep = new KeepEvent;
        $keep ->event_id = $request->event_id;
        $keep ->user_id = Auth::id();
        $keep ->save();
 
        return redirect()->route('events.show', $keep ->event_id)->with('flash_message', 'お気に入りに追加しました');
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
    public function destroy($eventId, $keepId)
    {
        $keep = keepEvent::find($keepId);
        $keep->delete();
        return redirect()->route('events.show', $eventId)->with('flash_message', 'お気に入りを取り消しました');
    }
}
