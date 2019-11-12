<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkipController extends Controller
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

            'options' => 'required',
        ], [
            'options.required' => 'answer cannot be empty',
        ]);

        $qn_id = $request->input('qn_id');
        $question = $request->input('questions');
        $operator = $request->input('operator');
        $option = $request->input('options');

        $skip = $qn_id . "|" . $question . "|" . $operator . "|" . $option;

        dd($skip);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $question = Question::find($id);

        $survey = Survey::find($question->survey_id);
      
        $questions = Question::where('survey_id', $id)
        ->
        ->orderBy('qn_order', 'asc')
        ->get();

        $checkboxquestions = DB::table('questions')
            ->select('questions.*')
            ->where('questions.survey_id', $id)
            ->where('questions.type', "checkbox")
            ->get();

        $radioquestions = DB::table('questions')
            ->select('questions.*')
            ->where('questions.survey_id', $id)
            ->where('questions.type', "radio")
            ->get();

        $questionsanswers = DB::table('answers')
            ->select('answers.*')
            ->where('answers.survey_id', $id)
            ->get();

             return view('skip.create')->with(['questionsanswers' => $questionsanswers, 'radioquestions' => $radioquestions, 'checkboxquestions' => $checkboxquestions,  'questions' => $questions]);

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
