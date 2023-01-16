<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Genre;
use App\Models\Area;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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
        if(!empty($shops))
        {
            $reservations=Reservation::where('shop_id',$shops->id)
            ->with('user')
            ->get();
            return view('ShopAdmin', ['areas' => $areas, 'genres' => $genres, 'users' => $user,'shops' => $shops,'reservations' => $reservations]);
        }
        else
        {
            return view('ShopAdmin', ['areas' => $areas, 'genres' => $genres, 'users' => $user, 'shops' => $shops]);
        }
    }

    public function create(Request $request)
    {
        $this->ImageUpload($request);
        $shop = New Shop;
        $user = Auth::user()->id;
        $form = $this->unsetToken($request);
        $form['user_id']=$user;
        $shop->fill($form)->save();
        return  back();
    }

    public function update(Request $request)
    {
        $this->ImageUpload($request);
        $user = Auth::user();
        $shop = Shop::find($request->id);
        if ($shop->user->id !== $user->id) return back();
        $form = $this->unsetToken($request);
        $form_user['name']=$request->manager_name;
        $form_user['email'] = $request->manager_email;
        $shop->fill($form)->save();
        $user->fill($form_user)->save();

        return back();
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
