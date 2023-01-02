<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function create($id)
    {
        $likes = new Like;
        $form['user_id'] = Auth::id();
        $form['shop_id'] = $id;
        $likes->fill($form)->save();
        return back();
    }


    public function delete($id)
    {
        $user = Auth::user();
        $like = Like::where('Shop_id',$id)
                ->where('user_id','=',$user->id)->first();
        $like->delete();
        return back();
    }
}
