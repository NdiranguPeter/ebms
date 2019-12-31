<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Project;
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

            $activities = \DB::table('projects')
                ->join('outcomes', 'outcomes.project_id', 'projects.id')
                ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
                ->join('activities', 'activities.output_id', 'outputs.id')
                ->select('activities.*')->where('projects.id', $project->id)
                ->get();
            $order = 1;
            foreach ($activities as $activity) {
                $activity = Activity::find($activity->id);
                $activity->order = $order;
                $activity->save();
                $order++;
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
