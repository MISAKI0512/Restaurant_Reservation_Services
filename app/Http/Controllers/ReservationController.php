<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReservationRequest;

class ReservationController extends Controller
{
    public function create(ReservationRequest $request)
    {
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
        $user = Auth::user();
        $reserve = Reservation::find($request->id);
        if ($reserve->user_id !== $user->id) return back();
        $reserve->delete();
        return back();
    }

    public function unsetToken($request)
    {
        $form = $request->all();
        unset($form['_token']);
        return $form;
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $reserve = Reservation::find($request->id);
        $start_at = "$request->date" . " " . "$request->time";
        if ($reserve->user_id !== $user->id) return back();
        $form = $this->unsetToken($request);
        $form['start_at'] = $start_at;
        $reserve->fill($form)->save();
        return back();
    }

    public function QrCode($user_id,$shop_id)
    {
        $reservation = Reservation::with('user', 'shop')
                                    ->where('user_id',$user_id)
                                    ->where('shop_id',$shop_id)
                                    ->first();
        return view('qrcode',['reservation'=>$reservation]);
    }
}