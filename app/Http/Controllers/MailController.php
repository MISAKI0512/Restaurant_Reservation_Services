<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Mail\TestMail;

class MailController extends Controller
{
    public function send(Request $request)
    {
        $name = 'テストユーザー';
        $email = 'test@example.com';

        Mail::send(new Testmail($name,$email));

        return back();
    }
}
