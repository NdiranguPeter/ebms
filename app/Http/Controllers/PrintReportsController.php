<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Activityafter;

use DateTime;

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
        $activities = Activity::all();


        foreach ($activities as $activity) {

           $datetime1 = new DateTime($activity->start);
        $datetime2 = new DateTime($activity->end);

        $startyear = $datetime1->format('Y');
        $startmonth = $datetime1->format('m');

        $endyear = $datetime2->format('Y');
        $endmonth = $datetime2->format('m');

            if ($startyear == $endyear) {
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

                    $activitybefore->zero_two_male = $activity->zero_two_male;
                    $activitybefore->three_five_male = $activity->three_five_male;
                    $activitybefore->six_twelve_male = $activity->six_twelve_male;
                    $activitybefore->thirteen_seventeen_male = $activity->thirteen_seventeen_male;
                    $activitybefore->eigteen_twentyfive_male = $activity->eigteen_twentyfive_male;
                    $activitybefore->twentysix_fourtynine_male = $activity->twentysix_fourtynine_male;
                    $activitybefore->fifty_fiftynine_male = $activity->fifty_fiftynine_male;
                    $activitybefore->sixty_sixtynine_male = $activity->sixty_sixtynine_male;
                    $activitybefore->seventy_seventynine_male = $activity->seventy_seventynine_male;
                    $activitybefore->above_eighty_male = $activity->above_eighty_male;
                    $activitybefore->zero_two_female = $activity->zero_two_female;
                    $activitybefore->three_five_female = $activity->three_five_female;
                    $activitybefore->six_twelve_female = $activity->six_twelve_female;
                    $activitybefore->thirteen_seventeen_female = $activity->thirteen_seventeen_female;
                    $activitybefore->eigteen_twentyfive_female = $activity->eigteen_twentyfive_female;
                    $activitybefore->twentysix_fourtynine_female = $activity->twentysix_fourtynine_female;
                    $activitybefore->fifty_fiftynine_female = $activity->fifty_fiftynine_female;
                    $activitybefore->sixty_sixtynine_female = $activity->sixty_sixtynine_female;
                    $activitybefore->seventy_seventynine_female = $activity->seventy_seventynine_female;
                    $activitybefore->above_eighty_female = $activity->above_eighty_female;
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
                        $activitybefore->zero_two_male = $activity->zero_two_male;
                        $activitybefore->three_five_male = $activity->three_five_male;
                        $activitybefore->six_twelve_male = $activity->six_twelve_male;
                        $activitybefore->thirteen_seventeen_male = $activity->thirteen_seventeen_male;
                        $activitybefore->eigteen_twentyfive_male = $activity->eigteen_twentyfive_male;
                        $activitybefore->twentysix_fourtynine_male = $activity->twentysix_fourtynine_male;
                        $activitybefore->fifty_fiftynine_male = $activity->fifty_fiftynine_male;
                        $activitybefore->sixty_sixtynine_male = $activity->sixty_sixtynine_male;
                        $activitybefore->seventy_seventynine_male = $activity->seventy_seventynine_male;
                        $activitybefore->above_eighty_male = $activity->above_eighty_male;
                        $activitybefore->zero_two_female = $activity->zero_two_female;
                        $activitybefore->three_five_female = $activity->three_five_female;
                        $activitybefore->six_twelve_female = $activity->six_twelve_female;
                        $activitybefore->thirteen_seventeen_female = $activity->thirteen_seventeen_female;
                        $activitybefore->eigteen_twentyfive_female = $activity->eigteen_twentyfive_female;
                        $activitybefore->twentysix_fourtynine_female = $activity->twentysix_fourtynine_female;
                        $activitybefore->fifty_fiftynine_female = $activity->fifty_fiftynine_female;
                        $activitybefore->sixty_sixtynine_female = $activity->sixty_sixtynine_female;
                        $activitybefore->seventy_seventynine_female = $activity->seventy_seventynine_female;
                        $activitybefore->above_eighty_female = $activity->above_eighty_female;
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
