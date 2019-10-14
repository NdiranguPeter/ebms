<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Activityafter;
use App\Outcome;
use App\Output;
use App\Project;
use App\Unit;
use Illuminate\Http\Request;

class ActivitiesAfterController extends Controller
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
        $id = $request->input('id');
        $output_id = $request->input('output_id');
        $year = $request->input('the_year');
        $before_after = $request->input('before_after');

        $actyafter = Activityafter::where('activity_id', $id)->where('year', $year)->where('before_after', $before_after)->first();
        if ($actyafter === null) {
            $activityafter = new Activityafter;

        } else {

            $activityafter = $actyafter;

        }

        $activityafter->activity_id = $request->input('id');
        $activityafter->duration = $request->input('duration');

        $sbudget = $request->input('budget_start');
        $fbudget = $request->input('budget_end');

        $budget_diff = $sbudget - $fbudget;

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

        $activityafter->zero_two_male = $zero_two_male;
        $activityafter->three_five_male = $three_five_male;
        $activityafter->six_twelve_male = $six_twelve_male;
        $activityafter->thirteen_seventeen_male = $thirteen_seventeen_male;
        $activityafter->eigteen_twentyfive_male = $eigteen_twentyfive_male;
        $activityafter->twentysix_fourtynine_male = $twentysix_fourtynine_male;
        $activityafter->fifty_fiftynine_male = $fifty_fiftynine_male;
        $activityafter->sixty_sixtynine_male = $sixty_sixtynine_male;
        $activityafter->seventy_seventynine_male = $seventy_seventynine_male;
        $activityafter->above_eighty_male = $above_eighty_male;

        $activityafter->zero_two_female = $zero_two_female;
        $activityafter->three_five_female = $three_five_female;
        $activityafter->six_twelve_female = $six_twelve_female;
        $activityafter->thirteen_seventeen_female = $thirteen_seventeen_female;
        $activityafter->eigteen_twentyfive_female = $eigteen_twentyfive_female;
        $activityafter->twentysix_fourtynine_female = $twentysix_fourtynine_female;
        $activityafter->fifty_fiftynine_female = $fifty_fiftynine_female;
        $activityafter->sixty_sixtynine_female = $sixty_sixtynine_female;
        $activityafter->seventy_seventynine_female = $seventy_seventynine_female;
        $activityafter->above_eighty_female = $above_eighty_female;

        $activityafter->total_beneficiaries = $totol_beneficiaries;
        $activityafter->total_male = $total_male;
        $activityafter->total_female = $total_female;

        $activityafter->budget = $fbudget;
        $activityafter->budget_diff = $budget_diff;
        $activityafter->person_responsible = $request->input('person_responsible');
        $activityafter->start = $request->input('start');
        $activityafter->end = $request->input('end');

        $years = $request->input('years');
        $months = $request->input('months');

        $activityafter->jan = $request->input('jan');
        $activityafter->feb = $request->input('feb');
        $activityafter->mar = $request->input('mar');
        $activityafter->apr = $request->input('apr');
        $activityafter->may = $request->input('may');
        $activityafter->jun = $request->input('jun');
        $activityafter->jul = $request->input('jul');
        $activityafter->aug = $request->input('aug');
        $activityafter->sep = $request->input('sep');
        $activityafter->oct = $request->input('oct');
        $activityafter->nov = $request->input('nov');
        $activityafter->dec = $request->input('dec');

        $activityafter->year = $request->input('the_year');
        $activityafter->before_after = $request->input('before_after');
        $activityafter->indirect_male = $request->input('indirect_male');
        $activityafter->indirect_female = $request->input('indirect_female');

        $activityafter->years = $years;

        $activityafter->save();

        $activities = Activity::where('output_id', $output_id)->paginate(10);

        $output = Output::find($output_id);
        $outcome = Outcome::find($output->outcome_id);

        $project = Project::find($outcome->project_id);

        $units = Unit::all();

        return redirect('/activities/' . $project->id)->with(['project' => $project, 'activities' => $activities, 'units' => $units, 'output' => $output, 'outcome' => $outcome, 'success' => 'activity updated']);

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
