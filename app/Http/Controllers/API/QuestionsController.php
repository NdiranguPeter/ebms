<?php

namespace App\Http\Controllers\API;

use App\Activity;
use App\Answer;
use App\AssumptionAfter;
use App\Http\Controllers\Controller;
use App\Indicator;
use App\Indicatorafter;
use App\Option;
use App\Outcome;
use App\Output;
use App\Project;
use App\Question;
use App\Risksafter;
use App\Unit;
use App\Activityafter;
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

        $answer = Answer::where('qid', $qid)->where('qn_id',$request->qn_id)->get();

        if ($answer->isEmpty()) {
            Answer::create($request->all());
        }
    }

    public function indicatorafter(Request $request)
    {

        $actyafter = Indicatorafter::where('indicator_id', $request->id)->where('before_after', "after")->first();

        if ($actyafter === null) {
            $indicator = Indicator::find($request->id);
        } else {

            $indicator = Indicatorafter::where('indicator_id', $request->id)->where('before_after', 'after')->first();
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

        }

        $id = $request->id;

        $output_id = $indicator->output_id;
        $goal_id = $indicator->goal_id;
        $outcome_id = $indicator->outcome_id;
        $project_id = $indicator->project_id;
        $year = $request->year;
        $before_after = "after";

        $actyafter = indicatorafter::where('indicator_id', $request->id)->where('year', $request->year)->where('before_after', 'after')->first();

        if ($actyafter == null) {
            $indicatorafter = new indicatorafter;
        } else {
            $indicatorafter = $actyafter;

        }

        $indicatorafter->person_responsible = $request->responsible;
        $indicatorafter->start = $indicator->start;
        $indicatorafter->end = $indicator->end;

        $indicatorafter->ovi_date = $indicator->start;

        $indicatorafter->baseline_target = $indicator->baseline_target;
        $indicatorafter->project_target = $indicator->project_target;

        $indicatorafter->year = $request->year;
        $indicatorafter->before_after = "after";
        $indicatorafter->indicator_id = $request->id;
        $indicatorafter->jan = $request->jan;
        $indicatorafter->feb = $request->feb;
        $indicatorafter->mar = $request->mar;
        $indicatorafter->apr = $request->apr;
        $indicatorafter->may = $request->may;
        $indicatorafter->jun = $request->jun;
        $indicatorafter->jul = $request->jul;
        $indicatorafter->aug = $request->aug;
        $indicatorafter->sep = $request->sep;
        $indicatorafter->oct = $request->oct;
        $indicatorafter->nov = $request->nov;
        $indicatorafter->dec = $request->dec;
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

        $actyafter = Activityafter::where('activity_id', $request->activity_id)->where('before_after', 'after')->first();
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

            $activity = Activityafter::where('activity_id', $request->activity_id)->where('before_after', 'after')->first();
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

        $outcome = Outcome::find($output->outcome_id);

        $project = Project::find($outcome->project_id);

        $before_after = 'after';

        $id = $activity->id;

        $output_id = $activity->output_id;
        $year = $request->year;
        $before_after = "after";

        $actyafter = Activityafter::where('activity_id', $id)->where('year', $year)->where('before_after', $before_after)->first();
        if ($actyafter === null) {
            $activityafter = new Activityafter;

        } else {

            $activityafter = $actyafter;

        }

        $activityafter->activity_id = $id;
        $activityafter->duration = $activity->duration;

        $sbudget = $activity->budget;
        $fbudget = $request->budget;

        $budget_diff = $sbudget - $fbudget;

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

        $activityafter->total_beneficiaries = $totol_beneficiaries;
        $activityafter->total_male = $total_male;
        $activityafter->total_female = $total_female;

        $activityafter->budget = $fbudget;
        $activityafter->budget_diff = $budget_diff;
        $activityafter->person_responsible = $activity->person_responsible;
        $activityafter->start = $activity->start;
        $activityafter->end = $activity->end;

        $years = $year;
        $months = $year;

        $activityafter->jan = $request->jan;
        $activityafter->feb = $request->feb;
        $activityafter->mar = $request->mar;
        $activityafter->apr = $request->apr;
        $activityafter->may = $request->may;
        $activityafter->jun = $request->jun;
        $activityafter->jul = $request->jul;
        $activityafter->aug = $request->aug;
        $activityafter->sep = $request->sep;
        $activityafter->oct = $request->oct;
        $activityafter->nov = $request->nov;
        $activityafter->dec = $request->dec;

        $activityafter->year = $request->year;
        $activityafter->before_after = "after";
        $activityafter->indirect_male = $request->indirect_male;
        $activityafter->indirect_female = $request->indirect_female;

        $activityafter->years = $years;

        $activityafter->save();

    }

}
