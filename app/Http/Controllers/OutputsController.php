<?php

namespace App\Http\Controllers;

use App\Exports\DipExport;
use App\Outcome;
use App\Output;
use App\Project;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class OutputsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outputs = Output::all();
        return view('outputs.index')->with('outputs', $outputs);
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
            'output' => 'required',

        ]);

        $user_id = auth()->user()->id;

        $outcome_id = $request->input('id');

        $output_name = strip_tags($request->input('output'));

        $output = new Output();
        $output->user_id = $user_id;
        $output->outcome_id = $outcome_id;
        $output->name = $output_name;

        $output->save();

        $outputs = Output::where('outcome_id', $outcome_id)->get();
        $outcome = outcome::findOrFail($outcome_id);
        $project = Project::findOrFail($outcome->project_id);

        return view('outputs.show')->with(['project' => $project, 'outputs' => $outputs, 'outcome' => $outcome, 'success' => 'output created']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $outputs = Output::where('outcome_id', $id)->get();

        $outcome = outcome::findOrFail($id);

        $project = Project::findOrFail($outcome->project_id);

        return view('outputs.show')->with(['outputs' => $outputs, 'outcome' => $outcome, 'project' => $project]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $output = Output::findOrFail($id);
    
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
            'output' => 'required'
            ]);

       $output = Output::findOrFail($id);
       $output->name = $request->output;

       $output->save();

       return redirect('/outputs/'.$output->outcome_id)->with('success', 'output updated');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $output = Output::findOrFail($id);
        $output->delete();
        return redirect('/outputs/'.$output->outcome_id)->with('error', 'output deleted');
    
    }

    public function createOutput($id)
    {

        $outcome = outcome::findOrFail($id);

        return view('outputs.create')->with('outcome', $outcome);
    }

    public function export_dip($id)
    {
        return Excel::download(new DipExport($id), 'Detailed Implementation Plan.xlsx');
    }

}
