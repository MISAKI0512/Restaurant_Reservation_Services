<?php

namespace App\Http\Controllers;

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
        //現在日時より後の予約を取得
        $reservations = Reservation::where('user_id', $user->id)
            ->with('user', 'course')
            ->where('start_at', '>', date("Y-m-d H:i:s"))
            ->get();
            
        //予約時間が過ぎた予約を取得
        $reserved = Reservation::where('user_id', $user->id)
            ->with('user', 'course','shop')
            ->where('start_at', '<', date("Y-m-d H:i:s"))
            ->get();
        $likes = Like::with('shop')->where('user_id', $user->id)->get();
        return view('mypage', ['user' => $user, 'areas' => $areas, 'genres' => $genres, 'shops' => $shops, 'reservations' => $reservations,'reserved' => $reserved, 'likes'=> $likes ]);
    }
}
