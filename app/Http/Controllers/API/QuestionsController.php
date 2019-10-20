<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Option;
use App\Question;

class QuestionsController extends Controller
{

    public function show($id)
    {

        $survey = auth()->user()->surveys()->find($id);

        // dd($survey);

        $questions = Question::where('survey_id', $survey->id)->get();
        $qn_options = Option::where('survey_id', $survey->id)->get();

        if ($questions->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => $survey->name . ' doesnt have questions yet',
            ], 400);
        }

        return response()->json([
            'success' => true,
            'questions' => $questions,
            'options' => $qn_options,
        ], 302);
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

        return response()->json([
            'data' => $surveys,
        ], 302);
    }
}
