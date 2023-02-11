<?php

namespace App\Http\Controllers;

use App\Models\Reservation;

class QrcodeController extends Controller
{
    public function QrCode($user_id, $shop_id)
    {
        $reservation = Reservation::with('user', 'shop')
            ->where('user_id', $user_id)
            ->where('shop_id', $shop_id)
            ->first();
        return view('qrcode', ['reservation' => $reservation]);
    }
}
