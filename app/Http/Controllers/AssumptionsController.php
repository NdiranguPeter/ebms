<?php

namespace App\Http\Controllers;

use App\Assumption;
use App\Project;
use Illuminate\Http\Request;

class AssumptionsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'reason' => 'required',
            'validation' => 'required',
            'description' => 'required',
            'response' => 'required',
            'owner' => 'required',
            'name' => 'required',

        ]);

        $assumption = new Assumption();
        $assumption->goal_id = $request->input('goal_id');
        $assumption->outcome_id = $request->input('outcome_id');
        $assumption->output_id = $request->input('output_id');
        $assumption->activity_id = $request->input('activity_id');
        $assumption->reason = $request->input('reason');
        $assumption->validation = $request->input('validation');
        $assumption->description = $request->input('description');
        $assumption->response = $request->input('response');
        $assumption->owner = $request->input('owner');
        $assumption->name = $request->input('name');
        $assumption->project_id = $request->input('project_id');
        $id = $request->input('project_id');

        $assumption->save();

        if ($assumption->outcome_id != 0) {
            return redirect('/assumptions/outcome/' . $id);

        }
        if ($assumption->output_id != 0) {
            return redirect('/assumptions/output/' . $id);
        }
        if ($assumption->activity_id != 0) {
            return redirect('/assumptions/activity/' . $id);
        }
        if ($assumption->goal_id != 0) {
            return redirect('/assumptions/goal/' . $id);
        }

    }

    public function goalAssumption($id)
    {

        $project = Project::find($id);
        $msg = 'Goal';
        return view('assumptions.create')->with(['output' => 0, 'outcome' => 0, 'goal' => 1, 'activity' => 0, 'project' => $project, 'msg' => $msg]);

    }
    public function outcomeAssumption($id)
    {
        $project = Project::find($id);
        $msg = 'Outcome';

        $outcomes = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->select('outcomes.*')->where('projects.id', $id)
            ->get();

        return view('assumptions.create')->with(['outcomes' => $outcomes, 'output' => 0, 'outcome' => 1, 'goal' => 0, 'activity' => 0, 'project' => $project, 'msg' => $msg]);

    }
    public function outputAssumption($id)
    {
        $project = Project::find($id);
        $msg = 'Output';

        $outputs = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->select('outputs.*')->where('projects.id', $id)
            ->get();

        return view('assumptions.create')->with(['output' => 1, 'outcome' => 0, 'goal' => 0, 'activity' => 0, 'outputs' => $outputs, 'project' => $project, 'msg' => $msg]);

    }
    public function activityAssumption($id)
    {
        $project = Project::find($id);
        $msg = 'Activity';
        $activities = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->join('activities', 'activities.output_id', 'outputs.id')
            ->select('activities.*')->where('projects.id', $id)
            ->get();

        return view('assumptions.create')->with(['activities' => $activities, 'output' => 0, 'outcome' => 0, 'goal' => 0, 'activity' => 1, 'project' => $project, 'msg' => $msg]);

    }

    public function goal($id)
    {

        $project = Project::find($id);

        $outcomes = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->select('outcomes.*')->where('projects.id', $id)
            ->get();

        $outputs = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->select('outputs.*')->where('projects.id', $id)
            ->orderBy('created_at', 'desc')->paginate(6);

        $activities = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->join('activities', 'activities.output_id', 'outputs.id')
            ->select('activities.*')->where('projects.id', $id)
            ->get();

        $assumptions = Assumption::where('goal_id','=', $id)
             ->get();

        return view('assumptions.index')->with(['assumptions' => $assumptions, 'goal' => 1, 'project' => $project, 'outcomes' => $outcomes, 'outputs' => $outputs, 'activities' => $activities]);

    }

    public function outcome($id)
    {

        $project = Project::find($id);
        $outcomes = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->select('outcomes.*')->where('projects.id', $id)
            ->get();

        $outputs = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->select('outputs.*')->where('projects.id', $id)
            ->orderBy('created_at', 'desc')->paginate(6);

        $activities = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->join('activities', 'activities.output_id', 'outputs.id')
            ->select('activities.*')->where('projects.id', $id)
            ->get();

        $assumptions = Assumption::where('outcome_id', '!=', '0')
          ->where('project_id','=', $id)
        ->get();

        return view('assumptions.index')->with(['assumptions' => $assumptions, 'outcome' => 1, 'project' => $project, 'outcomes' => $outcomes, 'outputs' => $outputs, 'activities' => $activities]);

    }
    public function output($id)
    {

        $project = Project::find($id);
        $outcomes = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->select('outcomes.*')->where('projects.id', $id)
            ->get();

        $outputs = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->select('outputs.*')->where('projects.id', $id)
            ->orderBy('created_at', 'desc')->paginate(6);

        $activities = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->join('activities', 'activities.output_id', 'outputs.id')
            ->select('activities.*')->where('projects.id', $id)
            ->get();

        $assumptions = Assumption::where('output_id', '!=', '0')
        ->where('project_id','=', $id)
        ->get();

        return view('assumptions.index')->with(['assumptions' => $assumptions, 'output' => 1, 'project' => $project, 'outcomes' => $outcomes, 'outputs' => $outputs, 'activities' => $activities]);

    }
    public function activity($id)
    {

        $project = Project::find($id);
        $outcomes = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->select('outcomes.*')->where('projects.id', $id)
            ->get();

        $outputs = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->select('outputs.*')->where('projects.id', $id)
            ->orderBy('created_at', 'desc')->paginate(6);

        $activities = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->join('activities', 'activities.output_id', 'outputs.id')
            ->select('activities.*')->where('projects.id', $id)
            ->get();

        $assumptions = Assumption::where('activity_id', '!=', '0')
        ->where('project_id','=', $id)
        ->get();

        return view('assumptions.index')->with(['assumptions' => $assumptions, 'activity' => 1, 'project' => $project, 'outcomes' => $outcomes, 'outputs' => $outputs, 'activities' => $activities]);

    }

}
