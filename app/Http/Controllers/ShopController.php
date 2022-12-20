<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Shop;

class ShopController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $areas = Area::orderby('id','asc')->get();
        $genres = Genre::all();
        $shops = Shop::with('area','genre')->get();
        return view('index', ['user' => $user, 'areas' => $areas, 'genres' => $genres, 'shops' => $shops]);
    }

    public function detail()
    {
        return view('detail');
    }
}
