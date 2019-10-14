<?php

namespace App\Http\Controllers;

use App\Partner;
use Illuminate\Http\Request;

class PartnersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::orderBy('created_at', 'desc')->paginate(10);

        return view('partners.index')->with('partners', $partners);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('partners.create');
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
            'acronym' => 'required',
            'type' => 'required',
            'role' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'description' => 'required',

        ]);
        $partner = new Partner();
        $partner->name = $request->input('name');
        $partner->acronym = $request->input('acronym');
        $partner->type = $request->input('type');
        $partner->role = $request->input('role');
        $partner->address = $request->input('address');
        $partner->phone = $request->input('phone');
        $partner->email = $request->input('email');
        $partner->description = strip_tags($request->input('description'));

        $partner->save();

        return redirect('/partners')->with('success', 'Partner created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $partner = Partner::find($id);

        return view('partners.show')->with(['partner' => $partner]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $partner = Partner::find($id);

        return view('partners.edit')->with(['partner' => $partner]);

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
        $this->validate($request, [
            'name' => 'required',
            'acronym' => 'required',
            'type' => 'required',
            'role' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'description' => 'required',

        ]);
        $partner = Partner::find($id);
        $partner->name = $request->input('name');
        $partner->acronym = $request->input('acronym');
        $partner->type = $request->input('type');
        $partner->role = $request->input('role');
        $partner->address = $request->input('address');
        $partner->phone = $request->input('phone');
        $partner->email = $request->input('email');
        $partner->description = strip_tags($request->input('description'));

        $partner->save();

        return redirect('/partners')->with('success', 'Partner edited');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partner = Partner::find($id);
        $partner->delete();

        return redirect('/partners')->with(['error' => 'Patner deleted']);

    }
}
