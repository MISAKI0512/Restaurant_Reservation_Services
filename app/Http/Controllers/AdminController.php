<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shop;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $shop_owners= Shop::with('area', 'genre','user')->get();
        return view('admin', ['shop_owners'=>$shop_owners]);
    }

    public function create(Request $request)
    {
        $user = new User;
        $form = $this->unsetToken($request);
        $form['name'] = $request->name;
        $form['email'] = $request->email;
        $form['password'] = Hash::make($request->password);
        $form['role']=$request->role;
        $user->fill($form)->save();
        return  back();
    }

    public function unsetToken($request)
    {
        $form = $request->all();
        unset($form['_token']);
        return $form;
    }
}