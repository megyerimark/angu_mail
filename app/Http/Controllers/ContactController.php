<?php

namespace App\Http\Controllers;
use Mail;
use Validator;
use App\Mail\MailNoty;
use App\Mail\ContactMsg;
use App\Models\CotactModel;


use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function send(Request $request){

        $validator = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject'=>'required',
            'message' => 'required',
            'tel' => 'required',
         ]);

         $contactData = [
            'name' => $validator['name'],
            'email' => $validator['email'],
            'subject' => $validator['subject'],
            'message' => $validator['message'],
            'tel' => $validator['tel'],
        ];

        $userEmail = $validator['email'];
        $myEmail = 'laravel.megyeri@gmail.com';

        Mail::to($userEmail)->send(new ContactMsg($validator));
        Mail::to($myEmail)->send(new ContactMsg($validator));

        return response()->json(['success' => 'Az e-mailt elküldtük.']);
    }
}
