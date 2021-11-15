<?php

namespace App\Http\Controllers;

use App\Mail\SendLoginMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMailToNewUser extends Controller
{
    public function sent(Request $request)
    {
        $params = $request->all();
        Mail::to($params['email'])
            ->send(new SendLoginMail($params));
        return view ('sentRegistry');
    }
}
