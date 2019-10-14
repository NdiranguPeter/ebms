<?php

namespace App\Http\Controllers;

use App\Assumption;
use App\AssumptionAfter;
use Illuminate\Http\Request;

class AssuptionsAfterController extends Controller
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
            'validated' => 'required',
            'accessed' => 'required',
        ]);

        $a_id = $request->input('assumption_id');

        $assumptionafter = AssumptionAfter::where('assumption_id', $a_id)->first();
        if (!$assumptionafter) {
            $assumptionafter = new AssumptionAfter();
        }

        $assumptionafter->assumption_id = $a_id;
        $assumptionafter->occur = $request->input('occur');
        $assumptionafter->impact = $request->input('impact');
        $assumptionafter->response = $request->input('response');
        $assumptionafter->validated = $request->input('validated');
        $assumptionafter->accessed = $request->input('accessed');

        $assumptionafter->save();

        $assumption = Assumption::find($a_id);
        $project_id = $assumption->project_id;
        if ($assumption->goal_id != 0) {
            return redirect('/assumptions/goal/' . $project_id)->with(['success' => 'assumption updated']);
        }
        if ($assumption->outcome_id != 0) {
            return redirect('/assumptions/outcome/' . $project_id)->with(['success' => 'assumption updated']);
        }
        if ($assumption->output_id != 0) {
            return redirect('/assumptions/output/' . $project_id)->with(['success' => 'assumption updated']);
        }
        if ($assumption->activity_id != 0) {
            return redirect('/assumptions/activity/' . $project_id)->with(['success' => 'assumption updated']);
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
        return view('assumptions.after')->with('id', $id);

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
