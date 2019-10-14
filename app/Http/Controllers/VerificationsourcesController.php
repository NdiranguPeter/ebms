<?php

namespace App\Http\Controllers;

use App\Indicator;
use App\Verificationsource;
use Illuminate\Http\Request;

class VerificationsourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'responsibility' => 'required',
            'frequency' => 'required',
            'source' => 'required',
            'collection_method' => 'required',
            'name' => 'required',

        ]);

        $vs = new Verificationsource();

        $vs->name = $request->input('name');
        $vs->responsibility = $request->input('responsibility');
        $vs->frequency = $request->input('frequency');
        $vsource = $request->input('source');
        $vs->source = implode(',', $vsource);
        $vs->collection_method = $request->input('collection_method');
        $vs->indicator_id = $request->input('indicator_id');

        $vs->save();

        return redirect('/verificationsources/' . $vs->indicator_id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vs = Verificationsource::orderBy('created_at', 'desc')->paginate(10);

        return view('/verifiablesource/show')->with('vs', $vs);
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

    public function selectIndicator($id)
    {

        $indicator = Indicator::find($id);
        return view('/verifiablesource/create')->with('indicator', $indicator);
    }
}
