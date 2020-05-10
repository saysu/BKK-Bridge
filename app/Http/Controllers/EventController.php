<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use App\Event;
use App\Category;
use JD\Cloudder\Facades\Cloudder;
use Auth;
use App\ParticipateUser;
use App\KeepEvent;
use Carbon\Carbon;


class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

 
    public function index(Request $request)
    {   
        $keyword = $request->input('keyword');
        if(!empty($keyword)){
            $events = Event::orderBy('date','asc')->where('date','>',Carbon::yesterday())->where('title', 'like', '%'.$keyword.'%')->orWhere('content','like', '%'.$keyword.'%')->orWhere('place','like', '%'.$keyword.'%')->paginate(5);
            return view('events.index', [
                'events' => $events,
            ]);
        }

        $date = $request->input('date');
        
        if(!empty($date)){
            
            $events = Event::orderBy('date','asc')->whereDate('date', $date)->paginate(5);
            $events->load('category', 'user');
        } else {
            $events = Event::orderBy('date','asc')->where('date','>',Carbon::yesterday())->paginate(5);
        }

            return view('events.index', [
                'events' => $events,
            ]);
        // dd($request);

        // $q = \Request::query();

        // if(isset($q['category_id'])) {
        //     $events = Event::latest()->where('category_id', $q['category_id'])->paginate(5);
        //     $events->load('category', 'user');

        //     return view('events.index', [
        //         'events' => $events,
        //     ]);
        // } else {
        //     $events = Event::latest()->paginate(5);
        //     $events->load('category', 'user');

        //     return view('events.index', [
        //         'events' => $events,
        //     ]);
        // }
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('events.create',[
            'categories' => $categories,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {

        if($request->file('image')->isValid()) {
        if ($logo = $request->file('image')) {
                $image_name = $logo->getRealPath();
                // Cloudinaryへアップロード
                Cloudder::upload($image_name, null);
                list($width, $height) = getimagesize($image_name);
                // 直前にアップロードした画像のユニークIDを取得します。
                $publicId = Cloudder::getPublicId();
                // URLを生成します
                $logoUrl = Cloudder::show($publicId, [
                    'width'     => $width,
                    'height'    => $height
                ]);
             }
            $event = new Event;
            $event->user_id = $request->user_id;
            $event->category_id = $request->category_id;
            $event->content = $request->content;
            $event->title = $request->title;
            $event->place = $request->place;
            $event->date = $request->date;

            // $filename = $request->file('image')->store('public/image');
            $event->image = $logoUrl;

            $event->save();
        }
       
       return redirect('/events');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $event->load('category', 'user', 'comments.user', 'participates.user', 'keeps');
        $participate = ParticipateUser::where('event_id', $event->id)->where('user_id', Auth::id())->first();
        $keep = KeepEvent::where('event_id', $event->id)->where('user_id', Auth::id())->first();


        return view('events.show',[
            'event' => $event,
            'participate' => $participate,
            'keep' => $keep,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $event = Event::find($request->id);
        if($event->user_id !== Auth::id()) {
            return abort(403);
        }
        return view('events.edit', ['event' => $event]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
     
        $event = Event::find($request->id);
        $event->title = $request->title;
        $event->content = $request->content;
        $event->title = $request->title;
        $event->place = $request->place;
        $event->date = $request->date;

        if ($logo = $request->file('image')) {
        if($request->file('image')->isValid()) {
                $image_name = $logo->getRealPath();
                // Cloudinaryへアップロード
                Cloudder::upload($image_name, null);
                list($width, $height) = getimagesize($image_name);
                // 直前にアップロードした画像のユニークIDを取得します。
                $publicId = Cloudder::getPublicId();
                // URLを生成します
                $logoUrl = Cloudder::show($publicId, [
                    'width'     => $width,
                    'height'    => $height
                ]);
                $event->image = $logoUrl;
             }

            }

            $event->save();
        return redirect('/events');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete(Request $request)
{
    $event = Event::find($request->id);
    
    if($event->user_id !== Auth::id()) {
        return abort(403);
    }
    return view('events.delete', ['event' => $event]); 
}

public function remove(Request $request)
{
    $event = Event::find($request->id);
    $event->delete();
    return redirect('/');
}
}
