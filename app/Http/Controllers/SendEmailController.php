<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PDF;

class SendEmailController extends Controller
{
    public function index()
    {
        return view('send_email');
    }

    public function send(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'title' => 'required',
            'department' => 'required',
            'manager' => 'required',
        ]);

        $user = auth()->user()->email;
        $data = $request->all();

        
        Mail::to($request->manager_email)
         ->cc($user)
            ->send(new SendMail($data));
       
        return back()->with('success', 'Report successfully submitted!');

    }

   
}
