<?php

namespace App\Http\Controllers;

use App\Country;
use App\Currency;
use App\Donor;
use App\Exports\LogframeExport;
use App\Exports\MonthlyReportExport;
use App\Exports\ProjectExport;
use App\IR_Office;
use App\Partner;
use App\Project;
use App\Sector;
use App\TargetGroup;
use App\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $projects = Project::all();
        // $projects = Project::where('name','projectname')->get();
        // $projects = Project::orderBy('created_at', 'desc')->take(2)->get();
        // $projects = Project::orderBy('created_at', 'desc')->get();
        $user_id = auth()->user()->id;

        $user = User::find($user_id);
        // return $user->projects;

        $projects = Project::orderBy('created_at', 'desc')->paginate(10);

        return view('projects.index')->with(['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $target_groups = TargetGroup::all();
        $currencies = Currency::all();
        $sectors = Sector::all();
        $partners = Partner::all();
        $donors = Donor::all();

        return view('projects.create')->with(['donors' => $donors, 'partners' => $partners, 'sectors' => $sectors, 'currencies' => $currencies, 'target_groups' => $target_groups]);
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
            'location' => 'required',
            'partners' => 'required',
            'description' => 'required',
            'target_group' => 'required',
            'irw_pin' => 'required',
            'start' => 'required',
            'end' => 'required',

            'donors' => 'required',
            'ir_office' => 'required',
            'stage' => 'required',
            'type' => 'required',
            'goal' => 'required',
            'currency' => 'required',
            // 'g.*.globalgoal_goal' => 'required',
            // 's.*.global_split' => 'required',
        ]);

        $project = new Project;

        $project->global_goal = implode(',', $request->input('g.*.global_goal'));
        $project->globalgoal_split = implode(',', $request->input('s.*.globalgoal_split'));

        $project->sector = implode(',', $request->input('c.*.sector'));
        $project->sector_split = implode(',', $request->input('p.*.sector_split'));

        $project->sdg = implode(',', $request->input('d.*.sdg'));
        $project->sdg_split = implode(',', $request->input('r.*.sdg_split'));

        $project->ir_office = $request->input('ir_office');

        $project->user_id = auth()->user()->id;
        $project->country = auth()->user()->country;

        $project->name = strip_tags($request->input('name'));
        $project->location = $request->input('location');

        $project->target_group = implode(',', $request->input('target_group'));
        $project->partners = implode(',', $request->input('partners'));
        $project->donors = implode(',', $request->input('donors'));

        $project->description = $request->input('description');
        $project->irw_pin = $request->input('irw_pin');
        $project->start = $request->input('start');
        $project->end = $request->input('end');

        $project->stage = $request->input('stage');
        $project->type = $request->input('type');

        $project->goal = $request->input('goal');
        $project->budget = $request->input('budget');
        $project->currency = $request->input('currency');
        $project->fo_pin = $request->input('fo_pin');

        // dd($project->getAttributes());

        $project->save();

        return redirect('/projects')->with('success', 'Project created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        $donor = Donor::find($project->donors);
        $project->donors = $donor->name;
        $partner = Partner::find($project->partners);
        $project->partners = $partner->name;
        $target_group = TargetGroup::find($project->target_group);
        $ir_office = IR_Office::find($project->ir_office);
        $sector = Sector::find($project->sector);
        $project->sector = $sector->name;

        $county = Country::find($project->country);

        return view('projects.show')->with(['project' => $project, 'country' => $county, 'office' => $ir_office, 'target_group' => $target_group]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);

        $target_group = TargetGroup::find($project->target_group);
        $tg = TargetGroup::all();

        $ir_office = IR_Office::find($project->ir_office);
        $currencies = Currency::all();
        $sectors = Sector::all();

        $partners = Partner::all();
        $donors = Donor::all();

        $sd = Donor::find($project->donors);

        $project->donors = $sd->name;

        $sp = Partner::find($project->partners);
        $project->partners = $sp->name;

        return view('projects.edit')->with(['office' => $ir_office, 'project' => $project, 'donors' => $donors, 'partners' => $partners, 'sectors' => $sectors, 'currencies' => $currencies, 'target_group' => $target_group, 'target_groups' => $tg]);

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
            'location' => 'required',
            'partners' => 'required',
            'description' => 'required',
            'target_group' => 'required',
            'irw_pin' => 'required',
            'start' => 'required',
            'end' => 'required',

            'donors' => 'required',
            'ir_office' => 'required',
            'stage' => 'required',
            'type' => 'required',
            'goal' => 'required',
            'currency' => 'required',
            // 'g.*.globalgoal_goal' => 'required',
            // 's.*.global_split' => 'required',
        ]);

        $project = Project::find($id);

        $project->global_goal = implode(',', $request->input('g.*.global_goal'));
        $project->globalgoal_split = implode(',', $request->input('s.*.globalgoal_split'));

        $project->sector = implode(',', $request->input('c.*.sector'));
        $project->sector_split = implode(',', $request->input('p.*.sector_split'));

        $project->sdg = implode(',', $request->input('d.*.sdg'));
        $project->sdg_split = implode(',', $request->input('r.*.sdg_split'));

        $project->ir_office = $request->input('ir_office');

        $project->user_id = auth()->user()->id;
        $project->country = auth()->user()->country;

        $project->name = strip_tags($request->input('name'));
        $project->location = $request->input('location');

        $project->target_group = implode(',', $request->input('target_group'));
        $project->partners = implode(',', $request->input('partners'));
        $project->donors = implode(',', $request->input('donors'));

        $project->description = $request->input('description');
        $project->irw_pin = $request->input('irw_pin');
        $project->start = $request->input('start');
        $project->end = $request->input('end');

        $project->stage = $request->input('stage');
        $project->type = $request->input('type');

        $project->goal = $request->input('goal');
        $project->budget = $request->input('budget');
        $project->currency = $request->input('currency');
        $project->fo_pin = $request->input('fo_pin');

        // dd($project->getAttributes());

        $project->save();

        return redirect('/projects')->with('success', 'Project edited');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();
        return redirect('/projects')->with('error', 'Project deleted');

    }

    public function exportProject()
    {
        return Excel::download(new ProjectExport, 'Projects.csv');

    }

    public function export_Project($id)
    {

        return Excel::download(new ProjectExport($id), 'Project Details.pdf');
    }

    public function export_logframe($id)
    {
        return Excel::download(new LogframeExport($id), 'Logframe.csv');

    }
    public function export_monthly($id)
    {
        return Excel::download(new MonthlyReportExport($id), 'Monthly Report.pdf');

    }

}
