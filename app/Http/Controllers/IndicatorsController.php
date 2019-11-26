<?php

namespace App\Http\Controllers;

use App\Indicator;
use App\Indicatorafter;
use App\Outcome;
use App\Output;
use App\Project;
use App\Unit;
use DateTime;

use Illuminate\Http\Request;

class IndicatorsController extends Controller
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
            'indicator' => 'required',
            'scoring' => 'required',
            'unit' => 'required',
            'target_baseline' => 'required',
            'project_target' => 'required',
            'start' => 'required',
            'end' => 'required',
            ]);

        $user_id = auth()->user()->id;

        $indicator_name = $request->input('indicator');
        $indicator_scoring = $request->input('scoring');
        $indicator_unit = $request->input('unit');

        $indicator_tb = $request->input('target_baseline');

        $indicator = new indicator();
        $indicator->user_id = $user_id;
        $indicator->name = $indicator_name;
        $indicator->scoring = $indicator_scoring;
        $indicator->unit = $indicator_unit;
        $indicator->baseline_target = $indicator_tb;

        $indicator->project_id = $request->input('project_id');
        $indicator->project_target = $request->input('project_target');

        $indicator->goal_id = $request->input('goal_id');
        $indicator->outcome_id = $request->input('outcome_id');
        $indicator->output_id = $request->input('output_id');
        $indicator->start = $request->input('start');
        $indicator->end = $request->input('end');
        $project_id = $request->input('project_id');

        $indicator->save();

        $project = Project::find($indicator->project_id);
        $indicators = \DB::table('projects')
            ->join('indicators', 'indicators.project_id', 'projects.id')
            ->select('indicators.*')->where('projects.id', $indicator->project_id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return redirect('/indicators/' . $indicator->project_id)->with(['project' => $project, 'indicators' => $indicators]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        $indicators = \DB::table('projects')
            ->join('indicators', 'indicators.project_id', 'projects.id')
            ->select('indicators.*')->where('projects.id', $id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('indicators.show')->with(['project' => $project, 'indicators' => $indicators]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $indicator = Indicator::find($id);
        $msg = '';
        $goal = $indicator->goal_id;
        $put = $indicator->output_id;
        $come = $indicator->outcome_id;

        if ($goal != 0) {
            $msg = 'Goal';
            $goal = 1;
            $put = 0;
            $come = 0;
        }

        if ($put != 0) {
            $msg = 'Output';
            $goal = 0;
            $put = 1;
            $come = 0;

        }

        if ($come != 0) {
            $msg = 'Outcome';
            $goal = 0;
            $put = 0;
            $come = 1;

        }
        $units = Unit::all();

        $project = Project::find($indicator->project_id);

        return view('indicators.edit')->with(['units'=>$units,'msg' => $msg, 'project' => $project, 'goal' => $goal, 'put' => $put, 'come' => $come, 'indicator' => $indicator]);
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
            'indicator' => 'required',
            'scoring' => 'required',
            'target_baseline' => 'required',
            'project_target' => 'required',
            'start' => 'required',
            'end' => 'required',

        ]);

        $user_id = auth()->user()->id;
        $indicator = indicator::find($id);

        $indicator_name = $request->input('indicator');
        $indicator_scoring = $request->input('scoring');
        $indicator_unit = $request->input('unit');

        $indicator_tb = $request->input('target_baseline');
        $indicator->project_target = $request->input('project_target');

        $indicator->user_id = $user_id;

        $indicator->name = $indicator_name;
        $indicator->scoring = $indicator_scoring;
        $indicator->unit = $indicator_unit;
        $indicator->baseline_target = $indicator_tb;

        $indicator->project_id = $request->input('project_id');

        $indicator->goal_id = $request->input('goal_id');
        $indicator->outcome_id = $request->input('outcome_id');
        $indicator->output_id = $request->input('output_id');
        $indicator->start = $request->input('start');
        $indicator->end = $request->input('end');
        $project_id = $request->input('project_id');

        $indicator->save();

        $project = Project::find($indicator->project_id);
        $indicators = \DB::table('projects')
            ->join('indicators', 'indicators.project_id', 'projects.id')
            ->select('indicators.*')->where('projects.id', $indicator->project_id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return redirect('/indicators/' . $indicator->project_id)->with(['project' => $project, 'indicators' => $indicators]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $indicator = Indicator::find($id);
        $pro_id = $indicator->project_id;
        $project = Project::find($pro_id);

        $indicator->delete();
        $indicators = \DB::table('projects')
            ->join('indicators', 'indicators.project_id', 'projects.id')
            ->select('indicators.*')->where('projects.id', $indicator->project_id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return redirect('/indicators/' . $indicator->project_id)->with(['project' => $project, 'indicators' => $indicators, 'error' => 'Indicator deleted']);

    }

    public function createOutputIndicator($id)
    {
        $units = Unit::all();
        $output = Output::find($id);
        $outcome = outcome::find($output->outcome_id);
        $project = project::find($outcome->project_id);

        return view('indicators.create')->with(['output' => $output, 'msg' => 'output', 'goal' => 0, 'come' => 0, 'put' => 1, 'project' => $project, 'outcome' => $outcome, 'units' => $units]);

    }
    public function createOutcomeIndicator($id)
    {

        $units = Unit::all();

        $outcome = outcome::find($id);
        $project = project::find($outcome->project_id);

        return view('indicators.create')->with(['msg' => 'outcome', 'goal' => 0, 'come' => 1, 'put' => 0, 'project' => $project, 'outcome' => $outcome, 'units' => $units]);

    }
    public function createGoalIndicator($id)
    {

        $units = Unit::all();

        $project = project::find($id);

        $outcome = outcome::where('project_id', $project->id)->get();

        return view('indicators.create')->with(['msg' => 'goal', 'goal' => 1, 'come' => 0, 'put' => 0, 'project' => $project, 'outcome' => $outcome, 'units' => $units]);

    }

    public function after($id)
    {

        $actyafter = Indicatorafter::where('indicator_id', $id)->where('before_after', 'after')->first();
        if ($actyafter === null) {

            $indicator = Indicator::find($id);
            // $output = Output::find($indicator->output_id);
            $indicator->jan = 0;
            $indicator->feb = 0;
            $indicator->mar = 0;
            $indicator->apr = 0;
            $indicator->may = 0;
            $indicator->jun = 0;
            $indicator->jul = 0;
            $indicator->aug = 0;
            $indicator->sep = 0;
            $indicator->oct = 0;
            $indicator->nov = 0;
            $indicator->dec = 0;

        } else {

            $indicator = Indicatorafter::where('indicator_id', $id)->where('before_after', 'after')->first();
            $act = Indicator::find($indicator->indicator_id);
            $indicator->name = $act->name;
            $indicator->output_id = $act->output_id;
            $indicator->outcome_id = $act->outcome_id;
            $indicator->goal_id = $act->goal_id;
            $indicator->project_id = $act->project_id;

            $indicator->start = $act->start;
            $indicator->end = $act->end;
            $indicator->id = $act->id;
            $indicator->duration = $act->duration;
            $indicator->project_id = $act->project_id;

            // $output = Output::find($act->output_id);
        }

        // $units = Unit::all();

        // $outcome = Outcome::find($output->outcome_id);

        $before_after = 'after';

        return view('indicators.after')->with(['before_after' => $before_after, 'indicator' => $indicator]);

    }

    public function before($id)
    {

        $actyafter = Indicatorafter::where('indicator_id', $id)->where('before_after', 'before')->first();
        if ($actyafter === null) {
            $indicator = Indicator::find($id);
            // $output = Output::find($indicator->output_id);
            $indicator->jan = 0;
            $indicator->feb = 0;
            $indicator->mar = 0;
            $indicator->apr = 0;
            $indicator->may = 0;
            $indicator->jun = 0;
            $indicator->jul = 0;
            $indicator->aug = 0;
            $indicator->sep = 0;
            $indicator->oct = 0;
            $indicator->nov = 0;
            $indicator->dec = 0;

        } else {

            $indicator = Indicatorafter::where('indicator_id', $id)->where('before_after', 'before')->first();
            $act = Indicator::find($indicator->indicator_id);
            $indicator->name = $act->name;
            $indicator->output_id = $act->output_id;
            $indicator->outcome_id = $act->outcome_id;
            $indicator->goal_id = $act->goal_id;
            $indicator->project_id = $act->project_id;
            $indicator->start = $act->start;
            $indicator->end = $act->end;
            $indicator->id = $act->id;
            $indicator->duration = $act->duration;

            $indicator->project_id = $act->project_id;

            // $output = Output::find($act->output_id);
        }

        // $units = Unit::all();
        $before_after = 'before';

        // $outcome = Outcome::find($output->outcome_id);\

        // return $indicator;

        return view('indicators.after')->with(['before_after' => $before_after, 'indicator' => $indicator]);

    }
}
