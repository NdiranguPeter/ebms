<?php

namespace App\Http\Controllers;

use App\Deliverable;
use Illuminate\Http\Request;

class DeliverablesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deliverables = Deliverable::orderBy('created_at', 'asc')->paginate(10);

        return view('deliverables.index')->with('deliverables', $deliverables);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('deliverables.create');
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

        $deliverable = new Deliverable();

        $deliverable->name = $request->input('name');

        $deliverable->save();

        return redirect('/deliverables')->with('success', 'Deliverable successful saved');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $deliverable = Deliverable::find($id);

        return view('deliverables.show')->with('deliverable', $deliverable);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $deliverable = Deliverable::find($id);

        return view('deliverables.edit')->with('deliverable', $deliverable);

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

        ]);

        $deliverable = Deliverable::find($id);

        $deliverable->name = $request->input('name');

        $deliverable->save();

        return redirect('/deliverables')->with('success', 'Deliverable successful updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deliverable = Deliverable::find($id);

        $deliverable->delete();

        return redirect('/deliverables')->with('error', 'Deliverable deleted');

    }
}
