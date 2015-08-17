<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\City;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $users =  Auth::user();

        $userInfo = $users->info;
        $city = City::lists('city', 'id');
     
        if (is_null($users)) {
            abort(404);
        }
        return view('user.index', compact('users', 'userInfo','city'));
    }

    public function showAnnouncements()
    {

        $users =  Auth::user();

        $userAnnouncements = $users->announcements()->get();
        $userAnnouncementsAmount = $userAnnouncements->count();
        //  dd($userArticles);
        if (is_null($users)) {
            abort(404);
        }
        return view('user.announcements', compact('users', 'userAnnouncements', 'userAnnouncementsAmount'));
    }

    public function update($id,Request $request)
    {
        $userInfo=UserInfo::findOrFail($id);

        dd($userInfo);

        $userInfo->update($request->all());

        return redirect('user');
    }



}
