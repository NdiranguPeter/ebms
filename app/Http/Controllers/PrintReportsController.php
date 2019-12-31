<?php

namespace App\Http\Controllers;

use App\Project;
use App\Outcome;
use App\Output;
use App\Activity;
use Illuminate\Http\Request;

class PrintReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $projects = Project::all();

        foreach ($projects as $project) {

            $outcomes = Outcome::where('project_id', $project->id)->get();
            foreach ($outcomes as $outcome) {
                $outputs = Output::where('outcome_id', $outcome->id)->get();

                foreach($outputs as $output){
                    $activities = Activity::where('output_id',$output->id)->get();

                    
            foreach ($activities as $activity) {
                $order = Activity::where('output_id', $output->id)->max("order");               
                $activity->order = $order + 1;
                $activity->save();
            }
                }

            }

        }
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
        //
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
