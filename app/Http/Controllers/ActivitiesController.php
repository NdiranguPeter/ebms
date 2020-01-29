<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Activityafter;
use App\Activityscoring;
use App\Currency;
use App\Deliverable;
use App\Outcome;
use App\Output;
use App\Partner;
use App\Project;
use App\Sector;
use App\Unit;
use App\Challenge;
use DateTime;
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
            'deliverables' => 'required',
            'target_baseline' => 'required',
            'end' => 'after:start',

        ]);

        $user_id = auth()->user()->id;

        $output_id = $request->input('id');
        $activity_name = strip_tags($request->input('activity'));
        $activity_scoring = $request->input('scoring');
        $activity_unit = 26;
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

        $datetime1 = new DateTime($activity->start);
        $datetime2 = new DateTime($activity->end);

        $startyear = $datetime1->format('Y');
        $startmonth = $datetime1->format('m');

        $endyear = $datetime2->format('Y');
        $endmonth = $datetime2->format('m');

        if ($activity_tb >= $totol_beneficiaries) {
            $output = Output::findOrFail($output_id);
$outcome = Outcome::findOrFail($output->outcome_id);
$project = Project::findOrFail($outcome->project_id);

            $uyp = \DB::table('projects')
                ->join('outcomes', 'outcomes.project_id', 'projects.id')
                ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
                ->join('activities', 'activities.output_id', 'outputs.id')
                ->select('activities.*')->where('projects.id', $project->id)
                ->get();

$order = count($uyp);
$activity->order = $order+1;


            $activity->save();

            if ($startyear == $endyear) {

                for ($y = 1; $y <= 12; $y++) {
                    $activitybefore = new Activityafter();
                    $activitybefore->activity_id = $activity->id;
                    $activitybefore->total_beneficiaries = 0;
                    $activitybefore->total_male = 0;
                    $activitybefore->total_female = 0;
                    $activitybefore->budget = $activity->budget;
                    $activitybefore->budget_diff = 0;
                    $activitybefore->person_responsible = auth()->user()->name;
                    $activitybefore->duration = $activity->duration;

                    $activitybefore->zero_two_male = $zero_two_male;
                    $activitybefore->three_five_male = $three_five_male;
                    $activitybefore->six_twelve_male = $six_twelve_male;
                    $activitybefore->thirteen_seventeen_male = $thirteen_seventeen_male;
                    $activitybefore->eigteen_twentyfive_male = $eigteen_twentyfive_male;
                    $activitybefore->twentysix_fourtynine_male = $twentysix_fourtynine_male;
                    $activitybefore->fifty_fiftynine_male = $fifty_fiftynine_male;
                    $activitybefore->sixty_sixtynine_male = $sixty_sixtynine_male;
                    $activitybefore->seventy_seventynine_male = $seventy_seventynine_male;
                    $activitybefore->above_eighty_male = $above_eighty_male;
                    $activitybefore->zero_two_female = $zero_two_female;
                    $activitybefore->three_five_female = $three_five_female;
                    $activitybefore->six_twelve_female = $six_twelve_female;
                    $activitybefore->thirteen_seventeen_female = $thirteen_seventeen_female;
                    $activitybefore->eigteen_twentyfive_female = $eigteen_twentyfive_female;
                    $activitybefore->twentysix_fourtynine_female = $twentysix_fourtynine_female;
                    $activitybefore->fifty_fiftynine_female = $fifty_fiftynine_female;
                    $activitybefore->sixty_sixtynine_female = $sixty_sixtynine_female;
                    $activitybefore->seventy_seventynine_female = $seventy_seventynine_female;
                    $activitybefore->above_eighty_female = $above_eighty_female;
                    $activitybefore->indirect_male = $activity->indirect_male;
                    $activitybefore->indirect_female = $activity->indirect_female;
                   


                    $activitybefore->start = $activity->start;
                    $activitybefore->end = $activity->end;
                    $activitybefore->month = $y;
                    $activitybefore->jan = 0;
                    $activitybefore->feb = 0;
                    $activitybefore->mar = 0;
                    $activitybefore->apr = 0;
                    $activitybefore->may = 0;
                    $activitybefore->jun = 0;
                    $activitybefore->jul = 0;
                    $activitybefore->aug = 0;
                    $activitybefore->sep = 0;
                    $activitybefore->oct = 0;
                    $activitybefore->nov = 0;
                    $activitybefore->dec = 0;
                    $activitybefore->before_after = "before";
                    $activitybefore->year = $startyear;
                    $activitybefore->save();
                    $activitybefore = $activitybefore->replicate();
                    $activitybefore->before_after = "after";
                    $activitybefore->save();

                }

            }
            if ($startyear != $endyear) {
                for ($i = $startyear; $i <= $endyear; $i++) {
                    for ($y = 1; $y <= 12; $y++) {
                        $activitybefore = new Activityafter();
                        $activitybefore->activity_id = $activity->id;
                        $activitybefore->total_beneficiaries = $activity->total_beneficiaries;
                        $activitybefore->total_male = $activity->total_male;
                        $activitybefore->total_female = $activity->total_female;
                        $activitybefore->budget = $activity->budget;
                        $activitybefore->budget_diff = 0;
                        $activitybefore->person_responsible = auth()->user()->name;
                        $activitybefore->duration = $activity->duration;
                        $activitybefore->zero_two_male = $zero_two_male;
                        $activitybefore->three_five_male = $three_five_male;
                        $activitybefore->six_twelve_male = $six_twelve_male;
                        $activitybefore->thirteen_seventeen_male = $thirteen_seventeen_male;
                        $activitybefore->eigteen_twentyfive_male = $eigteen_twentyfive_male;
                        $activitybefore->twentysix_fourtynine_male = $twentysix_fourtynine_male;
                        $activitybefore->fifty_fiftynine_male = $fifty_fiftynine_male;
                        $activitybefore->sixty_sixtynine_male = $sixty_sixtynine_male;
                        $activitybefore->seventy_seventynine_male = $seventy_seventynine_male;
                        $activitybefore->above_eighty_male = $above_eighty_male;
                        $activitybefore->zero_two_female = $zero_two_female;
                        $activitybefore->three_five_female = $three_five_female;
                        $activitybefore->six_twelve_female = $six_twelve_female;
                        $activitybefore->thirteen_seventeen_female = $thirteen_seventeen_female;
                        $activitybefore->eigteen_twentyfive_female = $eigteen_twentyfive_female;
                        $activitybefore->twentysix_fourtynine_female = $twentysix_fourtynine_female;
                        $activitybefore->fifty_fiftynine_female = $fifty_fiftynine_female;
                        $activitybefore->sixty_sixtynine_female = $sixty_sixtynine_female;
                        $activitybefore->seventy_seventynine_female = $seventy_seventynine_female;
                        $activitybefore->above_eighty_female = $above_eighty_female;
                        $activitybefore->indirect_male = $activity->indirect_male;
                        $activitybefore->indirect_female = $activity->indirect_female;
                       

                        $activitybefore->start = $activity->start;
                        $activitybefore->end = $activity->end;
                        $activitybefore->month = $y;
                        $activitybefore->jan = 0;
                        $activitybefore->feb = 0;
                        $activitybefore->mar = 0;
                        $activitybefore->apr = 0;
                        $activitybefore->may = 0;
                        $activitybefore->jun = 0;
                        $activitybefore->jul = 0;
                        $activitybefore->aug = 0;
                        $activitybefore->sep = 0;
                        $activitybefore->oct = 0;
                        $activitybefore->nov = 0;
                        $activitybefore->dec = 0;
                        $activitybefore->before_after = "before";
                        $activitybefore->year = $i;

                        $activitybefore->save();

                        $activitybefore = $activitybefore->replicate();
                        $activitybefore->before_after = "after";
                        $activitybefore->save();

                        $startyear++;

                    }
                }

            }

            $activities = \DB::table('outcomes')

                ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
                ->join('activities', 'activities.output_id', 'outputs.id')
                ->select('activities.*')->where('outputs.id', $output_id)
                ->paginate(10);

            $output = Output::findOrFail($output_id);
            $outcome = Outcome::findOrFail($output->outcome_id);
            $project = Project::findOrFail($outcome->project_id);

            $units = Unit::all();



            return redirect('/activities/' . $project->id)->with(['project' => $project, 'activities' => $activities, 'units' => $units, 'output' => $output, 'outcome' => $outcome, 'success' => 'Activity created']);

        } else {
            $units = Unit::all();
            $sectors = Sector::all();
            $output = Output::findOrFail($output_id);
            $outcome = Outcome::findOrFail($output->outcome_id);
            $project = Project::findOrFail($outcome->project_id);
            $deliverables = Deliverable::all();

            return view('activities.create')->with(['deliverables' => $deliverables, 'sectors' => $sectors, 'project' => $project, 'output' => $output, 'outcome' => $outcome, 'units' => $units, 'error' => 'Total Gender/Age distribution -' . $totol_beneficiaries . ' is greater than total beneficiaries target - ' . $activity_tb]);

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

        $project = Project::findOrFail($id);

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

             $activitiescount = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->join('activities', 'activities.output_id', 'outputs.id')
            ->select('activities.*')->where('projects.id', $id)
            ->orderBy('created_at', 'desc')
            ->get();


            $numbering = count($activitiescount);

        $units = Unit::all();

        return view('activities.show')->with(['numbering'=>$numbering,'project' => $project, 'activities' => $activities, 'units' => $units, 'output' => $output, 'outcome' => $outcome, 'success' => 'Activity created']);

    }

    public function showOutputActivities($id)
    {

        $output = Output::findOrFail($id);
        $outcome = Outcome::findOrFail($output->outcome_id);
        $project = Project::findOrFail($outcome->project_id);
        $activities = Activity::where('output_id', $id)->paginate(10);

        return view('activities.outputactivities')->with(['project' => $project, 'activities' => $activities, 'output' => $output, 'outcome' => $outcome, 'success' => 'Activity created']);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $activity = Activity::findOrFail($id);
        
        $units = Unit::all();
        $output = Output::findOrFail($activity->output_id);

        $outcome = Outcome::findOrFail($output->outcome_id);
        
        $partners = Partner::all();
        $currencies = Currency::all();
        // $cur = Currency::findOrFail($activity->currency);

        $uni = Unit::findOrFail($activity->unit);

        $activity->unit = $uni->name;
        $activity->unit_id = $uni->id;
        $project = Project::findOrFail($outcome->project_id);
        

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

        $activity = Activity::findOrFail($id);
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

            $output = Output::findOrFail($output_id);
            $outcome = Outcome::findOrFail($output->outcome_id);

            $units = Unit::all();
            $project = Project::findOrFail($outcome->project_id);

            return redirect('/activities/' . $project->id)->with(['project' => $project, 'activities' => $activities, 'units' => $units, 'output' => $output, 'outcome' => $outcome, 'success' => 'Activity updated']);

        } else {
            $activity = Activity::findOrFail($id);
            $units = Unit::all();
            $output = Output::findOrFail($activity->id);
            $outcome = Outcome::findOrFail($output->outcome_id);
            $project = Project::findOrFail($outcome->project_id);

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
        $activity = Activity::findOrFail($id);

        $output_id = $activity->output_id;


        $activities = Activity::where('output_id', $output_id)->get();
        $output = Output::findOrFail($output_id);
        $outcome = Outcome::findOrFail($output->outcome_id);

        $units = Unit::all();
        $project = Project::findOrFail($outcome->project_id);

        $dsg = \DB::table('projects')
    ->join('outcomes', 'outcomes.project_id', 'projects.id')
    ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
    ->join('activities', 'activities.output_id', 'outputs.id')
    ->select('activities.*')->where('projects.id', $project->id)
    ->get();
    foreach($dsg as $ds){
        $acr = Activity::findOrFail($ds->id);
        if($ds->order > $activity->order){
            $acr->order = $acr->order-1;
$acr->save();

        }
    }

    
$activity->delete();

$indafter = Activityafter::where('activity_id', $id)->delete();



        return redirect('/activities/' . $project->id)->with(['project' => $project, 'activities' => $activities, 'units' => $units, 'output' => $output, 'outcome' => $outcome, 'error' => 'Activity deleted']);

    }

    public function createActivity($id)
    {
        // $project = Project::findOrFail($id);
        $units = Unit::all();
        $output = Output::findOrFail($id);
        $outcome = Outcome::findOrFail($output->outcome_id);
        $project = Project::findOrFail($outcome->project_id);
        $partners = Partner::all();
        $currecies = Currency::all();
        $deliverables = Deliverable::all();
        $activityscoring = Activityscoring::all();

        return view('activities.create')->with(['activityscoring' => $activityscoring, 'deliverables' => $deliverables, 'project' => $project, 'partners' => $partners, 'output' => $output, 'outcome' => $outcome, 'units' => $units]);

    }
    public function after($id)
    {

        
        $before_after = 'after';
        $act = Activity::findOrFail($id);
        
$challenges = Challenge::where('activity_id', $id)->get();


        $datetime1 = new DateTime($act->start);
        $startyear = $datetime1->format('Y');
        $startmonth = $datetime1->format('m');
        $month = $startmonth;

        $activity = Activityafter::where('activity_id', $id)->where('month', $startmonth)->where('year', $startyear)->where('before_after', $before_after)->first();

        $output = Output::findOrFail($act->output_id);
        $outcome = Outcome::findOrFail($output->outcome_id);
        $project = Project::findOrFail($outcome->project_id);

        $units = Unit::all();


        return view('activities.after')->with(['units'=>$units, 'challenges'=>$challenges,'month' => $month, 'project' => $project, 'activity' => $activity, 'act' => $act, 'yr' => $startyear, 'before_after' => $before_after]);

    }

    public function before($id)
    {

        $before_after = 'before';
        $act = Activity::findOrFail($id);

        $datetime1 = new DateTime($act->start);
        $startyear = $datetime1->format('Y');
        $startmonth = $datetime1->format('m');
        $month = $startmonth;

        $activity = Activityafter::where('activity_id', $id)->where('month', $startmonth)->where('year', $startyear)->where('before_after', $before_after)->first();

        $output = Output::findOrFail($act->output_id);
        $outcome = Outcome::findOrFail($output->outcome_id);
        $project = Project::findOrFail($outcome->project_id);

        // return view('activities.after')->with(['before_after' => $before_after, 'indicator' => $indicator, 'ind' => $ind, 'yr' => $startyear]);
$units = Unit::all();

        return view('activities.after')->with(['units'=>$units, 'month' => $month, 'project' => $project, 'activity' => $activity, 'act' => $act, 'yr' => $startyear, 'before_after' => $before_after]);

    }

    public function before2(Request $request)
    {

        $before_after = $request->input('before_after');
        $month = $request->input('month');

        $year = $request->input('year');
        $act = Activity::findOrFail($request->activityID);

        $datetime1 = new DateTime($act->start);
        $startyear = $datetime1->format('Y');

        $datetime2 = new DateTime($act->end);
        $endyear = $datetime2->format('Y');
        $startmonth = $datetime1->format('m');

        $yr = $request->year;

        if ($year == "") {
            $year = $startyear;
            $yr = $startyear;

        }
        if ($month == "") {
            $month = $startmonth;
        }

        $activity = Activityafter::where('month', $month)->where('activity_id', $request->activityID)->where('year', $year)->where('before_after', $before_after)->first();

        $output = Output::findOrFail($act->output_id);
        $outcome = Outcome::findOrFail($output->outcome_id);
        $project = Project::findOrFail($outcome->project_id);

        if ($request->year > $startyear) {
            $activity->start = $request->year . '-01-01';
        }
$units = Unit::all();
        
$challenges = Challenge::where('activity_id', $act->id)->get();


        return view('activities.after')->with(['units'=>$units,'challenges'=>$challenges,'month' => $month, 'project' => $project, 'activity' => $activity, 'act' => $act, 'yr' => $yr, 'before_after' => $before_after]);
    }

}
