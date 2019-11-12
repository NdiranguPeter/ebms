<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Group;
use App\Option;
use App\Question;
use App\Survey;
use DB;


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

        $qn_id = $request->input('qnid');
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

        // dd($survey->id);
      
        $questions1 = DB::table('questions')
        ->select('questions.*')
        ->where('questions.qn_order','<', $question->qn_order)
        ->where('questions.survey_id', '=', $survey->id)
        // ->where('questions.type','=', 'radio')
        ->where('questions.type','=', 'checkbox')
        ->orderBy('qn_order', 'asc')
        ->get();

        $questions2 = DB::table('questions')
        ->select('questions.*')
        ->where('questions.qn_order','<', $question->qn_order)
        ->where('questions.survey_id', '=', $survey->id)
        ->where('questions.type','=', 'radio')
        ->orderBy('qn_order', 'asc')
        ->get();

        $questions = $questions1->merge($questions2);
        
        return view('skip.show')->with(['question'=>$question,'questions' => $questions]);

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
