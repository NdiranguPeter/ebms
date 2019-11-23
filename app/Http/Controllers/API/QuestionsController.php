<?php

namespace App\Http\Controllers\API;

use App\Answer;
use App\Http\Controllers\Controller;
use App\Option;
use App\Question;
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

        $answer = Answer::where('qid', $qid)->get();

        if ($answer->isEmpty()) {
            Answer::create($request->all());
        }
    }

    public function indicatorafter(Request $request)
    {
    
        return response()->json($request->id);

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

        $datetime1 = new DateTime($indicator->start);
        $datetime2 = new DateTime($indicator->end);
        $interval = $datetime1->diff($datetime2);
        $years = $interval->format('%y');
        $months = $interval->format('%m');
        $days = $interval->format('%d');


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

$indicatorafter->years = $years;

        $indicatorafter->save();

    }

}
