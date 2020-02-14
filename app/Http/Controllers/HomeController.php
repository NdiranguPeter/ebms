<?php

use Illuminate\Http\Request;

use App\Project;

namespace App\Http\Controllers;

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
    public function admin()
    {
        return view('pages.admin');
    }
    public function regional()
    {
        $user = auth()->user();

        if ($user->role == 999) {
            return view('regional');
        }
        if ($user->role == 0) {
            return redirect('/home');
        }

    }


}
