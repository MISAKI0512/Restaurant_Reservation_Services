<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;
use App\Models\Reservation;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Shop;


class UserController extends Controller
{
    public function mypage()
    {
        $user = Auth::user();
        $areas = Area::orderby('id','asc')->get();
        $genres = Genre::all();
        $shops = Shop::with('area','genre')->get();
        $reserves = Reservation::where('user_id',$user->id)->with('shop', 'course')->get();
        $likes = Like::with('shop')->where('user_id', $user->id)->get();
        return view('mypage', ['user' => $user, 'areas' => $areas, 'genres' => $genres, 'shops' => $shops, 'reserves' => $reserves, 'likes'=> $likes ]);
    }
}
