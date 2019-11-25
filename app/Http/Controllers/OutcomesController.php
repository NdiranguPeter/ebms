<?php

namespace App\Http\Controllers;

use App\Outcome;
use App\Project;
use Illuminate\Http\Request;

class OutcomesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outcomes = outcome::all();

        return view('outcomes.index')->with('outcomes', $outcomes);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('outcomes.create');
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
            'outcome' => 'required',

        ]);

        $user_id = auth()->user()->id;

        $project_id = $request->input('id');

        $outcome_name = strip_tags($request->input('outcome'));

        $outcome = new outcome();
        $outcome->user_id = $user_id;
        $outcome->project_id = $project_id;
        $outcome->name = $outcome_name;

        $outcome->save();

        $outcomes = outcome::where('project_id', $project_id)->get();
        $project = Project::find($project_id);

        return view('outcomes.show')->with(['outcomes' => $outcomes, 'project' => $project, 'success' => 'outcome created']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $outcomes = outcome::where('project_id', $id)->get();

        $project = Project::find($id);

        return view('outcomes.show')->with(['outcomes' => $outcomes, 'project' => $project]);

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
         $outcome = Outcome::find($id);
        $outcome->delete();
        return redirect('/outcomes/'.$outcome->project_id)->with('error', 'Outcome deleted');
    }

    public function createoutcome($id)
    {

        $project = Project::find($id);
        return view('outcomes.create')->with('project', $project);
    }
}
