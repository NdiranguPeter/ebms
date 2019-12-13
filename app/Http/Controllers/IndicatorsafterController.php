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
        $before_after = $request->input('before_after');

        $indicatorafter = indicatorafter::where('indicator_id', $id)->where('year', $year)->where('before_after', $before_after)->first();

        $indicatorafter->indicator_id = $request->input('id');
        $indicatorafter->person_responsible = $request->input('person_responsible');
        $indicatorafter->jan =0;

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
        $indicatorafter->ovi_date = $request->input('ovi_date');

        $indicatorafter->save();

        $indica = Indicator::find($indicatorafter->indicator_id);

        $project = Project::find($indica->project_id);

        
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
