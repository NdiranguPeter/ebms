<?php

namespace App\Http\Controllers;

use App\Donor;
use Illuminate\Http\Request;

class DonorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donors = Donor::orderBy('created_at', 'asc')->paginate(10);

        return view('donors.index')->with('donors', $donors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('donors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'type' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'description' => 'required',

        ]);

        $donor = new Donor();
        $donor->name = $request->input('name');
        $donor->type = $request->input('type');
        $donor->email = $request->input('email');
        $donor->address = $request->input('address');
        $donor->phone = $request->input('phone');
        $donor->description = $request->input('description');
        $from = $request->input('from');

        $donor->save();

        if($from == "project"){
            return redirect('/projects/create')->with('success', 'Donor successfully created');
        }else{

        return redirect('/donors')->with('success', 'Donor successfully created');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
