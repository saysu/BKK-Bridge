<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use JD\Cloudder\Facades\Cloudder;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $user->load('events', 'participates.event', 'keeps.event');
      return view('users.index', ['user' => $user]);
      


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return redirect('users/'.$user->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $user->load('events', 'participates.event', 'keeps.event');

        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->age = $request->age;
        $user->introduction = $request->introduction;

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
                    $user->image = $logoUrl;
                 }
    
                }

        $user->save();
        return redirect()->route('users.index', ['user' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user->delete();
        return redirect('users');
    }
}
