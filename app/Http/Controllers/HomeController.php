<?php

namespace App\Http\Controllers;

use App\Country;
use App\Project;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth' => 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages.dashboard');
    }
    public function regional()
    {
        $projects = Project::all();

        $min_year = \DB::table('projects')->select("projects.start")->get();
        $min = $min_year->min();

        $datetime1 = new \DateTime($min->start);
        $y = $datetime1->format('Y');

       

        $kenyaa = \DB::table('projects')
            ->join('indicators', 'indicators.project_id', 'projects.id')
            ->join('indicatorafters', 'indicatorafters.indicator_id', 'indicators.id')
            ->select('indicatorafters.*')->where('indicatorafters.before_after', 'after')
            ->where('projects.country', 1)
            ->where('indicatorafters.year', $y)
            ->get();

            $ethiopiaa = \DB::table('projects')
    ->join('indicators', 'indicators.project_id', 'projects.id')
    ->join('indicatorafters', 'indicatorafters.indicator_id', 'indicators.id')
    ->select('indicatorafters.*')->where('indicatorafters.before_after', 'after')
    ->where('projects.country', 3)
    ->where('indicatorafters.year', $y)
    ->get();

    $somaliaa = \DB::table('projects')
            ->join('indicators', 'indicators.project_id', 'projects.id')
            ->join('indicatorafters', 'indicatorafters.indicator_id', 'indicators.id')
            ->select('indicatorafters.*')->where('indicatorafters.before_after', 'after')
            ->where('projects.country', 2)
            ->where('indicatorafters.year', $y)
            ->get();


            $southsudana = \DB::table('projects')
            ->join('indicators', 'indicators.project_id', 'projects.id')
            ->join('indicatorafters', 'indicatorafters.indicator_id', 'indicators.id')
            ->select('indicatorafters.*')->where('indicatorafters.before_after', 'after')
            ->where('projects.country', 5)
            ->where('indicatorafters.year', $y)
            ->get();

            $sudana = \DB::table('projects')
            ->join('indicators', 'indicators.project_id', 'projects.id')
            ->join('indicatorafters', 'indicatorafters.indicator_id', 'indicators.id')
            ->select('indicatorafters.*')->where('indicatorafters.before_after', 'after')
            ->where('projects.country', 4)
            ->where('indicatorafters.year', $y)
            ->get();




             $kenyab = \DB::table('projects')
            ->join('indicators', 'indicators.project_id', 'projects.id')
            ->join('indicatorafters', 'indicatorafters.indicator_id', 'indicators.id')
            ->select('indicatorafters.*')->where('indicatorafters.before_after', 'after')
            ->where('projects.country', 1)
            ->where('indicatorafters.year', $y)
            ->get();

            $ethiopiab = \DB::table('projects')
    ->join('indicators', 'indicators.project_id', 'projects.id')
    ->join('indicatorafters', 'indicatorafters.indicator_id', 'indicators.id')
    ->select('indicatorafters.*')->where('indicatorafters.before_after', 'after')
    ->where('projects.country', 3)
    ->where('indicatorafters.year', $y)
    ->get();

    $somaliab = \DB::table('projects')
            ->join('indicators', 'indicators.project_id', 'projects.id')
            ->join('indicatorafters', 'indicatorafters.indicator_id', 'indicators.id')
            ->select('indicatorafters.*')->where('indicatorafters.before_after', 'after')
            ->where('projects.country', 2)
            ->where('indicatorafters.year', $y)
            ->get();


            $southsudanb = \DB::table('projects')
            ->join('indicators', 'indicators.project_id', 'projects.id')
            ->join('indicatorafters', 'indicatorafters.indicator_id', 'indicators.id')
            ->select('indicatorafters.*')->where('indicatorafters.before_after', 'after')
            ->where('projects.country', 5)
            ->where('indicatorafters.year', $y)
            ->get();

            $sudanb = \DB::table('projects')
            ->join('indicators', 'indicators.project_id', 'projects.id')
            ->join('indicatorafters', 'indicatorafters.indicator_id', 'indicators.id')
            ->select('indicatorafters.*')->where('indicatorafters.before_after', 'after')
            ->where('projects.country', 4)
            ->where('indicatorafters.year', $y)
            ->get();


        $activities = \DB::table('projects')
            ->join('outcomes', 'outcomes.project_id', 'projects.id')
            ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
            ->join('activities', 'activities.output_id', 'outputs.id')
            ->select('activities.*')->get();

            // dd($southsudana);

        $countries = Country::all();
        return view('regional')->with(['projects'=>$projects,'sudana'=>$sudana,'sudanb'=>$sudanb, 'southsudana'=>$southsudana,'southsudanb'=>$southsudanb,'somaliaa'=>$somaliaa,'somaliab'=>$somaliab,'ethiopiaa'=>$ethiopiaa,'ethiopiab'=>$ethiopiab,'kenyaa'=>$kenyaa, 'kenyab'=>$kenyab,'activities' => $activities, 'countries' => $countries]);
    }

}
