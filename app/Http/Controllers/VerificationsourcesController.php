<?php

namespace App\Http\Controllers;

use App\Indicator;
use App\Verificationsource;
use Illuminate\Http\Request;

class VerificationsourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

     $vs = Verificationsource::where("user_id",auth()->user()->id)->orderBy('created_at', 'desc')->paginate(10);

        return view('/verifiablesource/show')->with('vs', $vs);
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
            'responsibility' => 'required',
            'frequency' => 'required',
            'source' => 'required',
            'collection_method' => 'required',
            'name' => 'required',

        ]);

        $vs = new Verificationsource();

        $vs->name = $request->input('name');
        $vs->responsibility = $request->input('responsibility');
        $vs->frequency = $request->input('frequency');
        $vs->user_id = auth()->user()->id;
        $vsource = $request->input('source');
        $vs->source = implode(',', $vsource);
        $vs->collection_method = $request->input('collection_method');
        $vs->indicator_id = $request->input('indicator_id');

        $pid=$request->project_id;

        $vs->save();

        return redirect('/verificationsources/'.$pid);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
                
        $vs = Verificationsource::where("user_id",auth()->user()->id)->orderBy('created_at', 'desc')->paginate(10);

        $indicators = \DB::table('projects')
    ->join('indicators', 'indicators.project_id', 'projects.id')
    ->select('indicators.*')->where('projects.id', $id)
    ->orderBy('created_at', 'asc')
    ->get();


        return view('/verifiablesource/show')->with(['vs'=> $vs, 'project_id'=>$id, 'indicators'=>$indicators]);
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
    public function destroy(Request $request, $id)
    {

           $pid=$request->project_id;

        $verificationsource = Verificationsource::findOrFail($id);

$verificationsource->delete();

return redirect('/verificationsources/' . $pid);


    }

    public function selectIndicator($id)
    {

        $indicator = Indicator::findOrFail($id);
        return view('/verifiablesource/create')->with('indicator', $indicator);
    }
}
