<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shop;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

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

    public function send(Request $request)
    {
        $users=User::where('role','0')->get(); //一般ユーザーのみ取得
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

