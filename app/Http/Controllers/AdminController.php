<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shop;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use App\Mail\TestMail;
use App\Http\Requests\ShopRegisterRequest;

class AdminController extends Controller
{
    public function admin()
    {
        return view('admin.admin');
    }
    
    public function index()
    {
        $shop_owners= Shop::with('area', 'genre','user')->get();
        return view('admin.admin-index', ['shop_owners'=>$shop_owners]);
    }

    public function register()
    {
        return view('admin.admin-register');
    }

    public function create(ShopRegisterRequest $request)
    {
        $user = new User;
        $form = $this->unsetToken($request);
        $form['name'] = $request->shop_master_name;
        $form['email'] = $request->email;
        $form['password'] = Hash::make($request->password);
        $form['role']=$request->role;
        $user->fill($form)->save();

        $shop = new Shop;
        $form_shop['name'] = $request->name;
        $form_shop['area_id']="1";
        $form_shop['genre_id'] = "1";
        $form_shop['user_id'] = $user->id;
        $shop->fill($form_shop)->save();

        event(new Registered($user));

        Auth::login($user);

        return  view('shopRegisterThanks');

    }

    public function unsetToken($request)
    {
        $form = $request->all();
        unset($form['_token']);
        return $form;
    }

    public function send(Request $request)
    {
        $users=User::where('role','0')->get(); 
        $title = $request->title;
        $contents = $request->contents;
        foreach($users as $user){
            $name=$user->name;
            $email=$user->email;
            Mail::send(new Testmail($name,$email,$title,$contents));
        }
                return back();
    }
}

