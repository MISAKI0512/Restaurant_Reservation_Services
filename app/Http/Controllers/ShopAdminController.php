<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Genre;
use App\Models\Area;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ShopAdminRequest;

class ShopAdminController extends Controller
{
    public function index()
    {
        $areas = Area::orderby('id', 'asc')->get();
        $genres = Genre::all();
        $user=Auth::user()->id;
        $shops=Shop::where('user_id',$user)
            ->with('area','genre','user')
            ->first();
        return view('shop_admin.ShopAdmin', ['areas' => $areas, 'genres' => $genres, 'users' => $user, 'shops' => $shops]);
    }

    public function status()
    {
        $user=Auth::user()->id;
        $shops = Shop::where('user_id', $user)
        ->first();
        //現在日時より後の予約を取得
        $reservations = Reservation::where('shop_id', $shops->id)
            ->with('user', 'course')
            ->where('start_at','>', date("Y-m-d H:i:s"))
            ->get();
        //予約時間が過ぎた予約を取得
        $reserved = Reservation::where('shop_id', $shops->id)
            ->with('user', 'course')
            ->where('start_at', '<', date("Y-m-d H:i:s"))
            ->get();        
        return view('shop_admin.ShopAdminStatus', ['reservations' => $reservations,'reserved'=> $reserved  ]);
    }


    public function update(shopAdminRequest $request)
    {
        if($request->has('image_url'))
            $this->ImageUpload($request);
        $user = Auth::user();
        $shop = Shop::find($request->id);
        if ($shop->user->id !== $user->id) return back();
        $form = $this->unsetToken($request);
        $form_user['name']=$request->shop_master_name;
        $shop->fill($form)->save();
        $user->fill($form_user)->save();
        return redirect('shop_admin');
    }


    public function unsetToken($request)
    {
        $form = $request->all();
        unset($form['_token']);
        return $form;
    }

    public function ImageUpload(Request $request)
    {
        $file_name = $request->name .= ".jpg";
        $request->image_url->storeAs('public/shop_image', $file_name);
    }


}
