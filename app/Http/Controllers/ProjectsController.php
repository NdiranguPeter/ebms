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
use Auth;
use DB;
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

        $user_id = auth()->user()->id;

        $user = User::findOrFail($user_id);
        // return $user->projects;
        $users = User::all();

        $projects = auth()->user()->projects()->orderBy('created_at', 'desc')->paginate(10);

        return view('projects.index')->with(['users' => $users, 'projects' => $projects]);
    }

    public function allprojects()
    {

        $user_id = auth()->user()->id;

        $user = User::findOrFail($user_id);

        if ($user->role == 999) {

            $projects = Project::orderBy('project_counter', 'asc')->paginate(10);

            $users = User::all();

            return view('projects.allprojects')->with(['users' => $users, 'projects' => $projects]);
        }
        if ($user->role == 0) {

            return redirect('/home');

        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user_id = auth()->user()->id;
        $target_groups = TargetGroup::all();
        $currencies = Currency::all();
        $sectors = Sector::all();
        $partners = Partner::all();
        $donors = Donor::all();
        $project_order = Project::where('user_id', $user_id)->max("project_order");
        $project_counter = Project::max("project_counter");

        return view('projects.create')->with(['project_counter' => $project_counter, 'project_order' => $project_order, 'donors' => $donors, 'partners' => $partners, 'sectors' => $sectors, 'currencies' => $currencies, 'target_groups' => $target_groups]);

    }

    public function targetGroup(Request $request)
    {
        $this->validate($request, [

            'name' => 'required',
        ], [
            'name.required' => 'Group name cannot be emptys',
        ]);

        $group = new TargetGroup;
        $group->name = $request->input('name');

        $group->save();

        return redirect('/projects/create')->with('success', 'Group created successfully');

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
            'sdg.*' => 'required',
            'sdg_split.*' => 'required',
            'sector.*' => 'required',
            'sector_spli.*' => 'required',
            'global_goal.*' => 'required',
            'global_goal_split.*' => 'required',
            'end' => 'after:start',
        ]);

        $global_goal_split_total = 0;
        foreach ($request->input('global_goal_split') as $splitt) {
            $global_goal_split_total = $global_goal_split_total + $splitt;
        }

        $sector_split_total = 0;
        foreach ($request->input('sector_split') as $sector_splits) {
            $sector_split_total = $sector_split_total + $sector_splits;
        }

        $sdg_split_total = 0;
        foreach ($request->input('sdg_split') as $sdg_splits) {
            $sdg_split_total = $sdg_split_total + $sdg_splits;
        }

        if ($global_goal_split_total > 100 || $sector_split_total > 100 || $sdg_split_total > 100) {

            $target_groups = TargetGroup::all();
            $currencies = Currency::all();
            $sectors = Sector::all();
            $partners = Partner::all();
            $donors = Donor::all();

            return redirect('/projects/create')->with('error', '% split cannot add up to over 100%');

        }

        $project = new Project;

        $project->global_goal = implode('|', $request->input('global_goal'));
        $project->globalgoal_split = implode('|', $request->input('global_goal_split'));

        $project->sector = implode('|', $request->input('sector'));
        $project->sector_split = implode('|', $request->input('sector_split'));

        $project->sdg = implode('|', $request->input('sdg'));
        $project->sdg_split = implode('|', $request->input('sdg_split'));

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
        $project->project_counter = $request->input('project_counter');
        $project->project_order = $request->input('project_order');

        $project->save();

        return redirect('/projects')->with('success', 'Project successfully created');

        // return redirect('/indicators/goal/create/' . $project->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $project = Project::findOrFail($id);
        $donor = Donor::findOrFail($project->donors);
        $project->donors = $donor->name;
        $partner = Partner::findOrFail($project->partners);
        $project->partners = $partner->name;
        $target_group = TargetGroup::findOrFail($project->target_group);
        $ir_office = IR_Office::findOrFail($project->ir_office);
        $sectors = explode('|', $project->sector);
        $sdgs = explode('|', $project->sdg);
        $global_goals = explode('|', $project->global_goal);

        $sectors_split = explode('|', $project->sector_split);
        $sdgs_split = explode('|', $project->sdg_split);
        $global_goals_split = explode('|', $project->globalgoal_split);

        $county = Country::findOrFail($project->country);

        return view('projects.show')->with(['sectors' => $sectors, 'sdgs' => $sdgs, 'global_goals' => $global_goals, 'sectors_split' => $sectors_split, 'sdgs_split' => $sdgs_split, 'global_goals_split' => $global_goals_split, 'project' => $project, 'country' => $county, 'office' => $ir_office, 'target_group' => $target_group]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id);

        $target_group = TargetGroup::findOrFail($project->target_group);
        $tg = TargetGroup::all();

        $ir_office = IR_Office::findOrFail($project->ir_office);
        $currencies = Currency::all();
        $sectors = Sector::all();

        $partners = Partner::all();
        $donors = Donor::all();

        $sd = Donor::findOrFail($project->donors);

        $project->donors = $sd->name;

        $sp = Partner::findOrFail($project->partners);
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
            'sdg.*' => 'required',
            'sdg_split.*' => 'required',
            'sector.*' => 'required',
            'sector_spli.*' => 'required',
            'global_goal.*' => 'required',
            'global_goal_split.*' => 'required',

        ]);

        $global_goal_split_total = 0;
        foreach ($request->input('global_goal_split') as $splitt) {
            $global_goal_split_total = $global_goal_split_total + $splitt;
        }

        $sector_split_total = 0;
        foreach ($request->input('sector_split') as $sector_splits) {
            $sector_split_total = $sector_split_total + $sector_splits;
        }

        $sdg_split_total = 0;
        foreach ($request->input('sdg_split') as $sdg_splits) {
            $sdg_split_total = $sdg_split_total + $sdg_splits;
        }

        if ($global_goal_split_total > 100 || $sector_split_total > 100 || $sdg_split_total > 100) {

            $target_groups = TargetGroup::all();
            $currencies = Currency::all();
            $sectors = Sector::all();
            $partners = Partner::all();
            $donors = Donor::all();

            return redirect('/projects/create')->with('error', '% split cannot add up to over 100%');

        }

        $project = Project::findOrFail($id);

        $project->global_goal = implode('|', $request->input('global_goal'));
        $project->globalgoal_split = implode('|', $request->input('global_goal_split'));

        $project->sector = implode('|', $request->input('sector'));
        $project->sector_split = implode('|', $request->input('sector_split'));

        $project->sdg = implode('|', $request->input('sdg'));
        $project->sdg_split = implode('|', $request->input('sdg_split'));

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
        $project = Project::findOrFail($id);

        $project->delete();

        DB::table('projects')
            ->where('user_id', $project->user_id)
            ->where('project_order', '>', $project->project_order)
            ->decrement('project_order', 1);

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




  public function kenya()
    {
        $user = auth()->user();

        if ($user->role == 999  || $user->country = $user->role) {
            $projects = Project::where('country',1)->orderBy('created_at', 'desc')->paginate(10);
            // dd($projects);
            return view('kenya')->with(['projects'=>$projects]);
        }
        if ($user->role == 0) {
            return redirect('/home');
        }

    }  


       public function sudan()
    {
        $user = auth()->user();

        if ($user->role == 999  || $user->country = $user->role) {
             $projects = Project::where('country',4)->orderBy('created_at', 'desc')->paginate(10);
            // dd($projects);
            return view('sudan')->with(['projects'=>$projects]);
        }
        if ($user->role == 0) {
            return redirect('/home');
        }

    }

       public function somalia()
    {
        $user = auth()->user();

        if ($user->role == 999 || $user->country = $user->role) {
            $projects = Project::where('country',2)->orderBy('created_at', 'desc')->paginate(10);
            // dd($projects);
            return view('somalia')->with(['projects'=>$projects]);
        }
        if ($user->role == 0) {
            return redirect('/home');
        }

    }

       public function ethiopia()
    {
        $user = auth()->user();

        if ($user->role == 999 || $user->role=$user->country) {
             $projects = Project::where('country',3)->orderBy('created_at', 'desc')->paginate(10);
            // dd($projects);
            return view('ethiopia')->with(['projects'=>$projects]);
        }
        
        if ($user->role == 0) {
            return redirect('/home');
        }

    }

       public function southsudan()
    {
        $user = auth()->user();

        if ($user->role == 999  || $user->country = $user->role) {
            $projects = Project::where('country',5)->orderBy('created_at', 'desc')->paginate(10);
            // dd($projects);
            return view('southsudan')->with(['projects'=>$projects]);
        }
        if ($user->role == 0) {
            return redirect('/home');
        }

    }


}
