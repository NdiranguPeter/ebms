<?php

namespace App\Http\Controllers;

use App\Group;
use App\Option;
use App\Question;
use App\Survey;
use App\Answer;
use DB;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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

            'name' => 'required',
            'type' => 'required',
            'mandatory' => 'required',
            'column' => 'required',

        ],
            [

                'name.required' => 'Question required',
                'mandatory.required' => 'Set required status',
                'column.required' => 'Data column name required',
            ]);

        $qn = Question::create($request->all());

        $survey = Survey::find($request->survey_id);

        $type = $request->type;

        if ($type == "radio" || $type == "checkbox") {

            return redirect('/qntype/' . $qn->id);

        } else {
            return redirect('/questions/' . $survey->id)->with('success', 'Question created successfully');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // $questions = questions::where('survey_id', $id)->paginate(10);

        // return view('questions.show')->with('questions', $questions);

        $survey = Survey::find($id);
        $groups = Group::where('survey_id', $survey->id)->get();
        // dd($groups);
        $questions = Question::where('survey_id', $id)->orderBy('qn_order', 'asc')->paginate(10);
        $question_order = Question::where('survey_id', $id)->max("qn_order");

        return view('questions.show')->with(['qn_order' => $question_order, 'survey' => $survey, 'groups' => $groups, 'questions' => $questions]);

    }

    public function data($id)
    {

        $survey = Survey::find($id);

        $questions = Question::where('survey_id', $id)->orderBy('qn_order', 'asc')->paginate(10);

        $answers = Answer::where('survey_id', $id)->get();

        $answers_list = Answer::where('survey_id', $id)->groupBy('qn_id')->get();

        // dd($answers_list);

        return view('surveys.data')->with(['answers_list'=>$answers_list,'survey' => $survey, 'questions' => $questions, 'answers' => $answers]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $question = Question::find($id);
        $groups = Group::where('survey_id', $question->survey_id)->get();

        return view('questions.edit')->with(['groups' => $groups, 'question' => $question]);

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
            'name' => 'required',
            'mandatory' => 'required',
            'column' => 'required',
        ],
            [
                'name.required' => 'Question required',
                'mandatory.required' => 'Set required status',
                'column.required' => 'Data column name required',
            ]);

        $qn_order = $request->input('qn_order');
        $in_order = $request->input('in_order');
        $question = Question::find($id);

        DB::table('questions')
            ->where('qn_order', '>=', $qn_order)
            ->where('qn_order', '<', $in_order)
            ->increment('qn_order', 1);

        $request = $request->all();

        Question::find($id)->update($request);

        return redirect('/questions/' . $question->survey_id)->with('success', $question->name . ' updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::find($id);

        $survey_id = $question->survey_id;
        $name = $question->name;
        $qn_order = $question->qn_order;

        $question->delete();

        DB::table('questions')
            ->where('qn_order', '>', $qn_order)
            ->decrement('qn_order', 1);

        return redirect('/questions/' . $survey_id)->with('error', $name . ' deleted');

    }

    public function duplicate($id)
    {
        $question = Question::find($id);
        $name = $question->name;

        $survey_id = $question->survey_id;
        $new_question = $question->replicate();

        DB::table('questions')
            ->where('qn_order', '>', $question->qn_order)
            ->increment('qn_order', 1);

        $new_question->qn_order = $question->qn_order + 1;

        // dd($new_question);

        $new_question->save();
        return redirect('/questions/' . $survey_id)->with('success', $name . ' duplicated successfully');

    }
    public function qntype($id)
    {
        $question = Question::find($id);

        return view('questions.type')->with('question', $question);

    }

    public function storeType(Request $request, $id)
    {

        $new_option = new Option;

        $new_option->question_id = $id;

        $survey_id = $request->input('survey_id');

        $new_option->survey_id = $survey_id;

        $options = implode('|', $request->input('name'));

        $new_option->name = $options;

        $new_option->save();

        return redirect('/questions/' . $survey_id)->with('success', 'Question created successfully');

    }

}
