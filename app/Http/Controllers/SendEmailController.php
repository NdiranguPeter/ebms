<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Mail;


class SendEmailController extends Controller
{
    function index()
    {
     return view('send_email');
    }

    function send(Request $request)
    {
     $this->validate($request, [
      'name'     =>  'required',
      'email'  =>  'required|email',
      'message' =>  'required'
     ]);

        $data = array(
            'name'      =>  $request->name,
            'message'   =>   $request->message
        );

     Mail::to('p.ndirangu@islamic-relief.or.ke')->send(new SendMail($data));
     return back()->with('success', 'Thanks for contacting us!');

    }

}
