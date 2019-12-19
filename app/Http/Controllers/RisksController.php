<?php

namespace App\Http\Controllers;

use App\Project;
use App\Risk;
use Illuminate\Http\Request;

class RisksController extends Controller
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
            'category' => 'required',
            'level' => 'required',
            'likelihood' => 'required',
            'impact' => 'required',
            'response' => 'required',
            'owner' => 'required',
            'description' => 'required',
            'strategy' => 'required',
            'name' => 'required',

        ]);

        $risk = new Risk();
        $risk->goal_id = $request->input('goal_id');
        $risk->outcome_id = $request->input('outcome_id');
        $risk->output_id = $request->input('output_id');
        $risk->activity_id = $request->input('activity_id');
        $risk->category = $request->input('category');
        $risk->level = $request->input('level');
        $risk->likelihood = $request->input('likelihood');
        $risk->impact = $request->input('impact');
        $risk->description = $request->input('description');
        $risk->response = $request->input('response');
        $risk->strategy = $request->input('strategy');
        $risk->owner = $request->input('owner');
        $risk->name = $request->input('name');
        $risk->project_id = $request->input('project_id');
        $id = $request->input('project_id');

        $risk->save();

        if ($risk->outcome_id != 0) {
            return redirect('/risks/outcome/' . $id);

        }
        if ($risk->output_id != 0) {
            return redirect('/risks/output/' . $id);
        }
        if ($risk->activity_id != 0) {
            return redirect('/risks/activity/' . $id);
        }
        if ($risk->goal_id != 0) {
            return redirect('/risks/goal/' . $id);
        }

    }

    public function goalRisk($id)
    {

        $project = Project::find($id);
        $msg = 'Goal';
        return view('risks.create')->with(['output' => 0, 'outcome' => 0, 'goal' => 1, 'activity' => 0, 'project' => $project, 'msg' => $msg]);

    }
    public function outcomeRisk($id)
    {
        $project = Project::find($id);
        $msg = 'Outcome';

        $outcomes = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->select('outcomes.*')->where('projects.id', $id)
            ->get();

        return view('risks.create')->with(['outcomes' => $outcomes, 'output' => 0, 'outcome' => 1, 'goal' => 0, 'activity' => 0, 'project' => $project, 'msg' => $msg]);

    }
    public function outputRisk($id)
    {
        $project = Project::find($id);
        $msg = 'Output';

        $outputs = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->select('outputs.*')->where('projects.id', $id)
            ->get();

        return view('risks.create')->with(['output' => 1, 'outcome' => 0, 'goal' => 0, 'activity' => 0, 'outputs' => $outputs, 'project' => $project, 'msg' => $msg]);

    }
    public function activityRisk($id)
    {
        $project = Project::find($id);
        $msg = 'Activity';
        $activities = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->join('activities', 'activities.output_id', 'outputs.id')
            ->select('activities.*')->where('projects.id', $id)
            ->get();

        return view('risks.create')->with(['activities' => $activities, 'output' => 0, 'outcome' => 0, 'goal' => 0, 'activity' => 1, 'project' => $project, 'msg' => $msg]);

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

        $risks = Risk::where('goal_id', '=', $id)->get();

        return view('risks.index')->with(['risks' => $risks, 'goal' => 1, 'project' => $project, 'outcomes' => $outcomes, 'outputs' => $outputs, 'activities' => $activities]);

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

        $risks = Risk::where('outcome_id', '!=', '0')
            ->where('project_id', '=', $id)
            ->get();

        return view('risks.index')->with(['risks' => $risks, 'outcome' => 1, 'project' => $project, 'outcomes' => $outcomes, 'outputs' => $outputs, 'activities' => $activities]);

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

        $risks = Risk::where('output_id', '!=', '0')
            ->where('project_id', '=', $id)
            ->get();

        return view('risks.index')->with(['risks' => $risks, 'output' => 1, 'project' => $project, 'outcomes' => $outcomes, 'outputs' => $outputs, 'activities' => $activities]);

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

        $risks = Risk::where('activity_id', '!=', '0')
            ->where('project_id', '=', $id)
            ->get();

        return view('risks.index')->with(['risks' => $risks, 'activity' => 1, 'project' => $project, 'outcomes' => $outcomes, 'outputs' => $outputs, 'activities' => $activities]);

    }

    public function destroy($id)
    {
        $risk = Risk::find($id);
        $risk->delete();

        if ($risk->outcome_id != 0) {
            return redirect('/risks/outcome/' . $risk->outcome_id);

        }
        if ($risk->output_id != 0) {
            return redirect('/risks/output/' . $risk->output_id);
        }
        if ($risk->activity_id != 0) {
            return redirect('/risks/activity/' . $risk->activity_id);
        }
        if ($risk->goal_id != 0) {
            return redirect('/risks/goal/' . $risk->goal_id);
        }
    }



    public function edit($id)
    {
       $risk = Risk::find($id);
       
$project = Project::find($risk->project_id);
$outcome = 0;
$output = 0;
$activity = 0;
$goal = 0;

$outcomes = \DB::table('projects')
    ->join('outcomes', 'outcomes.project_id', 'projects.id')
    ->select('outcomes.*')->where('projects.id', $risk->project_id)
    ->get();

$outputs = \DB::table('projects')
    ->join('outcomes', 'outcomes.project_id', 'projects.id')
    ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
    ->select('outputs.*')->where('projects.id', $risk->project_id)
    ->orderBy('created_at', 'desc')->paginate(6);

$activities = \DB::table('projects')
    ->join('outcomes', 'outcomes.project_id', 'projects.id')
    ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
    ->join('activities', 'activities.output_id', 'outputs.id')
    ->select('activities.*')->where('projects.id', $risk->project_id)
    ->get();

       
if ($risk->outcome_id != 0) {
   
$msg = 'Outcome';
$outcome = 1;

}
if ($risk->output_id != 0) {
   
$msg = 'Output';
$output = 1;
}
if ($risk->activity_id != 0) {
    
$msg = 'Activity';
$activity = 1;
}
if ($risk->goal_id != 0) {
    
$msg = 'Goal';
$goal = 1;
}

return view('risks.edit')->with(['outputs'=>$outputs,'activities'=>$activities,'outcomes'=>$outcomes,'risk'=>$risk,'output' => $output, 'outcome' => $outcome, 'goal' => $goal, 'activity' => $activity, 'project' => $project, 'msg' => $msg]);

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
    'category' => 'required',
    'level' => 'required',
    'likelihood' => 'required',
    'impact' => 'required',
    'response' => 'required',
    'owner' => 'required',
    'description' => 'required',
    'strategy' => 'required',
    'name' => 'required',

]);


$risk = Risk::find($id);



       $risk->goal_id = $request->input('goal_id');
        $risk->outcome_id = $request->input('outcome_id');
        $risk->output_id = $request->input('output_id');
        $risk->activity_id = $request->input('activity_id');
        $risk->category = $request->input('category');
        $risk->level = $request->input('level');
        $risk->likelihood = $request->input('likelihood');
        $risk->impact = $request->input('impact');
        $risk->description = $request->input('description');
        $risk->response = $request->input('response');
        $risk->strategy = $request->input('strategy');
        $risk->owner = $request->input('owner');
        $risk->name = $request->input('name');
        $risk->project_id = $request->input('project_id');
        $id = $request->input('project_id');
  
        $risk->save();

        if ($risk->outcome_id != 0) {
            return redirect('/risks/outcome/' . $id);

        }
        if ($risk->output_id != 0) {
            return redirect('/risks/output/' . $id);
        }
        if ($risk->activity_id != 0) {
            return redirect('/risks/activity/' . $id);
        }
        if ($risk->goal_id != 0) {
            return redirect('/risks/goal/' . $id);
        }
    }

}
