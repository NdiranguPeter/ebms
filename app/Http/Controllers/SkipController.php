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

        $qn = Question::findOrFail($qn_id);

        $qn->skip = $skip;

        $qn->save();

        return redirect('/questions/' . $qn->survey_id)->with('success', $qn->name . ' skip set successful');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $question = Question::findOrFail($id);

        $survey = Survey::findOrFail($question->survey_id);

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

        $skipsdetails = "";

        if($question->skip != null){
            $skipsdetails = explode('|', $question->skip);
        }

        $allquestions = Question::where('survey_id',$question->survey_id)->get();
        
        return view('skip.show')->with(['allquestions'=>$allquestions, 'skipsdetails'=>$skipsdetails,'question'=>$question,'questions' => $questions]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     $question = Question::findOrFail($id);
   
     
        $survey = Survey::findOrFail($question->survey_id);

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

        $skipsdetails = "";

        if($question->skip != null){
            $skipsdetails = explode('|', $question->skip);
        }

        $allquestions = Question::where('survey_id',$question->survey_id)->get();
        
        return view('skip.edit')->with(['allquestions'=>$allquestions, 'skipsdetails'=>$skipsdetails,'question'=>$question,'questions' => $questions]);


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

         $this->validate($request, [

            'options' => 'required',
        ], [
            'options.required' => 'answer cannot be empty',
        ]);

        $question = Question::findOrFail($id);

    $qn_id = $request->input('qnid');
    $ques = $request->input('questions');
    $operator = $request->input('operator');
    $option = $request->input('options');

    $skip = $qn_id . "|" . $ques . "|" . $operator . "|" . $option;
  

$question->skip = $skip;

        $question->save();

return redirect('/questions/' . $question->survey_id)->with('success', $question->name . ' skip updated successful');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->skip = null;
        $question->save();
       
return redirect('/questions/' . $question->survey_id)->with('success', $question->name . ' skip removed successful');

    }
}
