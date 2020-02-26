<?php

namespace App\Http\Controllers\API;

use App\Activityafter;
use App\Answer;
use App\AssumptionAfter;
use App\Http\Controllers\Controller;
use App\Indicatorafter;
use App\Option;
use App\Project;
use App\Question;
use App\Risksafter;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{

    public function show($id)
    {

        $survey = auth()->user()->surveys()->find($id);

        // dd($survey);

        $questions = Question::where('survey_id', $survey->id)->orderBy('qn_order', 'asc')->get();
        $qn_options = Option::where('survey_id', $survey->id)->get();

        if ($questions->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => $survey->name . ' doesnt have questions yet',
            ], 400);
        }

        return response()->json($questions);
    }

    public function options($id)
    {

        $survey = auth()->user()->surveys()->find($id);

        $qn_options = Option::where('survey_id', $survey->id)->get();

        if ($qn_options->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => $survey->name . ' doesnt have options yet',
            ], 400);
        }

        return response()->json($qn_options);
    }

    public function survey()
    {

        $surveys = auth()->user()->surveys;

        if ($surveys->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => auth()->user()->name . ' doesnt have any surveys yet',
            ], 400);
        }

        return response()->json($surveys);
    }
    public function project()
    {

        $projects = auth()->user()->projects;

        if ($projects->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => auth()->user()->name . ' doesnt have any surveys yet',
            ], 400);
        }

        return response()->json($projects);
    }
    public function answer(Request $request)
    {
        $qid = $request->qid;

        $answer = Answer::where('qid', $qid)->where('qn_id', $request->qn_id)->get();

        if ($answer->isEmpty()) {
            Answer::create($request->all());
        }
    }

    public function indicatorafter(Request $request)
    {

        $indicatorafter = Indicatorafter::where('indicator_id', $request->id)->where('year', $request->year)->where('month', $request->month)->where('before_after', "after")->first();
        $indicatorafter->monthly_total = $request->achieved;
        $indicatorafter->person_responsible = $request->responsible;
        $indicatorafter->save();
    }

    public function riskafter(Request $request)
    {
        $riskafter = Risksafter::where('risk_id', $request->risk_id)->first();

        if ($riskafter == null) {
            $riskafter = new Risksafter();
        }
        $riskafter->risk_id = $request->risk_id;
        $riskafter->occur = $request->occur;
        $riskafter->impact = $request->impact;
        $riskafter->response = $request->response;
        $riskafter->save();
    }

    public function assumptionafter(Request $request)
    {
        $assumptionafter = AssumptionAfter::where('assumption_id', $request->assumption_id)->first();

        if ($assumptionafter == null) {
            $assumptionafter = new AssumptionAfter();
        }
        $assumptionafter->assumption_id = $request->assumption_id;
        $assumptionafter->occur = $request->occur;
        $assumptionafter->accessed = $request->accessed;
        $assumptionafter->validated = $request->validated;
        $assumptionafter->impact = $request->impact;
        $assumptionafter->response = $request->response;
        $assumptionafter->save();
    }

    public function activityafter(Request $request)
    {

        $activityafter = Activityafter::where('activity_id', $request->activity_id)->where('year', $request->year)->where('month', $request->month)->where('before_after', 'after')->first();
        $activityafter->total_beneficiaries = $request->ta;
        $activityafter->budget = $request->budget;
        $activityafter->remarks = $request->remarks;

        $zero_two_male = $request->zero_two_male;
        $three_five_male = $request->three_five_male;
        $six_twelve_male = $request->six_twelve_male;
        $thirteen_seventeen_male = $request->thirteen_seventeen_male;
        $eigteen_twentyfive_male = $request->eigteen_twentyfive_male;
        $twentysix_fourtynine_male = $request->twentysix_fourtynine_male;
        $fifty_fiftynine_male = $request->fifty_fiftynine_male;
        $sixty_sixtynine_male = $request->sixty_sixtynine_male;
        $seventy_seventynine_male = $request->seventy_seventynine_male;
        $above_eighty_male = $request->above_eighty_male;

        $total_male = $zero_two_male + $three_five_male + $six_twelve_male + $thirteen_seventeen_male + $eigteen_twentyfive_male + $twentysix_fourtynine_male + $fifty_fiftynine_male + $sixty_sixtynine_male + $seventy_seventynine_male + $above_eighty_male;

        $zero_two_female = $request->zero_two_female;
        $three_five_female = $request->three_five_female;
        $six_twelve_female = $request->six_twelve_female;
        $thirteen_seventeen_female = $request->thirteen_seventeen_female;
        $eigteen_twentyfive_female = $request->eigteen_twentyfive_female;
        $twentysix_fourtynine_female = $request->twentysix_fourtynine_female;
        $fifty_fiftynine_female = $request->fifty_fiftynine_female;
        $sixty_sixtynine_female = $request->sixty_sixtynine_female;
        $seventy_seventynine_female = $request->seventy_seventynine_female;
        $above_eighty_female = $request->above_eighty_female;

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

        $activityafter->total_male = $total_male;
        $activityafter->total_female = $total_female;

        $activityafter->indirect_male = $request->indirect_male;
        $activityafter->indirect_female = $request->indirect_female;

        $activityafter->save();

    }

}
