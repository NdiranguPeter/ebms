<?php

namespace App\Http\Controllers;

use App\Country;
use App\Project;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth' => 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages.dashboard');
    }
    public function regional()
    {
       $user = auth()->user();

      if ($user->role == 1) {
          return view('regional');
      }
         if ($user->role == 0) {
          return redirect('/home');
      }

    }

     public function kenya()
    {
        $user = auth()->user();
        
      if ($user->role == 1) {
          return view('kenya');
      }
         if ($user->role == 0) {
          return redirect('/home');
      }

    }

}
