<?php

namespace App\Http\Controllers;

use App\Indicator;
use App\Indicatorafter;
use App\Project;
use Illuminate\Http\Request;

class IndicatorsafterController extends Controller
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
        //
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
            'person_responsible' => 'required',
        ]);

        $id = $request->input('id');
        $year = $request->input('year');
        $month = $request->input('month');

        $before_after = $request->input('before_after');

        $indicatorafter = indicatorafter::where('indicator_id', $id)->where('month', $month)->where('year', $year)->where('before_after', $before_after)->first();

        $indicatorafter->indicator_id = $request->input('id');
        $indicatorafter->person_responsible = $request->input('person_responsible');
        $indicatorafter->jan =0;

        $indicatorafter->jan = 0;
        $indicatorafter->feb = 0;
        $indicatorafter->mar = 0;
        $indicatorafter->apr = 0;
        $indicatorafter->may = 0;
        $indicatorafter->jun = 0;
        $indicatorafter->jul = 0;
        $indicatorafter->aug = 0;
        $indicatorafter->sep = 0;
        $indicatorafter->oct = 0;
        $indicatorafter->nov = 0;
        $indicatorafter->dec = 0;
        $indicatorafter->monthly_total = $request->input('achieved');
        $indicatorafter->ovi_date = $request->input('ovi_date');

        $indicatorafter->save();

        $indica = Indicator::findOrFail($indicatorafter->indicator_id);

        $project = Project::findOrFail($indica->project_id);

        
$indicators = indicator::where('project_id', $project->id)->paginate(10);


        return redirect('/indicators/' . $project->id)->with(['project' => $project, 'indicators' => $indicators]);
 }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
