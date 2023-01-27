<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class ChargeController extends Controller
{
    /*単発決済用のコード*/
    public function charge(Request $request)
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));

            $customer = Customer::create(array(
                'email' => $request->stripeEmail,
                'source' => $request->stripeToken
            ));

            $charge = Charge::create(array(
                'customer' => $customer->id,
                'amount' => 1000,
                'currency' => 'jpy'
            ));

            $reserve = new Reservation;
            $start_at = "$request->date" . " " . "$request->time";
            $form = $this->unsetToken($request);
            $form['user_id'] = Auth::id();
            $form['start_at'] = $start_at;
            $reserve->fill($form)->save();
            return view('thanks');

        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function unsetToken($request)
    {
        $form = $request->all();
        unset($form['_token']);
        return $form;
    }
}
