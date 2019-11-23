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
                Answer::create($request->all());
        
    }

     public function indicatorafter(Request $request)
    {
                dd($request->id);
    }
}
