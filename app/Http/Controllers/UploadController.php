<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function index(){

        return view('index');
    }

    public function store(Request $request){

        dd($request->all());
    }
}
