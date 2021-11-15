<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\RegisterMail;
use Illuminate\Support\Facades\Mail;

class RegisteryMailController extends Controller
{
    public function sent(Request $request)
    {
        $params = $request->all();
        Mail::to('admin@admin.com')
            ->send(new RegisterMail($params));
        return view ('sentRegistry');
    }
}
