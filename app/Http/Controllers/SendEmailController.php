<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;


class SendEmailController extends Controller
{
    function index()
    {
     return view('send_email');
    }

    function send(Request $request)
    {
    //     $this->validate($request, [
    //   'name'     =>  'required',
    //   'title'     =>  'required',
    //   'department'     =>  'required',
    //   'manager'     =>  'required',
    //        ]);


        $user = auth()->user()->email;
        $manager = $request->input("line_manager");

        $data = $request->all();

        // dd($data);

     Mail::to($user)->send(new SendMail($data));
     return back()->with('success', 'Report successfully submitted!');

    }

}
