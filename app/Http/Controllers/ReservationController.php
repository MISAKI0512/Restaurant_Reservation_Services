<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function create(Request $request)
    {
        //$Datetime= New Datetime;
        //$datetime=$Datetime->format('Y-m-d H:i');
        //dd($datetime);
        $reserve = new Reservation;
        $start_at="$request->date"." "."$request->time";
        $form = $this->unsetToken($request);
        $form['user_id'] = Auth::id();
        $form['start_at']=$start_at;
        $reserve->fill($form)->save();
        return view('thanks');
    }

    public function delete(Request $request)
    {

    }

    public function unsetToken($request)
    {
        $form = $request->all();
        unset($form['_token']);
        return $form;
    }
}