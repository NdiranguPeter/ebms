<?php

namespace App\Http\Controllers;

use App\Risk;
use App\Risksafter;
use Illuminate\Http\Request;

class RisksAfterController extends Controller
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
            'occur' => 'required',
            'impact' => 'required',
            'response' => 'required',
        ]);

        $r_id = $request->input('risk_id');

        $riskafter = Risksafter::where('risk_id', $r_id)->first();

        if (!$riskafter) {
            $riskafter = new Risksafter();
        }

        $riskafter->risk_id = $request->input('risk_id');
        $riskafter->occur = $request->input('occur');
        $riskafter->impact = $request->input('impact');
        $riskafter->response = $request->input('response');

        $riskafter->save();

        $risk = Risk::find($riskafter->risk_id);

        $project_id = $risk->project_id;
        if ($risk->goal_id != 0) {
            return redirect('/risks/goal/' . $project_id)->with(['success' => 'Risk updated']);
        }
        if ($risk->outcome_id != 0) {
            return redirect('/risks/outcome/' . $project_id)->with(['success' => 'Risk updated']);
        }
        if ($risk->output_id != 0) {
            return redirect('/risks/output/' . $project_id)->with(['success' => 'Risk updated']);
        }
        if ($risk->activity_id != 0) {
            return redirect('/risks/activity/' . $project_id)->with(['success' => 'Risk updated']);
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
        return view('risks.after')->with('id', $id);
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
