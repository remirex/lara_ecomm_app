<?php

namespace App\Http\Controllers;

use App\Mail\userContactUsMail;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact');
    }

    public function sendMail(Request $request, Mailer $mailer)
    {

        $name = $request->input('name');
        $email = $request->input('email');
        $text_msg = $request->input('text_msg');

        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'text_msg' => 'required|min:10'
        ]);


        $mailer->to($email)->send(new userContactUsMail($name,$text_msg));

        return back()->with('session_message','Your email has been sent!');
    }
}
