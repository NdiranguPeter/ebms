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
        $year = $request->input('year');
        $month = $request->input('month');
        $before_after = $request->input('before_after');

        $cativityafter = Activityafter::where('activity_id', $id)->where('month', $month)->where('year', $year)->where('before_after', $before_after)->first();

        $cativityafter->zero_two_male = $request->input('zero_two_male');
        $cativityafter->three_five_male = $request->input('three_five_male');
        $cativityafter->six_twelve_male = $request->input('six_twelve_male');
        $cativityafter->thirteen_seventeen_male = $request->input('thirteen_seventeen_male');
        $cativityafter->eigteen_twentyfive_male = $request->input('eigteen_twentyfive_male');
        $cativityafter->twentysix_fourtynine_male = $request->input('twentysix_fourtynine_male');
        $cativityafter->fifty_fiftynine_male = $request->input('fifty_fiftynine_male');
        $cativityafter->sixty_sixtynine_male = $request->input('sixty_sixtynine_male');
        $cativityafter->seventy_seventynine_male = $request->input('seventy_seventynine_male');
        $cativityafter->above_eighty_male = $request->input('above_eighty_male');
        $cativityafter->zero_two_female = $request->input('zero_two_female');
        $cativityafter->three_five_female = $request->input('three_five_female');
        $cativityafter->six_twelve_female = $request->input('six_twelve_female');
        $cativityafter->thirteen_seventeen_female = $request->input('thirteen_seventeen_female');
        $cativityafter->eigteen_twentyfive_female = $request->input('eigteen_twentyfive_female');
        $cativityafter->twentysix_fourtynine_female = $request->input('twentysix_fourtynine_female');
        $cativityafter->fifty_fiftynine_female = $request->input('fifty_fiftynine_female');
        $cativityafter->sixty_sixtynine_female = $request->input('sixty_sixtynine_female');
        $cativityafter->seventy_seventynine_female = $request->input('seventy_seventynine_female');
        $cativityafter->above_eighty_female = $request->input('above_eighty_female');
        $cativityafter->indirect_male = $request->input('indirect_male');
        $cativityafter->indirect_female = $request->input('indirect_female');
        $cativityafter->disabled_male = $request->input('disabled_male');
        $cativityafter->disabled_female = $request->input('disabled_female');

        $cativityafter->total_female = $cativityafter->zero_two_male + $cativityafter->three_five_male + $cativityafter->six_twelve_male + $cativityafter->thirteen_seventeen_male + $cativityafter->eigteen_twentyfive_male + $cativityafter->twentysix_fourtynine_male + $cativityafter->fifty_fiftynine_male + $cativityafter->sixty_sixtynine_male + $cativityafter->above_eighty_male + $cativityafter->seventy_seventynine_male;
        $cativityafter->total_male = $cativityafter->zero_two_female + $cativityafter->three_five_female + $cativityafter->six_twelve_female + $cativityafter->thirteen_seventeen_female + $cativityafter->eigteen_twentyfive_female + $cativityafter->twentysix_fourtynine_female + $cativityafter->fifty_fiftynine_female + $cativityafter->sixty_sixtynine_female + $cativityafter->above_eighty_female + $cativityafter->seventy_seventynine_female;

        $cativityafter->total_beneficiaries = $request->input('achieved');
        $cativityafter->budget = $request->input('cost');
        $cativityafter->save();      
        
        $activity = Activity::find($cativityafter->activity_id);
        $output = Output::find($activity->output_id);
        $outcome = Outcome::find($output->outcome_id);
        $project = Project::find($outcome->project_id);
        $units = Unit::all();

        return redirect('/activities/' . $project->id);

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
