<?php

namespace App\Http\Controllers;

use App\Challenge;
use Illuminate\Http\Request;

class ChallengesController extends Controller
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

            'challenge' => 'required',
            'solution' => 'required',
        ], [
            'challenge.required' => 'Challenge field cannot be empty',
            'solution.required' => 'Solution field cannot be empty',
        ]);

        $challenge = new Challenge();
        $challenge->activity_id = $request->input('activity_id');
        $challenge->project_id = $request->input('project_id');
        $challenge->challenge = $request->input('challenge');
        $challenge->solution = $request->input('solution');

        $challenge->save();


        return redirect('/activities/after/' . $challenge->activity_id)->with('success', 'Challenge created.');
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
        $challenge = Challenge::find($id);
        $challenge->delete();

        return redirect('/activities/after/' . $challenge->activity_id)->with('success', 'Challenge deleted');


    }
}
