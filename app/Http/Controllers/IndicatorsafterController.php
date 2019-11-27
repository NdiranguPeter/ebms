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
        $output_id = $request->input('output_id');
        $goal_id = $request->input('goal_id');
        $outcome_id = $request->input('outcome_id');
        $project_id = $request->input('project_id');
        $year = $request->input('the_year');
        $before_after = $request->input('before_after');

        $actyafter = indicatorafter::where('indicator_id', $id)->where('year', $year)->where('before_after', $before_after)->first();

        if ($actyafter == null) {
            $indicatorafter = new indicatorafter;
        } else {
            $indicatorafter = $actyafter;

        }

        $indicatorafter->person_responsible = $request->input('person_responsible');
        $indicatorafter->start = $request->input('start');
        $indicatorafter->end = $request->input('end');

        if ($request->input('ovi_date') !== '') {
            $indicatorafter->ovi_date = $request->input('ovi_date');
        }
        if ($request->input('ovi_date') == '') {
            $indicatorafter->ovi_date = $request->input('ovi_date_default');
        }

        $indicatorafter->baseline_target = $request->input('baseline_target');
        $indicatorafter->project_target = $request->input('project_target');
        $years = $request->input('years');
        $months = $request->input('months');
        $indicatorafter->year = $request->input('the_year');
        $indicatorafter->before_after = $request->input('before_after');
        $indicatorafter->indicator_id = $request->input('id');

        $indicatorafter->jan = $request->input('jan');
        $indicatorafter->feb = $request->input('feb');
        $indicatorafter->mar = $request->input('mar');
        $indicatorafter->apr = $request->input('apr');
        $indicatorafter->may = $request->input('may');
        $indicatorafter->jun = $request->input('jun');
        $indicatorafter->jul = $request->input('jul');
        $indicatorafter->aug = $request->input('aug');
        $indicatorafter->sep = $request->input('sep');
        $indicatorafter->oct = $request->input('oct');
        $indicatorafter->nov = $request->input('nov');
        $indicatorafter->dec = $request->input('dec');

        $indicatorafter->save();
        $indicators = indicator::where('project_id', $project_id)->paginate(10);

        $project = Project::find($project_id);

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
