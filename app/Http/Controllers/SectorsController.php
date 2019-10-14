<?php

namespace App\Http\Controllers;

use App\Sector;
use App\User;
use Illuminate\Http\Request;

class SectorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;

        $user = User::find($user_id);
        // return $user->projects;

        $sectors = Sector::orderBy('created_at', 'asc')->paginate(10);

        return view('sectors.index')->with(['sectors' => $sectors]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sectors.create');
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

        ]);

        $sector = new Sector();

        $sector->name = $request->input('name');

        $sector->save();

        return redirect('/sectors')->with('success', 'sector saved');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     $sector = Sector::find($id);

    return view('sectors.show')->with('sector', $sector);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sector = Sector::find($id);

        return view('sectors.edit')->with('sector', $sector);
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

        ]);

            $sector = Sector::find($id);

            $sector->name = $request->input('name');

            $sector->save();

            return redirect('/sectors')->with('success', 'sector updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sector = Sector::find($id);
        $sector->delete();

        return redirect('/sectors')->with('error', 'sector deleted');
    }
}
