<?php

namespace App\Http\Controllers;

use App\Country;
use App\Survey;
use App\User;
use Illuminate\Http\Request;

class SurveysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        $surveys = auth()->user()->surveys()->paginate(10);

        return view('surveys.index')->with('surveys', $surveys);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('surveys.create');
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
            'supervisor' => 'required',
            'location' => 'required',
            'description' => 'required',

        ]);

        $survey = new Survey();
        $survey->user_id = auth()->user()->id;

        $survey->country = auth()->user()->country;

        $survey->name = strip_tags($request->input('name'));
        $survey->location = $request->input('location');
        $survey->description = $request->input('description');
        $survey->supervisor = $request->input('supervisor');

        $survey->save();

        return redirect('/surveys')->with('success', 'Survey created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $survey = Survey::findOrFail($id);

        $county = Country::findOrFail($survey->country);

        return view('surveys.show')->with(['survey' => $survey, 'country' => $county]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $survey = Survey::findOrFail($id);

        return view('surveys.edit')->with('survey', $survey);

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
            'supervisor' => 'required',
            'location' => 'required',
            'description' => 'required',

        ]);

        $survey = Survey::findOrFail($id);
        $survey->user_id = auth()->user()->id;

        $survey->country = auth()->user()->country;

        $survey->name = strip_tags($request->input('name'));
        $survey->location = $request->input('location');
        $survey->description = $request->input('description');
        $survey->supervisor = $request->input('supervisor');

        $survey->save();

        return redirect('/surveys')->with('success', 'Survey updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $survey = Survey::findOrFail($id);
        $survey->delete();
        return redirect('/surveys')->with('error', 'Survey deleted');

    }
}
