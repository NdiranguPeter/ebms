<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;

class UnitsController extends Controller
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

    'name' => 'required',
], [
    'name.required' => 'Indicator Scoring Unit name cannot be empty',
]);

$goal = $request->input('goal_id');
$outcome  = $request->input('outcome_id');
$output  = $request->input('output_id');
$type  = $request->input('type');

$unit = new Unit();
$unit->name = $request->input('name');

$unit->save();


if ($goal != 0) {
    return redirect('/indicators/'.$type.'/create/'.$goal);
}
if ($outcome != 0) {
    return redirect('/indicators/'.$type.'/create/'.$outcome);
}
if ($output != 0) {
    return redirect('/indicators/'.$type.'/create/'.$output);
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
