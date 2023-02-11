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
use App\Models\Course;
use App\Http\Requests\ReviewRequest;

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
        $user_id = Auth::user()->id;
        //現在日時より後の予約のみ取得
        $reservations = Reservation::where('user_id', $user_id)
            ->where('shop_id',$shop_id)
            ->with('user', 'course')
            ->where('start_at', '>', date("Y-m-d H:i:s"))
            ->get();
        $reviews = ShopReview::getReviewList($shop_id);
        $courses = Course::where('shop_id',$shop_id)->get();
        return view('detail', ['shops' => $shops, 'reservations' => $reservations,'reviews' => $reviews,'courses'=>$courses]);
    }

    public function review(ReviewRequest $request)
    {
        $review= New ShopReview;
        $form = $this->unsetToken($request);
        $form['user_id'] = Auth::id();
        $form['shop_id'] = $request->shop_id;
        $form['star'] = $request->star;
        $form['comment'] = $request->comment;
        $review->fill($form)->save();
        return  back();
    }

    public function unsetToken($request)
    {
        $form = $request->all();
        unset($form['_token']);
        return $form;
    }

}
