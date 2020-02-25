<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Resource;
use App\Output;
use App\Outcome;
use Illuminate\Http\Request;

class ResourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

$vs = Resource::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(10);

return view('/resources/show')->with('vs', $vs);

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
        ]);

        $resource = new Resource();
        $resource->name = $request->input('name');
        $resource->user_id = auth()->user()->id;
        $resource->activity_id = $request->input('activity_id');
        $oid = $request->output_id;


        $output = Output::find($oid);


        $outcome = Outcome::find($output->outcome_id);

        $pid = $outcome->project_id;

        $resource->save();

        return redirect('/resources/'.$pid);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $user = auth()->user();

        $vs = Resource::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(10);

        $activities = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->join('activities', 'activities.output_id', 'outputs.id')
            ->select('activities.*')->where('projects.id', $id)
            ->orderBy('created_at', 'desc')
            ->get();


        return view('/resources/show')->with(['vs'=>$vs, 'project_id'=>$id, 'activities'=>$activities]);

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

        $resource = Resource::findOrFail($id);

        $resource->delete();

        return redirect('/resources/' . $pid);

    }

    public function selectActivity($id)
    {

        $activity = Activity::findOrFail($id);
        return view('/resources/create')->with('activity', $activity);
    }
}
