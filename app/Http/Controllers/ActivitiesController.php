<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Activityafter;
use App\Currency;
use App\Deliverable;
use App\Outcome;
use App\Output;
use App\Partner;
use App\Project;
use App\Unit;
use App\Challenge;
use App\Sector;

use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::all();
        $units = Unit::all();

        return view('activities.index')->with(['activities' => $activities, 'units' => $units]);

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
            'activity' => 'required',
            'scoring' => 'required',
            'unit' => 'required',
            'target_baseline' => 'required',

        ]);

        $user_id = auth()->user()->id;

        $output_id = $request->input('id');
        $activity_name = strip_tags($request->input('activity'));
        $activity_scoring = $request->input('scoring');
        $activity_unit = $request->input('unit');
        $start = strtotime($request->input('start'));
        $end = strtotime($request->input('end'));
        $sec = $end - $start;
        $activity_tb = $request->input('project_target');
        $activity_currency = $request->input('currency');
        $zero_two_male = $request->input('zero_two_male');
        $three_five_male = $request->input('three_five_male');
        $six_twelve_male = $request->input('six_twelve_male');
        $thirteen_seventeen_male = $request->input('thirteen_seventeen_male');
        $eigteen_twentyfive_male = $request->input('eigteen_twentyfive_male');
        $twentysix_fourtynine_male = $request->input('twentysix_fourtynine_male');
        $fifty_fiftynine_male = $request->input('fifty_fiftynine_male');
        $sixty_sixtynine_male = $request->input('sixty_sixtynine_male');
        $seventy_seventynine_male = $request->input('seventy_seventynine_male');
        $above_eighty_male = $request->input('above_eighty_male');

        $total_male = $zero_two_male + $three_five_male + $six_twelve_male + $thirteen_seventeen_male + $eigteen_twentyfive_male + $twentysix_fourtynine_male + $fifty_fiftynine_male + $sixty_sixtynine_male + $seventy_seventynine_male + $above_eighty_male;

        $zero_two_female = $request->input('zero_two_female');
        $three_five_female = $request->input('three_five_female');
        $six_twelve_female = $request->input('six_twelve_female');
        $thirteen_seventeen_female = $request->input('thirteen_seventeen_female');
        $eigteen_twentyfive_female = $request->input('eigteen_twentyfive_female');
        $twentysix_fourtynine_female = $request->input('twentysix_fourtynine_female');
        $fifty_fiftynine_female = $request->input('fifty_fiftynine_female');
        $sixty_sixtynine_female = $request->input('sixty_sixtynine_female');
        $seventy_seventynine_female = $request->input('seventy_seventynine_female');
        $above_eighty_female = $request->input('above_eighty_female');

        $total_female = $zero_two_female + $three_five_female + $six_twelve_female + $thirteen_seventeen_female + $eigteen_twentyfive_female + $twentysix_fourtynine_female + $fifty_fiftynine_female + $sixty_sixtynine_female + $seventy_seventynine_female + $above_eighty_female;
        $totol_beneficiaries = $total_male + $total_female;

        $activity = new activity();
        $activity->user_id = $user_id;
        $activity->output_id = $output_id;
        $activity->name = $activity_name;
        $activity->scoring = $activity_scoring;
        $activity->unit = $activity_unit;
        $activity->baseline_target = $activity_tb;

        $activity->start = $request->input('start');
        $activity->end = $request->input('end');
        $activity->duration = $sec / 86400;

        $activity->partners = 'Islamic';
        $activity->person_responsible = $request->input('person_responsible');

        $activity->budget_code = $request->input('budget_code');

        $activity->budget_unit = $request->input('budget_unit');
        $activity->no_unit = $request->input('no_unit');
        $activity->cost_unit = $request->input('cost_unit');

        $activity->budget = $activity->cost_unit * $activity->no_unit;

        $activity->project_target = $request->input('project_target');
        $activity->currency = $activity_currency;
        $activity->indirect_male = $request->input('indirect_male');
        $activity->indirect_female = $request->input('indirect_female');
        $activity->disabled_male = $request->input('disabled_male');
        $activity->disabled_female = $request->input('disabled_female');

        $activity->zero_two_male = $zero_two_male;
        $activity->three_five_male = $three_five_male;
        $activity->six_twelve_male = $six_twelve_male;
        $activity->thirteen_seventeen_male = $thirteen_seventeen_male;
        $activity->eigteen_twentyfive_male = $eigteen_twentyfive_male;
        $activity->twentysix_fourtynine_male = $twentysix_fourtynine_male;
        $activity->fifty_fiftynine_male = $fifty_fiftynine_male;
        $activity->sixty_sixtynine_male = $sixty_sixtynine_male;
        $activity->seventy_seventynine_male = $seventy_seventynine_male;
        $activity->above_eighty_male = $above_eighty_male;

        $activity->zero_two_female = $zero_two_female;
        $activity->three_five_female = $three_five_female;
        $activity->six_twelve_female = $six_twelve_female;
        $activity->thirteen_seventeen_female = $thirteen_seventeen_female;
        $activity->eigteen_twentyfive_female = $eigteen_twentyfive_female;
        $activity->twentysix_fourtynine_female = $twentysix_fourtynine_female;
        $activity->fifty_fiftynine_female = $fifty_fiftynine_female;
        $activity->sixty_sixtynine_female = $sixty_sixtynine_female;
        $activity->seventy_seventynine_female = $seventy_seventynine_female;
        $activity->above_eighty_female = $above_eighty_female;

        $activity->total_beneficiaries = $totol_beneficiaries;
        $activity->total_male = $total_male;
        $activity->total_female = $total_female;

        if ($activity_tb >= $totol_beneficiaries) {

            $activity->save();

            $activities = \DB::table('outcomes')

                ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
                ->join('activities', 'activities.output_id', 'outputs.id')
                ->select('activities.*')->where('outputs.id', $output_id)
                ->paginate(10);

            $output = Output::find($output_id);
            $outcome = Outcome::find($output->outcome_id);
            $project = Project::find($outcome->project_id);

            $units = Unit::all();

            return redirect('/activities/' . $project->id)->with(['project' => $project, 'activities' => $activities, 'units' => $units, 'output' => $output, 'outcome' => $outcome, 'success' => 'activity created']);

        } else {
            $units = Unit::all();
            $sectors = Sector::all();
            $output = Output::find($output_id);
            $outcome = Outcome::find($output->outcome_id);
            $project = Project::find($outcome->project_id);

            return view('activities.create')->with(['sectors' => $sectors, 'project' => $project, 'output' => $output, 'outcome' => $outcome, 'units' => $units, 'error' => 'Total Gender/Age distribution -' . $totol_beneficiaries . ' is greater than total beneficiaries target - ' . $activity_tb]);

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

        $project = Project::find($id);

        $outcome = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->select('outcomes.*')->where('projects.id', $id)
            ->get();

        $output = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->select('outputs.*')->where('projects.id', $id)
            ->get();

        $activities = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->join('activities', 'activities.output_id', 'outputs.id')
            ->select('activities.*')->where('projects.id', $id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $units = Unit::all();

        return view('activities.show')->with(['project' => $project, 'activities' => $activities, 'units' => $units, 'output' => $output, 'outcome' => $outcome, 'success' => 'activity created']);

    }

    public function showOutputActivities($id)
    {

        $output = Output::find($id);
        $outcome = Outcome::find($output->outcome_id);
        $project = Project::find($outcome->project_id);
        $activities = Activity::where('output_id', $id)->paginate(10);

        return view('activities.outputactivities')->with(['project' => $project, 'activities' => $activities, 'output' => $output, 'outcome' => $outcome, 'success' => 'activity created']);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activity = Activity::find($id);
        $units = Unit::all();
        $output = Output::find($activity->output_id);

        $outcome = Outcome::find($output->outcome_id);
        $partners = Partner::all();
        $currencies = Currency::all();
        $cur = Currency::find($activity->currency);

        $uni = Unit::find($activity->unit);

        $activity->unit = $uni->name;
        $activity->unit_id = $uni->id;
        $project = Project::find($outcome->project_id);

        return view('activities.edit')->with(['project' => $project, 'currencies' => $currencies, 'partners' => $partners, 'activity' => $activity, 'output' => $output, 'outcome' => $outcome, 'units' => $units]);
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
            'activity' => 'required',
            'scoring' => 'required',
            'unit' => 'required',
            'target_baseline' => 'required',

        ]);

        $user_id = auth()->user()->id;

        $output_id = $request->input('id');

        $activity_name = strip_tags($request->input('activity'));
        $activity_scoring = $request->input('scoring');
        $activity_unit = $request->input('unit');
        $start = strtotime($request->input('start'));
        $end = strtotime($request->input('end'));
        $sec = $end - $start;
        $activity_tb = $request->input('project_target');

        $zero_two_male = $request->input('zero_two_male');
        $three_five_male = $request->input('three_five_male');
        $six_twelve_male = $request->input('six_twelve_male');
        $thirteen_seventeen_male = $request->input('thirteen_seventeen_male');
        $eigteen_twentyfive_male = $request->input('eigteen_twentyfive_male');
        $twentysix_fourtynine_male = $request->input('twentysix_fourtynine_male');
        $fifty_fiftynine_male = $request->input('fifty_fiftynine_male');
        $sixty_sixtynine_male = $request->input('sixty_sixtynine_male');
        $seventy_seventynine_male = $request->input('seventy_seventynine_male');
        $above_eighty_male = $request->input('above_eighty_male');

        $total_male = $zero_two_male + $three_five_male + $six_twelve_male + $thirteen_seventeen_male + $eigteen_twentyfive_male + $twentysix_fourtynine_male + $fifty_fiftynine_male + $sixty_sixtynine_male + $seventy_seventynine_male + $above_eighty_male;

        $zero_two_female = $request->input('zero_two_female');
        $three_five_female = $request->input('three_five_female');
        $six_twelve_female = $request->input('six_twelve_female');
        $thirteen_seventeen_female = $request->input('thirteen_seventeen_female');
        $eigteen_twentyfive_female = $request->input('eigteen_twentyfive_female');
        $twentysix_fourtynine_female = $request->input('twentysix_fourtynine_female');
        $fifty_fiftynine_female = $request->input('fifty_fiftynine_female');
        $sixty_sixtynine_female = $request->input('sixty_sixtynine_female');
        $seventy_seventynine_female = $request->input('seventy_seventynine_female');
        $above_eighty_female = $request->input('above_eighty_female');

        $total_female = $zero_two_female + $three_five_female + $six_twelve_female + $thirteen_seventeen_female + $eigteen_twentyfive_female + $twentysix_fourtynine_female + $fifty_fiftynine_female + $sixty_sixtynine_female + $seventy_seventynine_female + $above_eighty_female;
        $totol_beneficiaries = $total_male + $total_female;

        $activity = Activity::find($id);
        $activity->user_id = $user_id;
        $activity->output_id = $output_id;
        $activity->name = $activity_name;
        $activity->scoring = $activity_scoring;
        $activity->unit = $activity_unit;
        $activity->baseline_target = $activity_tb;

        $activity->start = $request->input('start');
        $activity->end = $request->input('end');
        $activity->duration = $sec / 86400;

        $activity->partners = $request->input('partners');
        $activity->person_responsible = $request->input('person_responsible');
        $activity->budget_code = $request->input('budget_code');
        $activity->budget_unit = $request->input('budget_unit');
        $activity->no_unit = $request->input('no_unit');
        $activity->cost_unit = $request->input('cost_unit');

        $activity->budget = $activity->cost_unit * $activity->no_unit;

        $activity->project_target = $request->input('project_target');
        $activity->currency = $request->input('currency');
        $activity->indirect_male = $request->input('indirect_male');
        $activity->indirect_female = $request->input('indirect_female');
        $activity->disabled_male = $request->input('disabled_male');
        $activity->disabled_female = $request->input('disabled_female');

        $activity->zero_two_male = $zero_two_male;
        $activity->three_five_male = $three_five_male;
        $activity->six_twelve_male = $six_twelve_male;
        $activity->thirteen_seventeen_male = $thirteen_seventeen_male;
        $activity->eigteen_twentyfive_male = $eigteen_twentyfive_male;
        $activity->twentysix_fourtynine_male = $twentysix_fourtynine_male;
        $activity->fifty_fiftynine_male = $fifty_fiftynine_male;
        $activity->sixty_sixtynine_male = $sixty_sixtynine_male;
        $activity->seventy_seventynine_male = $seventy_seventynine_male;
        $activity->above_eighty_male = $above_eighty_male;

        $activity->zero_two_female = $zero_two_female;
        $activity->three_five_female = $three_five_female;
        $activity->six_twelve_female = $six_twelve_female;
        $activity->thirteen_seventeen_female = $thirteen_seventeen_female;
        $activity->eigteen_twentyfive_female = $eigteen_twentyfive_female;
        $activity->twentysix_fourtynine_female = $twentysix_fourtynine_female;
        $activity->fifty_fiftynine_female = $fifty_fiftynine_female;
        $activity->sixty_sixtynine_female = $sixty_sixtynine_female;
        $activity->seventy_seventynine_female = $seventy_seventynine_female;
        $activity->above_eighty_female = $above_eighty_female;

        $activity->total_beneficiaries = $totol_beneficiaries;
        $activity->total_male = $total_male;
        $activity->total_female = $total_female;

        if ($activity_tb >= $totol_beneficiaries) {
            $activity->save();

            $activities = \DB::table('outcomes')

                ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
                ->join('activities', 'activities.output_id', 'outputs.id')
                ->select('activities.*')->where('outputs.id', $output_id)
                ->paginate(10);

            $output = Output::find($output_id);
            $outcome = Outcome::find($output->outcome_id);

            $units = Unit::all();
            $project = Project::find($outcome->project_id);

            return redirect('/activities/' . $project->id)->with(['project' => $project, 'activities' => $activities, 'units' => $units, 'output' => $output, 'outcome' => $outcome, 'success' => 'activity updated']);

        } else {
            $activity = Activity::find($id);
            $units = Unit::all();
            $output = Output::find($activity->id);
            $outcome = Outcome::find($output->outcome_id);
            $project = Project::find($outcome->project_id);

            return view('activities.edit')->with(['project' => $project, 'activity' => $activity, 'output' => $output, 'outcome' => $outcome, 'units' => $units, 'error' => 'Total Gender/Age distribution - ' . $totol_beneficiaries . ') is greater than total beneficiaries target -' . $activity_tb]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activity = Activity::find($id);

        $output_id = $activity->output_id;

        $activity->delete();

        $activities = Activity::where('output_id', $output_id)->get();
        $output = Output::find($output_id);
        $outcome = Outcome::find($output->outcome_id);

        $units = Unit::all();
        $project = Project::find($outcome->project_id);

        return redirect('/activities/' . $project->id)->with(['project' => $project, 'activities' => $activities, 'units' => $units, 'output' => $output, 'outcome' => $outcome, 'error' => 'activity deleted']);

    }

    public function createActivity($id)
    {
        // $project = Project::find($id);
        $units = Unit::all();
        $output = Output::find($id);
        $outcome = Outcome::find($output->outcome_id);
        $project = Project::find($outcome->project_id);
        $partners = Partner::all();
        $currecies = Currency::all();
        $deliverables = Deliverable::all();

        return view('activities.create')->with(['deliverables' => $deliverables, 'project' => $project, 'partners' => $partners, 'output' => $output, 'outcome' => $outcome, 'units' => $units]);

    }
    public function after($id)
    {

        $actyafter = Activityafter::where('activity_id', $id)->where('before_after', 'after')->first();
        if ($actyafter === null) {

            $activity = Activity::find($id);
            $output = Output::find($activity->output_id);
            $activity->jan = 0;
            $activity->feb = 0;
            $activity->mar = 0;
            $activity->apr = 0;
            $activity->may = 0;
            $activity->jun = 0;
            $activity->jul = 0;
            $activity->aug = 0;
            $activity->sep = 0;
            $activity->oct = 0;
            $activity->nov = 0;
            $activity->dec = 0;

        } else {

            $activity = Activityafter::where('activity_id', $id)->where('before_after', 'after')->first();
            $act = Activity::find($activity->activity_id);
            $activity->name = $act->name;
            $activity->output_id = $act->output_id;
            $activity->start = $act->start;
            $activity->end = $act->end;
            $activity->id = $act->id;
            $activity->duration = $act->duration;

            $output = Output::find($act->output_id);
        }

        $units = Unit::all();

        $challenges = Challenge::where('activity_id',$id)->get();

        $outcome = Outcome::find($output->outcome_id);

        $project = Project::find($outcome->project_id);
      

        $before_after = 'after';

        return view('activities.after')->with(['project'=>$project, 'challenges'=>$challenges,'before_after' => $before_after, 'activity' => $activity, 'output' => $output, 'outcome' => $outcome, 'units' => $units]);

    }

    public function before($id)
    {

        $actyafter = Activityafter::where('activity_id', $id)->where('before_after', 'before')->first();
      
        if ($actyafter === null) {
            $activity = Activity::find($id);
            $output = Output::find($activity->output_id);
            $activity->jan = 0;
            $activity->feb = 0;
            $activity->mar = 0;
            $activity->apr = 0;
            $activity->may = 0;
            $activity->jun = 0;
            $activity->jul = 0;
            $activity->aug = 0;
            $activity->sep = 0;
            $activity->oct = 0;
            $activity->nov = 0;
            $activity->dec = 0;

        } else {

            $activity = Activityafter::where('activity_id', $id)->where('before_after', 'before')->first();
            $act = Activity::find($activity->activity_id);
            $activity->name = $act->name;
            $activity->output_id = $act->output_id;
            $activity->start = $act->start;
            $activity->end = $act->end;
            $activity->id = $act->id;
            $activity->duration = $act->duration;

            $output = Output::find($act->output_id);
        }

        $units = Unit::all();
        $before_after = 'before';

        $outcome = Outcome::find($output->outcome_id);

         $project = Project::find($outcome->project_id);

             return view('activities.after')->with(['project'=>$project, 'before_after' => $before_after, 'activity' => $activity, 'output' => $output, 'outcome' => $outcome, 'units' => $units]);

    }
}
