<?php

namespace App\Http\Controllers;

use App\Indicator;
use App\Indicatorafter;
use App\Outcome;
use App\Output;
use App\Project;
use App\Unit;
use DateTime;
use DB;
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

    public function getIndicator($id)
    {
        $years = \DB::table('indicatorafters')
            ->select('indicatorafters.year')->where('indicatorafters.indicator_id', $id)
            ->get();

        return json_encode($years);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'unit' => 'required',
            'target_baseline' => 'required',
            'project_target' => 'required',
            'start' => 'required',
            'end' => 'required',
            'end' => 'after:start',
        ]);

        $user_id = auth()->user()->id;

        $indicator = new indicator();
        $indicator->user_id = $user_id;
        $indicator->project_id = $request->input('project_id');
        $indicator->goal_id = $request->input('goal_id');
        $indicator->outcome_id = $request->input('outcome_id');
        $indicator->output_id = $request->input('output_id');
        $indicator->name = $request->input('indicator');
        $indicator->scoring = $request->input('unit');
        $indicator->unit = $request->input('unit');
        $indicator->baseline_target = $request->input('target_baseline');
        $indicator->project_target = $request->input('project_target');
        $indicator->i_order = $request->input('i_order');
        $indicator->start = $request->input('start');
        $indicator->end = $request->input('end');

        $indicator->save();

        $datetime1 = new DateTime($indicator->start);
        $datetime2 = new DateTime($indicator->end);
        $interval = $datetime1->diff($datetime2);
        $years = $interval->format('%y');
        $months = $interval->format('%m');
        $days = $interval->format('%d');

        $startyear = $datetime1->format('Y');
        $startmonth = $datetime1->format('m');

        $endyear = $datetime2->format('Y');
        $endmonth = $datetime2->format('m');

        if ($startyear == $endyear) {

            for ($y = 1; $y <= 12; $y++) {

                $indiibefore = new Indicatorafter();
                $indiibefore->indicator_id = $indicator->id;
                $indiibefore->person_responsible = auth()->user()->name;
                $indiibefore->jan = 0;
                $indiibefore->feb = 0;
                $indiibefore->mar = 0;
                $indiibefore->apr = 0;
                $indiibefore->may = 0;
                $indiibefore->jun = 0;
                $indiibefore->jul = 0;
                $indiibefore->aug = 0;
                $indiibefore->sep = 0;
                $indiibefore->oct = 0;
                $indiibefore->nov = 0;
                $indiibefore->dec = 0;
                $indiibefore->month = $y;
                $indiibefore->start = $indicator->start;
                $indiibefore->end = $indicator->end;
                $indiibefore->ovi_date = $indicator->end;
                $indiibefore->before_after = "before";
                $indiibefore->year = $startyear;
                $indiibefore->created_at = $indicator->created_at;
                $indiibefore->updated_at = $indicator->updated_at;
                $indiibefore->baseline_target = $request->input('target_baseline');
                $indiibefore->project_target = $request->input('project_target');

                $indiibefore->save();

                $indiibefore = $indiibefore->replicate();
                $indiibefore->before_after = "after";

                $indiibefore->save();

            }

        }
        if ($startyear != $endyear) {
            for ($i = $startyear; $i <= $endyear; $i++) {
                for ($y = 1; $y <= 12; $y++) {

                    $indiibefore = new Indicatorafter();
                    $indiibefore->indicator_id = $indicator->id;
                    $indiibefore->person_responsible = auth()->user()->name;
                    $indiibefore->jan = 0;
                    $indiibefore->feb = 0;
                    $indiibefore->mar = 0;
                    $indiibefore->apr = 0;
                    $indiibefore->may = 0;
                    $indiibefore->jun = 0;
                    $indiibefore->jul = 0;
                    $indiibefore->aug = 0;
                    $indiibefore->sep = 0;
                    $indiibefore->oct = 0;
                    $indiibefore->nov = 0;
                    $indiibefore->dec = 0;
                    $indiibefore->month = $y;
                    $indiibefore->start = $indicator->start;
                    $indiibefore->end = $indicator->end;
                    $indiibefore->ovi_date = $indicator->end;
                    $indiibefore->before_after = "before";
                    $indiibefore->year = $i;
                    $indiibefore->created_at = $indicator->created_at;
                    $indiibefore->updated_at = $indicator->updated_at;
                    $indiibefore->baseline_target = $request->input('target_baseline');
                    $indiibefore->project_target = $request->input('project_target');

                    $indiibefore->save();

                    $indiibefore = $indiibefore->replicate();
                    $indiibefore->before_after = "after";

                    $indiibefore->save();
                }

            }

        }

        $project = Project::findOrFail($indicator->project_id);
        $indicators = \DB::table('projects')
            ->join('indicators', 'indicators.project_id', 'projects.id')
            ->select('indicators.*')->where('projects.id', $indicator->project_id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        if ($indicator->goal_id != 0) {

            return redirect('/projects')->with('success', 'Project successfully created');

        }

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
        $project = Project::findOrFail($id);
        $indicators = \DB::table('projects')
            ->join('indicators', 'indicators.project_id', 'projects.id')
            ->select('indicators.*')->where('projects.id', $id)
            ->orderBy('created_at', 'asc')
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
// dd($id);
        $indicator = Indicator::findOrFail($id);
        $msg = '';
        $goal = $indicator->goal_id;
        $put = $indicator->output_id;
        $come = $indicator->outcome_id;
        $output = "";
        $outcome = "";

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

            $output = Output::findOrFail($indicator->output_id);

        }

        if ($come != 0) {
            $msg = 'Outcome';
            $goal = 0;
            $put = 0;
            $come = 1;

            $outcome = Outcome::findOrFail($indicator->outcome_id);

        }

        $units = Unit::all();

        $project = Project::findOrFail($indicator->project_id);

        return view('indicators.edit')->with(['output' => $output, 'outcome' => $outcome, 'units' => $units, 'msg' => $msg, 'project' => $project, 'goal' => $goal, 'put' => $put, 'come' => $come, 'indicator' => $indicator]);
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
        $indicator = indicator::findOrFail($id);
        $indicator->project_target = $request->input('project_target');
        $indicator->user_id = $user_id;
        $indicator->name = $request->input('indicator');
        $indicator->scoring = $request->input('scoring');
        $indicator->unit = $request->input('scoring');
        $indicator->baseline_target = $request->input('target_baseline');
        $indicator->project_id = $request->input('project_id');
        $indicator->goal_id = $request->input('goal_id');
        $indicator->outcome_id = $request->input('outcome_id');
        $indicator->output_id = $request->input('output_id');
        $indicator->start = $request->input('start');
        $indicator->end = $request->input('end');

        $indicator->save();

        $project = Project::findOrFail($indicator->project_id);
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
        $indicator = Indicator::findOrFail($id);
        $pro_id = $indicator->project_id;
        $project = Project::findOrFail($pro_id);

        $indicator->delete();

        DB::table('indicators')
            ->where('user_id', $project->user_id)
            ->where('i_order', '>', $indicator->i_order)
            ->decrement('i_order', 1);

        $indafter = Indicatorafter::where('indicator_id', $id)->delete();

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
        $output = Output::findOrFail($id);
        $outcome = outcome::findOrFail($output->outcome_id);
        $project = project::findOrFail($outcome->project_id);
        $indicator_order = Indicator::where('project_id', $project->id)->max("i_order");

        return view('indicators.create')->with(['indicator_order' => $indicator_order, 'output' => $output, 'msg' => 'output', 'goal' => 0, 'come' => 0, 'put' => 1, 'project' => $project, 'outcome' => $outcome, 'units' => $units]);

    }
    public function createOutcomeIndicator($id)
    {

        $units = Unit::all();

        $outcome = outcome::findOrFail($id);
        $project = project::findOrFail($outcome->project_id);
        $indicator_order = Indicator::where('project_id', $project->id)->max("i_order");

        return view('indicators.create')->with(['indicator_order' => $indicator_order, 'msg' => 'outcome', 'goal' => 0, 'come' => 1, 'put' => 0, 'project' => $project, 'outcome' => $outcome, 'units' => $units]);

    }
    public function createGoalIndicator($id)
    {

        $units = Unit::all();

        $project = project::findOrFail($id);

        $outcome = outcome::where('project_id', $project->id)->get();

        $indicator_order = Indicator::where('project_id', $project->id)->max("i_order");

        return view('indicators.create')->with(['indicator_order' => $indicator_order, 'msg' => 'goal', 'goal' => 1, 'come' => 0, 'put' => 0, 'project' => $project, 'outcome' => $outcome, 'units' => $units]);

    }

    public function after($id)
    {

        $before_after = 'after';
        $ind = Indicator::findOrFail($id);

        $datetime1 = new DateTime($ind->start);
        $startyear = $datetime1->format('Y');
        $startmonth = $datetime1->format('m');
        $month = (int) $startmonth;

        $units = Unit::all();

        $indicator = Indicatorafter::where('indicator_id', $id)->where('month', $month)->where('year', $startyear)->where('before_after', $before_after)->first();

        return view('indicators.after')->with(['units' => $units, 'month' => $month, 'before_after' => $before_after, 'indicator' => $indicator, 'ind' => $ind, 'yr' => $startyear]);

    }

    public function before($id)
    {

        $before_after = 'before';
        $ind = Indicator::findOrFail($id);

        $datetime1 = new DateTime($ind->start);
        $startyear = $datetime1->format('Y');

        $startmonth = $datetime1->format('m');
        $month = (int) $startmonth;

        $units = Unit::all();

        $indicator = Indicatorafter::where('indicator_id', $id)->where('month', $month)->where('year', $startyear)->where('before_after', $before_after)->first();

        return view('indicators.after')->with(['units' => $units, 'month' => $month, 'before_after' => $before_after, 'indicator' => $indicator, 'ind' => $ind, 'yr' => $startyear]);

    }

    public function before2(Request $request)
    {

        $before_after = $request->input('before_after');
        $month = $request->input('month');

        $year = $request->input('year');


        $ind = Indicator::findOrFail($request->indicatorID);

        $units = Unit::all();
        $datetime1 = new DateTime($ind->start);
        $startyear = $datetime1->format('Y');

        $datetime2 = new DateTime($ind->end);
        $endyear = $datetime2->format('Y');
        $startmonth = (int) $datetime1->format('m');

        $yr = $request->year;

        if ($year == "") {
            $year = $startyear;
            $yr = $startyear;

        }
        if ($month == "") {
            $month = $startmonth;
        }

        $indicator = Indicatorafter::where('month', $month)->where('indicator_id', $request->indicatorID)->where('year', $request->year)->where('before_after', $before_after)->first();
                
        
        if ($request->year > $startyear) {
            $indicator->start = $request->year . '-01-01';

        }

        return view('indicators.after')->with(['units' => $units, 'month' => $month, 'before_after' => $before_after, 'indicator' => $indicator, 'ind' => $ind, 'yr' => $request->year]);

    }

    public function indc()
    {

        // $min = Indicator::where('year(start)','>','2018');

        $min = Indicator::all();

        foreach ($min as $indicator) {

            $datetime1 = new DateTime($indicator->start);
            $datetime2 = new DateTime($indicator->end);

            $interval = $datetime1->diff($datetime2);
            $years = $interval->format('%y');
            $months = $interval->format('%m');
            $days = $interval->format('%d');

            $startyear = $datetime1->format('Y');
            $startmonth = $datetime1->format('m');

            $endyear = $datetime2->format('Y');
            $endmonth = $datetime2->format('m');
            

            if ($startyear == $endyear) {

                for ($y = $startmonth; $y <= $endmonth; $y++) {

                    $indiibefore = new Indicatorafter();
                    $indiibefore->indicator_id = $indicator->id;
                    $indiibefore->person_responsible = auth()->user()->name;
                    $indiibefore->jan = 0;
                    $indiibefore->feb = 0;
                    $indiibefore->mar = 0;
                    $indiibefore->apr = 0;
                    $indiibefore->may = 0;
                    $indiibefore->jun = 0;
                    $indiibefore->jul = 0;
                    $indiibefore->aug = 0;
                    $indiibefore->sep = 0;
                    $indiibefore->oct = 0;
                    $indiibefore->nov = 0;
                    $indiibefore->dec = 0;
                    $indiibefore->month = $y;
                    $indiibefore->start = $indicator->start;
                    $indiibefore->end = $indicator->end;
                    $indiibefore->ovi_date = $indicator->end;
                    $indiibefore->before_after = "before";
                    $indiibefore->year = $startyear;
                    $indiibefore->created_at = $indicator->created_at;
                    $indiibefore->updated_at = $indicator->updated_at;
                    $indiibefore->baseline_target = $indicator->baseline_target;
                    $indiibefore->project_target = $indicator->project_target;

                    $indiibefore->save();

                    $indiibefore = $indiibefore->replicate();
                    $indiibefore->before_after = "after";

                    $indiibefore->save();

                }

            }

            if ($startyear != $endyear) {
                for ($i = $startyear; $i <= $endyear; $i++) {
                    for ($y = 1;
                        $y <= 12;
                        $y++) {

                        $indiibefore = new Indicatorafter();
                        $indiibefore->indicator_id = $indicator->id;
                        $indiibefore->person_responsible = auth()->user()->name;
                        $indiibefore->jan = 0;
                        $indiibefore->feb = 0;
                        $indiibefore->mar = 0;
                        $indiibefore->apr = 0;
                        $indiibefore->may = 0;
                        $indiibefore->jun = 0;
                        $indiibefore->jul = 0;
                        $indiibefore->aug = 0;
                        $indiibefore->sep = 0;
                        $indiibefore->oct = 0;
                        $indiibefore->nov = 0;
                        $indiibefore->dec = 0;
                        $indiibefore->month = $y;
                        $indiibefore->start = $indicator->start;
                        $indiibefore->end = $indicator->end;
                        $indiibefore->ovi_date = $indicator->end;
                        $indiibefore->before_after = "before";
                        $indiibefore->year = $i;
                        $indiibefore->created_at = $indicator->created_at;
                        $indiibefore->updated_at = $indicator->updated_at;
                        $indiibefore->baseline_target = $indicator->baseline_target;
                        $indiibefore->project_target = $indicator->project_target;

                        $indiibefore->save();

                        $indiibefore = $indiibefore->replicate();
                        $indiibefore->before_after = "after";

                        $indiibefore->save();
                    }

                }

            }

        }

    }

}
