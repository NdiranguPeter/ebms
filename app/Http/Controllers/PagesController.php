<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Assumption;
use App\AssumptionAfter;
use App\Challenge;
use App\Currency;
use App\DB;
use App\Donor;
use App\Indicator;
use App\IR_Office;
use App\Outcome;
use App\Output;
use App\Partner;
use App\Project;
use App\Risk;
use App\Risksafter;
use App\Unit;
use Illuminate\Http\Request;


class PagesController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function test()
    {

        return view('test');
    }
    public function settings()
    {
        return view('pages.settings');
    }
    public function planning($id)
    {
        $outcome = outcome::find($id);
        $outputs = Output::where('outcome_id', $id)->get();
        $activities = Activity::all();
        return view('pages.planning')->with(['outputs' => $outputs, 'activities' => $activities, 'outcome' => $outcome]);
    }

    public function me($id)
    {
        $project = Project::find($id);

        $outcomes = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->select('outcomes.*')->where('projects.id', $id)
            ->get();

        $outputs = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->select('outputs.*')->where('projects.id', $id)
            ->get();

        $outcomeindicators = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('indicators', 'indicators.outcome_id', 'outcomes.id')
            ->select('indicators.*')->where('projects.id', $id)
            ->get();

        $outcomeindicatorsafter = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('indicators', 'indicators.outcome_id', 'outcomes.id')
            ->join('indicatorafters', 'indicatorafters.indicator_id', 'indicators.id')
            ->select('indicatorafters.*')->where('projects.id', $id)
            ->get();

        $outputindicatorsafter = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->join('indicators', 'indicators.output_id', 'outputs.id')
            ->join('indicatorafters', 'indicatorafters.indicator_id', 'indicators.id')
            ->select('indicatorafters.*')->where('projects.id', $id)
            ->get();

        $outputindicators = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->join('indicators', 'indicators.output_id', 'outputs.id')
            ->select('indicators.*')->where('projects.id', $id)
            ->get();

        $verificationsources = \DB::table('projects')
            ->join('indicators', 'indicators.project_id', 'projects.id')
            ->join('verificationsources', 'verificationsources.indicator_id', 'indicators.id')
            ->select('verificationsources.*')->where('projects.id', $id)
            ->get();

        return view('reports.templates.me')->with(['outputindicatorsafter' => $outputindicatorsafter, 'outcomeindicatorsafter' => $outcomeindicatorsafter, 'verificationsources' => $verificationsources, 'outputindicators' => $outputindicators, 'outcomeindicators' => $outcomeindicators, 'outputs' => $outputs, 'outcomes' => $outcomes]);
    }
    public function rte()
    {
        $projects = Project::orderBy('created_at', 'desc')->paginate(10);
        $outcomes = outcome::orderBy('created_at', 'desc')->paginate(6);

        return view('pages.rte')->with(['projects' => $projects, 'outcomes' => $outcomes]);
    }
    public function meal()
    {
        $projects = auth()->user()->projects()->orderBy('created_at', 'desc')->paginate(10);
        $outcomes = outcome::orderBy('created_at', 'desc')->paginate(6);

        return view('pages.meal')->with(['projects' => $projects, 'outcomes' => $outcomes]);
    }

    public function logframe($id)
    {
        $project = Project::find($id);

        $outcomes = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->select('outcomes.*')->where('projects.id', $id)
            ->get();

        $outputs = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->select('outputs.*')->where('projects.id', $id)
            ->orderBy('created_at', 'desc')->paginate(6);

        return view('pages.logframe')->with(['project' => $project, 'outcomes' => $outcomes, 'outputs' => $outputs]);
    }

    public function logfr($id)
    {
        $project = Project::find($id);

        $goalindicators = Indicator::where('goal_id', $id)->get();

        $verificationsources = \DB::table('projects')
            ->join('indicators', 'indicators.project_id', 'projects.id')
            ->join('verificationsources', 'verificationsources.indicator_id', 'indicators.id')
            ->select('verificationsources.*')->where('projects.id', $id)
            ->get();

        $outcomes = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->select('outcomes.*')->where('projects.id', $id)
            ->get();

        $outputs = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->select('outputs.*')->where('projects.id', $id)
            ->get();

        // $activities = Activity::where('project_id', $id)->get();

        $activities = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->join('activities', 'activities.output_id', 'outputs.id')
            ->select('activities.*')->where('projects.id', $id)
            ->get();

        $activityresources = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->join('activities', 'activities.output_id', 'outputs.id')
            ->join('resources', 'resources.activity_id', 'activities.id')
            ->select('resources.*')->where('projects.id', $id)
            ->get();
        $outcomeindicators = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('indicators', 'indicators.outcome_id', 'outcomes.id')
            ->select('indicators.*')->where('projects.id', $id)
            ->get();

        $outputindicators = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->join('indicators', 'indicators.output_id', 'outputs.id')
            ->select('indicators.*')->where('projects.id', $id)
            ->get();

        $curs = Currency::all();

        $risks = \DB::table('projects')
            ->join('risks', 'risks.project_id', 'projects.id')
            ->select('risks.*')->where('projects.id', $id)
            ->get();

        $assumptions = \DB::table('projects')
            ->join('assumptions', 'assumptions.project_id', 'projects.id')
            ->select('assumptions.*')->where('projects.id', $id)
            ->get();

        // return $assumptions;

        return view('reports.templates.logframe')->with(['risks' => $risks, 'assumptions' => $assumptions, 'verificationsources' => $verificationsources, 'curs' => $curs, 'activityresources' => $activityresources, 'outputindicators' => $outputindicators, 'outcomeindicators' => $outcomeindicators, 'goalindicators' => $goalindicators, 'activities' => $activities, 'project' => $project, 'outcomes' => $outcomes, 'outputs' => $outputs]);
    }

    public function dipbefore(Request $request)
    {
        
        $project = Project::find($request->project_id);
    

        $outcomes = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->select('outcomes.*')->where('projects.id', $request->project_id)
            ->get();



        $outputs = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->select('outputs.*')->where('projects.id', $request->project_id)
            ->get();

        $activities = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->join('activities', 'activities.output_id', 'outputs.id')
            ->select('activities.*')
            ->whereYear('activities.start', '=', $request->year)
            ->where('projects.id', $request->project_id)
            ->get();


        $acrr = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->join('activities', 'activities.output_id', 'outputs.id')
            ->join('activityafters', 'activityafters.activity_id', 'activities.id')
            ->select('activityafters.year')
            ->where('activityafters.before_after', 'before')
            ->where('projects.id', $request->project_id)
            ->groupBy('year')
            ->get();

        $activitiesafter = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->join('activities', 'activities.output_id', 'outputs.id')
            ->join('activityafters', 'activityafters.activity_id', 'activities.id')
            ->select('activityafters.*')
            ->where('activityafters.before_after', 'before')
            ->where('activityafters.year', $request->year)
            ->where('projects.id', $request->project_id)
            ->get();


        $units = Unit::all();
        $ir_office = IR_Office::find($project->ir_office);

        $donors = explode(',', $project->donors);

        $alldonors = Donor::all();

        $cur = Currency::all();

        return view('reports.templates.dip')->with(['when'=>$request->before_after,'period'=>$request->year, 'alldonors' => $alldonors, 'donors' => $donors, 'currency' => $cur, 'ir_office' => $ir_office, 'units' => $units, 'activitiesafter' => $activitiesafter, 'activities' => $activities, 'project' => $project, 'outcomes' => $outcomes, 'outputs' => $outputs]);
    }

    public function dipafter(Request $request)
    {
        
        $project = Project::find($request->project_id);
    

        $outcomes = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->select('outcomes.*')->where('projects.id', $request->project_id)
            ->get();



        $outputs = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->select('outputs.*')->where('projects.id', $request->project_id)
            ->get();

        $activities = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->join('activities', 'activities.output_id', 'outputs.id')
            ->select('activities.*')
            ->whereYear('activities.start', '=', $request->year)
            ->where('projects.id', $request->project_id)
            ->get();


        $acrr = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->join('activities', 'activities.output_id', 'outputs.id')
            ->join('activityafters', 'activityafters.activity_id', 'activities.id')
            ->select('activityafters.year')
            ->where('activityafters.before_after', 'after')
            ->where('projects.id', $request->project_id)
            ->groupBy('year')
            ->get();

        $activitiesafter = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->join('activities', 'activities.output_id', 'outputs.id')
            ->join('activityafters', 'activityafters.activity_id', 'activities.id')
            ->select('activityafters.*')
            ->where('activityafters.before_after', 'after')
            ->where('activityafters.year', $request->year)
            ->where('projects.id', $request->project_id)
            ->get();


        $units = Unit::all();
        $ir_office = IR_Office::find($project->ir_office);

        $donors = explode(',', $project->donors);

        $alldonors = Donor::all();

        $cur = Currency::all();

        return view('reports.templates.dip')->with(['when'=>'after','period'=>$request->year, 'alldonors' => $alldonors, 'donors' => $donors, 'currency' => $cur, 'ir_office' => $ir_office, 'units' => $units, 'activitiesafter' => $activitiesafter, 'activities' => $activities, 'project' => $project, 'outcomes' => $outcomes, 'outputs' => $outputs]);
    }

    public function repo($id)
    {
        $project = Project::find($id);

        $outcomes = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->select('outcomes.*')->where('projects.id', $id)
            ->get();

        $outputs = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->select('outputs.*')->where('projects.id', $id)
            ->get();

// $activities = Activity::where('project_id', $id)->get();

        $activities = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->join('activities', 'activities.output_id', 'outputs.id')
            ->select('activities.*')->where('projects.id', $id)
            ->get();

        $activityafter = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->join('activities', 'activities.output_id', 'outputs.id')
            ->join('activityafters', 'activityafters.activity_id', 'activities.id')
            ->select('activityafters.*')->where('projects.id', $id)
            ->get();

        // $activities = Activity::where('project_id', $id)->get();

        return view('reports.templates.monthly')->with(['activitiesafter' => $activityafter, 'activities' => $activities, 'project' => $project, 'outcomes' => $outcomes, 'outputs' => $outputs]);
    }

    public function janrepo($id, $year)
    {

        $project = Project::find($id);
        $outcomes = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->select('outcomes.*')->where('projects.id', $id)
            ->get();

        $outputs = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->select('outputs.*')->where('projects.id', $id)
            ->get();

        $outputindicators = Indicator::where('project_id', $id)->where('output_id', '!=', 0)->get();

        $outcomeindicators = Indicator::where('project_id', $id)->where('outcome_id', '!=', 0)->get();

        $goalindicators = Indicator::where('project_id', $id)->where('goal_id', '!=', 0)->get();

        $indicatorsafter = \DB::table('projects')
            ->join('indicators', 'indicators.project_id', 'projects.id')
            ->join('indicatorafters', 'indicatorafters.indicator_id', 'indicators.id')
            ->select('indicatorafters.*')->where('projects.id', $id)
            ->where('indicatorafters.before_after', 'after')
            ->get();

        $month = 'January';

        $challenges = Challenge::where('project_id', $id)->get();

        return view('reports.templates.monthly')->with(['challenges' => $challenges, 'month' => $month, 'goalindicators' => $goalindicators, 'outcomeindicators' => $outcomeindicators, 'year' => $year, 'indicatorsafter' => $indicatorsafter, 'outputindicators' => $outputindicators, 'project' => $project, 'outcomes' => $outcomes, 'outputs' => $outputs]);
    }

    public function febrepo($id, $year)
    {

        $project = Project::find($id);
        $outcomes = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->select('outcomes.*')->where('projects.id', $id)
            ->get();

        $outputs = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')

            ->select('outputs.*')->where('projects.id', $id)
            ->get();

        $outputindicators = Indicator::where('project_id', $id)->get();

        $indicatorsafter = \DB::table('projects')
            ->join('indicators', 'indicators.project_id', 'projects.id')
            ->join('indicatorafters', 'indicatorafters.indicator_id', 'indicators.id')
            ->select('indicatorafters.*')->where('projects.id', $id)
            ->where('indicatorafters.before_after', 'after')
            ->get();

        $month = 'February';
        $challenges = Challenge::where('project_id', $id)->get();

        // $activities = Activity::where('project_id', $id)->get();
        return view('reports.templates.monthly')->with(['challenges' => $challenges, 'year' => $year, 'month' => $month, 'indicatorsafter' => $indicatorsafter, 'outputindicators' => $outputindicators, 'project' => $project, 'outcomes' => $outcomes, 'outputs' => $outputs]);
    }

    public function marrepo($id, $year)
    {

        $project = Project::find($id);
        $outcomes = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->select('outcomes.*')->where('projects.id', $id)
            ->get();

        $outputs = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')

            ->select('outputs.*')->where('projects.id', $id)
            ->get();

        $outputindicators = Indicator::where('project_id', $id)->get();

        $indicatorsafter = \DB::table('projects')
            ->join('indicators', 'indicators.project_id', 'projects.id')
            ->join('indicatorafters', 'indicatorafters.indicator_id', 'indicators.id')
            ->select('indicatorafters.*')->where('projects.id', $id)
            ->where('indicatorafters.before_after', 'after')
            ->get();

        $month = 'March';
        // $activities = Activity::where('project_id', $id)->get();

        $challenges = Challenge::where('project_id', $id)->get();

        return view('reports.templates.monthly')->with(['challenges' => $challenges, 'year' => $year, 'month' => $month, 'indicatorsafter' => $indicatorsafter, 'outputindicators' => $outputindicators, 'project' => $project, 'outcomes' => $outcomes, 'outputs' => $outputs]);
    }

    public function aprrepo($id, $year)
    {

        $project = Project::find($id);
        $outcomes = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->select('outcomes.*')->where('projects.id', $id)
            ->get();

        $outputs = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')

            ->select('outputs.*')->where('projects.id', $id)
            ->get();

        $outputindicators = Indicator::where('project_id', $id)->get();

        $indicatorsafter = \DB::table('projects')
            ->join('indicators', 'indicators.project_id', 'projects.id')
            ->join('indicatorafters', 'indicatorafters.indicator_id', 'indicators.id')
            ->select('indicatorafters.*')->where('projects.id', $id)
            ->where('indicatorafters.before_after', 'after')
            ->get();

        $month = 'April';
        // $activities = Activity::where('project_id', $id)->get();

        $challenges = Challenge::where('project_id', $id)->get();

        return view('reports.templates.monthly')->with(['challenges' => $challenges, 'year' => $year, 'month' => $month, 'indicatorsafter' => $indicatorsafter, 'outputindicators' => $outputindicators, 'project' => $project, 'outcomes' => $outcomes, 'outputs' => $outputs]);
    }

    public function mayrepo($id, $year)
    {

        $project = Project::find($id);
        $outcomes = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->select('outcomes.*')->where('projects.id', $id)
            ->get();

        $outputs = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')

            ->select('outputs.*')->where('projects.id', $id)
            ->get();

        $outputindicators = Indicator::where('project_id', $id)->get();

        $indicatorsafter = \DB::table('projects')
            ->join('indicators', 'indicators.project_id', 'projects.id')
            ->join('indicatorafters', 'indicatorafters.indicator_id', 'indicators.id')
            ->select('indicatorafters.*')->where('projects.id', $id)
            ->where('indicatorafters.before_after', 'after')
            ->get();

        $month = 'May';

        // $activities = Activity::where('project_id', $id)->get();
        $challenges = Challenge::where('project_id', $id)->get();
        return view('reports.templates.monthly')->with(['challenges' => $challenges, 'year' => $year, 'month' => $month, 'indicatorsafter' => $indicatorsafter, 'outputindicators' => $outputindicators, 'project' => $project, 'outcomes' => $outcomes, 'outputs' => $outputs]);
    }

    public function junrepo($id, $year)
    {

        $project = Project::find($id);
        $outcomes = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->select('outcomes.*')->where('projects.id', $id)
            ->get();

        $outputs = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')

            ->select('outputs.*')->where('projects.id', $id)
            ->get();

        $outputindicators = Indicator::where('project_id', $id)->get();

        $indicatorsafter = \DB::table('projects')
            ->join('indicators', 'indicators.project_id', 'projects.id')
            ->join('indicatorafters', 'indicatorafters.indicator_id', 'indicators.id')
            ->select('indicatorafters.*')->where('projects.id', $id)
            ->where('indicatorafters.before_after', 'after')
            ->get();

        $month = 'June';
        $challenges = Challenge::where('project_id', $id)->get();

        // $activities = Activity::where('project_id', $id)->get();
        return view('reports.templates.monthly')->with(['challenges' => $challenges, 'year' => $year, 'month' => $month, 'indicatorsafter' => $indicatorsafter, 'outputindicators' => $outputindicators, 'project' => $project, 'outcomes' => $outcomes, 'outputs' => $outputs]);
    }

    public function julrepo($id, $year)
    {

        $project = Project::find($id);
        $outcomes = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->select('outcomes.*')->where('projects.id', $id)
            ->get();

        $outputs = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')

            ->select('outputs.*')->where('projects.id', $id)
            ->get();

        $outputindicators = Indicator::where('project_id', $id)->get();

        $indicatorsafter = \DB::table('projects')
            ->join('indicators', 'indicators.project_id', 'projects.id')
            ->join('indicatorafters', 'indicatorafters.indicator_id', 'indicators.id')
            ->select('indicatorafters.*')->where('projects.id', $id)
            ->where('indicatorafters.before_after', 'after')
            ->get();

        $month = 'July';

        $challenges = Challenge::where('project_id', $id)->get();
        // $activities = Activity::where('project_id', $id)->get();
        return view('reports.templates.monthly')->with(['challenges' => $challenges, 'year' => $year, 'month' => $month, 'indicatorsafter' => $indicatorsafter, 'outputindicators' => $outputindicators, 'project' => $project, 'outcomes' => $outcomes, 'outputs' => $outputs]);
    }

    public function augrepo($id, $year)
    {

        $project = Project::find($id);
        $outcomes = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->select('outcomes.*')->where('projects.id', $id)
            ->get();

        $outputs = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')

            ->select('outputs.*')->where('projects.id', $id)
            ->get();

        $outputindicators = Indicator::where('project_id', $id)->get();

        $indicatorsafter = \DB::table('projects')
            ->join('indicators', 'indicators.project_id', 'projects.id')
            ->join('indicatorafters', 'indicatorafters.indicator_id', 'indicators.id')
            ->select('indicatorafters.*')->where('projects.id', $id)
            ->where('indicatorafters.before_after', 'after')
            ->get();

        $month = 'August';
        $challenges = Challenge::where('project_id', $id)->get();

        // $activities = Activity::where('project_id', $id)->get();
        return view('reports.templates.monthly')->with(['challenges' => $challenges, 'year' => $year, 'month' => $month, 'indicatorsafter' => $indicatorsafter, 'outputindicators' => $outputindicators, 'project' => $project, 'outcomes' => $outcomes, 'outputs' => $outputs]);
    }

    public function seprepo($id, $year)
    {

        $project = Project::find($id);
        $outcomes = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->select('outcomes.*')->where('projects.id', $id)
            ->get();

        $outputs = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')

            ->select('outputs.*')->where('projects.id', $id)
            ->get();

        $outputindicators = Indicator::where('project_id', $id)->get();

        $indicatorsafter = \DB::table('projects')
            ->join('indicators', 'indicators.project_id', 'projects.id')
            ->join('indicatorafters', 'indicatorafters.indicator_id', 'indicators.id')
            ->select('indicatorafters.*')->where('projects.id', $id)
            ->where('indicatorafters.before_after', 'after')
            ->get();

        $month = 'September';
        $challenges = Challenge::where('project_id', $id)->get();

        // $activities = Activity::where('project_id', $id)->get();
        return view('reports.templates.monthly')->with(['challenges' => $challenges, 'year' => $year, 'month' => $month, 'indicatorsafter' => $indicatorsafter, 'outputindicators' => $outputindicators, 'project' => $project, 'outcomes' => $outcomes, 'outputs' => $outputs]);
    }

    public function octrepo($id, $year)
    {

        $project = Project::find($id);
        $outcomes = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->select('outcomes.*')->where('projects.id', $id)
            ->get();

        $outputs = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')

            ->select('outputs.*')->where('projects.id', $id)
            ->get();

        $outputindicators = Indicator::where('project_id', $id)->get();

        $indicatorsafter = \DB::table('projects')
            ->join('indicators', 'indicators.project_id', 'projects.id')
            ->join('indicatorafters', 'indicatorafters.indicator_id', 'indicators.id')
            ->select('indicatorafters.*')->where('projects.id', $id)
            ->where('indicatorafters.before_after', 'after')
            ->get();

        $month = 'October';
        $challenges = Challenge::where('project_id', $id)->get();

        // $activities = Activity::where('project_id', $id)->get();
        return view('reports.templates.monthly')->with(['challenges' => $challenges, 'year' => $year, 'month' => $month, 'indicatorsafter' => $indicatorsafter, 'outputindicators' => $outputindicators, 'project' => $project, 'outcomes' => $outcomes, 'outputs' => $outputs]);
    }

    public function novrepo($id, $year)
    {

        $project = Project::find($id);
        $outcomes = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->select('outcomes.*')->where('projects.id', $id)
            ->get();

        $outputs = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')

            ->select('outputs.*')->where('projects.id', $id)
            ->get();

        $outputindicators = Indicator::where('project_id', $id)->get();

        $indicatorsafter = \DB::table('projects')
            ->join('indicators', 'indicators.project_id', 'projects.id')
            ->join('indicatorafters', 'indicatorafters.indicator_id', 'indicators.id')
            ->select('indicatorafters.*')->where('projects.id', $id)
            ->where('indicatorafters.before_after', 'after')
            ->get();

        $month = 'November';
        $challenges = Challenge::where('project_id', $id)->get();

        return view('reports.templates.monthly')->with(['challenges' => $challenges, 'year' => $year, 'month' => $month, 'indicatorsafter' => $indicatorsafter, 'outputindicators' => $outputindicators, 'project' => $project, 'outcomes' => $outcomes, 'outputs' => $outputs]);
    }

    public function decrepo($id, $year)
    {

        $project = Project::find($id);
        $outcomes = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->select('outcomes.*')->where('projects.id', $id)
            ->get();

        $outputs = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')

            ->select('outputs.*')->where('projects.id', $id)
            ->get();

        $outputindicators = Indicator::where('project_id', $id)->get();

        $indicatorsafter = \DB::table('projects')
            ->join('indicators', 'indicators.project_id', 'projects.id')
            ->join('indicatorafters', 'indicatorafters.indicator_id', 'indicators.id')
            ->select('indicatorafters.*')->where('projects.id', $id)
            ->where('indicatorafters.before_after', 'after')
            ->get();

        $month = 'December';
        $challenges = Challenge::where('project_id', $id)->get();

        // $activities = Activity::where('project_id', $id)->get();

        return view('reports.templates.monthly')->with(['challenges' => $challenges, 'year' => $year, 'month' => $month, 'indicatorsafter' => $indicatorsafter, 'outputindicators' => $outputindicators, 'project' => $project, 'outcomes' => $outcomes, 'outputs' => $outputs]);
    }

    public function qrt1repo($id, $year)
    {

        $project = Project::find($id);
        $outcomes = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->select('outcomes.*')->where('projects.id', $id)
            ->get();

        $outputs = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->select('outputs.*')->where('projects.id', $id)
            ->get();

        $outputindicators = Indicator::where('project_id', $id)->where('output_id', '!=', 0)->get();

        $outcomeindicators = Indicator::where('project_id', $id)->where('outcome_id', '!=', 0)->get();

        $goalindicators = Indicator::where('project_id', $id)->where('goal_id', '!=', 0)->get();

        $indicatorsafter = \DB::table('projects')
            ->join('indicators', 'indicators.project_id', 'projects.id')
            ->join('indicatorafters', 'indicatorafters.indicator_id', 'indicators.id')
            ->select('indicatorafters.*')->where('projects.id', $id)
            ->where('indicatorafters.before_after', 'after')
            ->get();

        $qrt = 'QRT 1';
        $challenges = Challenge::where('project_id', $id)->get();
        return view('reports.templates.quarterly')->with(['challenges' => $challenges, 'qrt' => $qrt, 'goalindicators' => $goalindicators, 'outcomeindicators' => $outcomeindicators, 'year' => $year, 'indicatorsafter' => $indicatorsafter, 'outputindicators' => $outputindicators, 'project' => $project, 'outcomes' => $outcomes, 'outputs' => $outputs]);
    }

    public function qrt2repo($id, $year)
    {

        $project = Project::find($id);
        $outcomes = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->select('outcomes.*')->where('projects.id', $id)
            ->get();

        $outputs = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->select('outputs.*')->where('projects.id', $id)
            ->get();

        $outputindicators = Indicator::where('project_id', $id)->where('output_id', '!=', 0)->get();

        $outcomeindicators = Indicator::where('project_id', $id)->where('outcome_id', '!=', 0)->get();

        $goalindicators = Indicator::where('project_id', $id)->where('goal_id', '!=', 0)->get();

        $indicatorsafter = \DB::table('projects')
            ->join('indicators', 'indicators.project_id', 'projects.id')
            ->join('indicatorafters', 'indicatorafters.indicator_id', 'indicators.id')
            ->select('indicatorafters.*')->where('projects.id', $id)
            ->where('indicatorafters.before_after', 'after')
            ->get();
        // return $indicatorsafter;
        $qrt = 'QRT 2';

        $challenges = Challenge::where('project_id', $id)->get();
        return view('reports.templates.quarterly')->with(['challenges' => $challenges, 'qrt' => $qrt, 'goalindicators' => $goalindicators, 'outcomeindicators' => $outcomeindicators, 'year' => $year, 'indicatorsafter' => $indicatorsafter, 'outputindicators' => $outputindicators, 'project' => $project, 'outcomes' => $outcomes, 'outputs' => $outputs]);
    }
    public function qrt3repo($id, $year)
    {

        $project = Project::find($id);
        $outcomes = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->select('outcomes.*')->where('projects.id', $id)
            ->get();

        $outputs = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->select('outputs.*')->where('projects.id', $id)
            ->get();

        $outputindicators = Indicator::where('project_id', $id)->where('output_id', '!=', 0)->get();

        $outcomeindicators = Indicator::where('project_id', $id)->where('outcome_id', '!=', 0)->get();

        $goalindicators = Indicator::where('project_id', $id)->where('goal_id', '!=', 0)->get();

        $indicatorsafter = \DB::table('projects')
            ->join('indicators', 'indicators.project_id', 'projects.id')
            ->join('indicatorafters', 'indicatorafters.indicator_id', 'indicators.id')
            ->select('indicatorafters.*')->where('projects.id', $id)
            ->where('indicatorafters.before_after', 'after')
            ->get();
        // return $indicatorsafter;
        $qrt = 'QRT 3';

        $challenges = Challenge::where('project_id', $id)->get();
        return view('reports.templates.quarterly')->with(['challenges' => $challenges, 'qrt' => $qrt, 'goalindicators' => $goalindicators, 'outcomeindicators' => $outcomeindicators, 'year' => $year, 'indicatorsafter' => $indicatorsafter, 'outputindicators' => $outputindicators, 'project' => $project, 'outcomes' => $outcomes, 'outputs' => $outputs]);
    }

    public function qrt4repo($id, $year)
    {

        $project = Project::find($id);
        $outcomes = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->select('outcomes.*')->where('projects.id', $id)
            ->get();

        $outputs = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->select('outputs.*')->where('projects.id', $id)
            ->get();

        $outputindicators = Indicator::where('project_id', $id)->where('output_id', '!=', 0)->get();

        $outcomeindicators = Indicator::where('project_id', $id)->where('outcome_id', '!=', 0)->get();

        $goalindicators = Indicator::where('project_id', $id)->where('goal_id', '!=', 0)->get();

        $indicatorsafter = \DB::table('projects')
            ->join('indicators', 'indicators.project_id', 'projects.id')
            ->join('indicatorafters', 'indicatorafters.indicator_id', 'indicators.id')
            ->select('indicatorafters.*')->where('projects.id', $id)
            ->where('indicatorafters.before_after', 'after')
            ->get();
        // return $indicatorsafter;
        $qrt = 'QRT 4';
        $challenges = Challenge::where('project_id', $id)->get();

        return view('reports.templates.quarterly')->with(['challenges' => $challenges, 'qrt' => $qrt, 'goalindicators' => $goalindicators, 'outcomeindicators' => $outcomeindicators, 'year' => $year, 'indicatorsafter' => $indicatorsafter, 'outputindicators' => $outputindicators, 'project' => $project, 'outcomes' => $outcomes, 'outputs' => $outputs]);
    }

    public function yearlyrepo($id, $year)
    {

        $project = Project::find($id);
        $outcomes = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->select('outcomes.*')->where('projects.id', $id)
            ->get();

        $outputs = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->select('outputs.*')->where('projects.id', $id)
            ->get();

        $outputindicators = Indicator::where('project_id', $id)->where('output_id', '!=', 0)->get();

        $outcomeindicators = Indicator::where('project_id', $id)->where('outcome_id', '!=', 0)->get();

        $goalindicators = Indicator::where('project_id', $id)->where('goal_id', '!=', 0)->get();

        $indicatorsafter = \DB::table('projects')
            ->join('indicators', 'indicators.project_id', 'projects.id')
            ->join('indicatorafters', 'indicatorafters.indicator_id', 'indicators.id')
            ->select('indicatorafters.*')->where('projects.id', $id)
            ->where('indicatorafters.before_after', 'after')
            ->get();
        // return $indicatorsafter;
        $challenges = Challenge::where('project_id', $id)->get();

        return view('reports.templates.yearly')->with(['challenges' => $challenges, 'goalindicators' => $goalindicators, 'outcomeindicators' => $outcomeindicators, 'year' => $year, 'indicatorsafter' => $indicatorsafter, 'outputindicators' => $outputindicators, 'project' => $project, 'outcomes' => $outcomes, 'outputs' => $outputs]);
    }

    public function budget($id)
    {

        $project = Project::find($id);
        $outcomes = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->select('outcomes.*')->where('projects.id', $id)
            ->get();

        $outputs = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->select('outputs.*')->where('projects.id', $id)
            ->orderBy('created_at', 'desc')->paginate(6);

// $activities = Activity::where('project_id', $id)->get();

        $activities = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->join('activities', 'activities.output_id', 'outputs.id')
            ->select('activities.*')->where('projects.id', $id)
            ->get();

        $activityafter = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->join('activities', 'activities.output_id', 'outputs.id')
            ->join('activityafters', 'activityafters.activity_id', 'activities.id')
            ->select('activityafters.*')->where('projects.id', $id)
            ->get();

        return view('reports.templates.budget')->with(['activitiesafter' => $activityafter, 'activities' => $activities, 'project' => $project, 'outcomes' => $outcomes, 'outputs' => $outputs]);
    }

    public function bva($id)
    {
        $project = Project::find($id);
        $outcomes = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->select('outcomes.*')->where('projects.id', $id)
            ->get();

        $outputs = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->select('outputs.*')->where('projects.id', $id)
            ->orderBy('created_at', 'desc')->paginate(6);

// $activities = Activity::where('project_id', $id)->get();

        $activities = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->join('activities', 'activities.output_id', 'outputs.id')
            ->select('activities.*')->where('projects.id', $id)
            ->get();

        $activityafter = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->join('activities', 'activities.output_id', 'outputs.id')
            ->join('activityafters', 'activityafters.activity_id', 'activities.id')
            ->select('activityafters.*')->where('projects.id', $id)
            ->get();

        return view('reports.templates.bva')->with(['activitiesafter' => $activityafter, 'activities' => $activities, 'project' => $project, 'outcomes' => $outcomes, 'outputs' => $outputs]);
    }

    public function beneficiary($id, $year)
    {
        $project = Project::find($id);
        $outcomes = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->select('outcomes.*')->where('projects.id', $id)
            ->get();

        $outputs = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->select('outputs.*')->where('projects.id', $id)
            ->orderBy('created_at', 'desc')->paginate(6);

// $activities = Activity::where('project_id', $id)->get();

        $activities = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->join('activities', 'activities.output_id', 'outputs.id')
            ->select('activities.*')->where('projects.id', $id)
            ->get();

        $activityafter = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->join('activities', 'activities.output_id', 'outputs.id')
            ->join('activityafters', 'activityafters.activity_id', 'activities.id')
            ->select('activityafters.*')->where('projects.id', $id)
            ->get();

        return view('reports.templates.beneficiary')->with(['year' => $year, 'activitiesafter' => $activityafter, 'activities' => $activities, 'project' => $project, 'outcomes' => $outcomes, 'outputs' => $outputs]);
    }

    public function benefi($id, $year)
    {
        $project = Project::find($id);
        $outcomes = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->select('outcomes.*')->where('projects.id', $id)
            ->get();

        $outputs = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->select('outputs.*')->where('projects.id', $id)
            ->orderBy('created_at', 'desc')->paginate(6);

        $activities = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->join('activities', 'activities.output_id', 'outputs.id')
            ->select('activities.*')->where('projects.id', $id)
            ->get();

        $activityafter = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->join('activities', 'activities.output_id', 'outputs.id')
            ->join('activityafters', 'activityafters.activity_id', 'activities.id')
            ->select('activityafters.*')->where('projects.id', $id)
            ->get();

        return view('reports.templates.benefi')->with(['year' => $year, 'activitiesafter' => $activityafter, 'activities' => $activities, 'project' => $project, 'outcomes' => $outcomes, 'outputs' => $outputs]);
    }

    public function riskbefore($id)
    {
        $project = Project::find($id);
        $risks = Risk::where('project_id', $id)->orderBy('created_at', 'desc')->paginate(5);
        $when = 'before';

        $risksafter = Risksafter::all();

        return view('reports.templates.risk')->with(['risksafter' => $risksafter, 'when' => $when, 'risks' => $risks, 'project' => $project]);
    }

    public function riskafter($id)
    {
        $project = Project::find($id);
        $risks = \DB::table('risks')
            ->join('risksafters', 'risks.id', 'risksafters.risk_id')
            ->select('risks.*')->where('risks.project_id', $id)
            ->paginate(10);

        $when = 'after';

        $risksafter = Risksafter::all();

        return view('reports.templates.risk')->with(['risksafter' => $risksafter, 'when' => $when, 'risks' => $risks, 'project' => $project]);
    }

    public function assumptionbefore($id)
    {
        $project = Project::find($id);
        $assumptions = Assumption::where('project_id', $id)->orderBy('created_at', 'desc')->paginate(5);
        $when = 'before';
        $assumptionsafter = AssumptionAfter::all();

        return view('reports.templates.assumptions')->with(['assumptionsafter' => $assumptionsafter, 'when' => $when, 'assumptions' => $assumptions, 'project' => $project]);
    }

    public function assumptionafter($id)
    {
        $assumptionsafter = AssumptionAfter::all();

        $project = Project::find($id);
        $when = 'after';
        $assumptions = \DB::table('assumptions')
            ->join('assumption_afters', 'assumptions.id', 'assumption_afters.assumption_id')
            ->select('assumptions.*')->where('assumptions.project_id', $id)
            ->paginate(10);

        return view('reports.templates.assumptions')->with(['assumptionsafter' => $assumptionsafter, 'when' => $when, 'assumptions' => $assumptions, 'project' => $project]);
    }

    public function pars($id)
    {
        $project = Project::find($id);
        $outcomes = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->select('outcomes.*')->where('projects.id', $id)
            ->get();

        $outputs = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->select('outputs.*')->where('projects.id', $id)
            ->orderBy('created_at', 'desc')->paginate(6);

// $activities = Activity::where('project_id', $id)->get();

        $activities = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->join('activities', 'activities.output_id', 'outputs.id')
            ->select('activities.*')->where('projects.id', $id)
            ->get();

        $activityafter = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->join('activities', 'activities.output_id', 'outputs.id')
            ->join('activityafters', 'activityafters.activity_id', 'activities.id')
            ->select('activityafters.*')->where('projects.id', $id)
            ->get();

        $partners = Partner::all();

        return view('reports.templates.partners')->with(['partners' => $partners, 'activitiesafter' => $activityafter, 'activities' => $activities, 'project' => $project, 'outcomes' => $outcomes, 'outputs' => $outputs]);
    }
    public function outputdetails($id)
    {

        $output = Output::find($id);

        $project = Project::find($output->project_id);

        return view('details.output')->with(['output' => $output, 'project' => $project]);

    }
    public function outcomedetails($id)
    {
        $outcome = outcome::find($id);

        $project = Project::find($outcome->project_id);

        return view('details.outcome')->with(['outcome' => $outcome, 'project' => $project]);

    }
    public function reports($id)
    {

        $project = Project::find($id);
        $outcomes = outcome::where('project_id', $id)->get();

        $datetime1 = new \DateTime($project->start);
        $datetime2 = new \DateTime($project->end);
        $interval = $datetime1->diff($datetime2);
        $years = $interval->format('%y');

        $months = $interval->format('%m');
        $days = $interval->format('%d');
        if ($months > 0 || ($months == 0 && $days > 0)) {
            $years++;
        }
        if ($years < 1) {
            $years = 1;
        }

        return view('pages.reports')->with(['years' => $years, 'project' => $project, 'outcomes' => $outcomes]);

    }

    public function years($id)
    {

        return $id;
    }

    public function perfomance($id, $year)
    {

        $project = Project::find($id);
        $outcomes = outcome::where('project_id', $id)->get();

        return view('pages.projectperfomance')->with(['year' => $year, 'project' => $project, 'outcomes' => $outcomes]);

    }

    public function activitydetails($id)
    {
        $activity = Activity::find($id);
        $output = Output::find($activity->output_id);
        $outcome = outcome::find($output->outcome_id);
        $project = Project::find($outcome->project_id);

        return view('details.activity')->with(['activity' => $activity, 'output' => $output, 'outcome' => $outcome, 'project' => $project]);

    }

    public function unauthenticated()
    {
        return view('pages.unauthenticated');
    }

}
