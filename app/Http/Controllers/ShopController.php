<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Shop;
use App\Models\Reservation;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        if
            (  //検索の入力確認
                isset($request->area)
                ||isset($request->genre)
                ||isset($request->text)
            )
            { //検索情報の取得
                $select_area = $request['area'];
                $select_genre = $request['genre'];
                $input_text = $request['text'];
                $shops = Shop::doSearch($select_area, $select_genre, $input_text);
                $user = Auth::user();
                $areas = Area::orderby('id','asc')->get();
                $genres = Genre::all();
            }    
        else //検索の入力がなければ、全店舗情報の取得
            {
                $user = Auth::user();
                $areas = Area::orderby('id','asc')->get();
                $genres = Genre::all();
                $shops = Shop::with('area','genre')->get();
            }

        return view('index', ['user' => $user, 'areas' => $areas, 'genres' => $genres, 'shops' => $shops]);
    }

    public function detail($shop_id)
    {
        $shops = Shop::where('id',$shop_id)->with('area', 'genre')->first();
        $reservation = Reservation::getReserveList($shop_id);
        $user_id = Auth::user()->id;
        $reserves = $reservation->where('user_id', '=', $user_id);
        return view('detail', ['shops' => $shops,'reserves'=> $reserves]);
    }
}
