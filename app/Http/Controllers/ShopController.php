<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Shop;
use App\Models\Reservation;
use App\Models\Like;
use App\Models\ShopReview;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        if (  //検索の入力確認
            isset($request->area)
            || isset($request->genre)
            || isset($request->text)
        ) { //検索情報の取得
            $select_area = $request['area'];
            $select_genre = $request['genre'];
            $input_text = $request['text'];
            $shops = Shop::doSearch($select_area, $select_genre, $input_text);
        } else //検索の入力がなければ、全店舗情報の取得
        {
            $shops = Shop::with('area', 'genre')->get();
        }
        $user = Auth::user();
        if($user!=null) //ログインしている場合
        {
            $likes = Like::where('user_id', $user->id)->pluck('shop_id');
            $areas = Area::orderby('id', 'asc')->get();
            $genres = Genre::all();
            return view('index', ['user' => $user, 'areas' => $areas, 'genres' => $genres, 'shops' => $shops, 'likes' => $likes]);
        }else //ログインしていない場合
        {
            $areas = Area::orderby('id', 'asc')->get();
            $genres = Genre::all();
            return view('index', [ 'areas' => $areas, 'genres' => $genres, 'shops' => $shops]);
        }

    }

    public function detail($shop_id)
    {
        $shops = Shop::where('id', $shop_id)->with('area', 'genre')->first();
        $reservation = Reservation::getReserveList($shop_id);
        $user_id = Auth::user()->id;
        $reserves = $reservation->where('user_id', '=', $user_id);
        $reviews = ShopReview::all();
        return view('detail', ['shops' => $shops, 'reserves' => $reserves,'reviews' => $reviews]);
    }

    public function review(Request $request)
    {
        dd($request);
        $review= New ShopReview;
        $form = $this->unsetToken($request);
        $form['user_id'] = Auth::id();
        $form['shop_id'] = $request->shop->id;
        $form['star'] = $request->star;
        $form['comment'] = $request->comment;
        $review->fill($form)->save();
        return  redirect(route('detail'));
    }
}
