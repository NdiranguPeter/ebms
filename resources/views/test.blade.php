<?php

namespace App\Http\Controllers;

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
    public function admin()
    {
        return view('pages.admin');
    }
    public function regional($year)
    {

        $user = auth()->user();

        if ($user->role == 999) {

           $ind_b = \DB::table('projects')
        ->join('outcomes', 'outcomes.project_id', 'projects.id')
        ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
        ->join('indicators', 'indicators.output_id', 'outputs.id')
        ->join('indicatorafters', 'indicatorafters.indicator_id', 'indicators.id')
        ->select('indicatorafters.*')
        ->where('projects.country', 1)
        ->where('indicatorafters.year', $year)
        ->where('indicatorafters.before_after', "before")
        ->get();
        
        $idd = 0;
        
        foreach ($ind_b as $idd) {
        $idd = $idd + $idd->monthly_total;
        }
        
        $ind_a = \DB::table('projects')
        ->join('outcomes', 'outcomes.project_id', 'projects.id')
        ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
        ->join('indicators', 'indicators.output_id', 'outputs.id')
        ->join('indicatorafters', 'indicatorafters.indicator_id', 'indicators.id')
        ->select('indicatorafters.*')
        ->where('projects.country', 1)
        ->where('indicatorafters.year', $year)
        ->where('indicatorafters.before_after', "after")
        ->get();
        
        $idda = 0;
        
        foreach ($ind_a as $iddc) {
        $idda = $idda + $iddc->monthly_total;
        }
        
        $ind_be = \DB::table('projects')
        ->join('outcomes', 'outcomes.project_id', 'projects.id')
        ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
        ->join('indicators', 'indicators.output_id', 'outputs.id')
        ->join('indicatorafters', 'indicatorafters.indicator_id', 'indicators.id')
        ->select('indicatorafters.*')
        ->where('projects.country', 3)
        ->where('indicatorafters.year', $year)
        ->where('indicatorafters.before_after', "before")
        ->get();
        
        $idde = 0;
        
        foreach ($ind_be as $idde) {
        $idde = $idde + $idde->monthly_total;
        }
        
        $ind_ae = \DB::table('projects')
        ->join('outcomes', 'outcomes.project_id', 'projects.id')
        ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
        ->join('indicators', 'indicators.output_id', 'outputs.id')
        ->join('indicatorafters', 'indicatorafters.indicator_id', 'indicators.id')
        ->select('indicatorafters.*')
        ->where('projects.country', 3)
        ->where('indicatorafters.year', $year)
        ->where('indicatorafters.before_after', "after")
        ->get();
        
        $iddae = 0;
        
        foreach ($ind_ae as $iddce) {
        $iddae = $iddae + $iddce->monthly_total;
        }
        
        $ind_bsom = \DB::table('projects')
        ->join('outcomes', 'outcomes.project_id', 'projects.id')
        ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
        ->join('indicators', 'indicators.output_id', 'outputs.id')
        ->join('indicatorafters', 'indicatorafters.indicator_id', 'indicators.id')
        ->select('indicatorafters.*')
        ->where('projects.country', 2)
        ->where('indicatorafters.year', $year)
        ->where('indicatorafters.before_after', "before")
        ->get();
        
        $iddsom = 0;
        
        foreach ($ind_bsom as $iddsom) {
        $iddsom = $iddsom + $iddsom->monthly_total;
        }
        
        $ind_asom = \DB::table('projects')
        ->join('outcomes', 'outcomes.project_id', 'projects.id')
        ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
        ->join('indicators', 'indicators.output_id', 'outputs.id')
        ->join('indicatorafters', 'indicatorafters.indicator_id', 'indicators.id')
        ->select('indicatorafters.*')
        ->where('projects.country', 2)
        ->where('indicatorafters.year', $year)
        ->where('indicatorafters.before_after', "after")
        ->get();
        
        $iddasom = 0;
        
        foreach ($ind_asom as $iddcsom) {
        $iddasom = $iddasom + $iddcsom->monthly_total;
        }
        
        
        
        
        $ind_bsud = \DB::table('projects')
        ->join('outcomes', 'outcomes.project_id', 'projects.id')
        ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
        ->join('indicators', 'indicators.output_id', 'outputs.id')
        ->join('indicatorafters', 'indicatorafters.indicator_id', 'indicators.id')
        ->select('indicatorafters.*')
        ->where('projects.country', 4)
        ->where('indicatorafters.year', $year)
        ->where('indicatorafters.before_after', "before")
        ->get();
        
        $iddsud = 0;
        
        foreach ($ind_bsud as $iddsud) {
        $iddsud = $iddsud + $iddsud->monthly_total;
        }
        
        $ind_asud = \DB::table('projects')
        ->join('outcomes', 'outcomes.project_id', 'projects.id')
        ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
        ->join('indicators', 'indicators.output_id', 'outputs.id')
        ->join('indicatorafters', 'indicatorafters.indicator_id', 'indicators.id')
        ->select('indicatorafters.*')
        ->where('projects.country', 4)
        ->where('indicatorafters.year', $year)
        ->where('indicatorafters.before_after', "after")
        ->get();
        
        $iddasud = 0;
        
        foreach ($ind_asud as $iddcsud) {
        $iddasud = $iddasud + $iddcsud->monthly_total;
        }
        
        
        
        
        
        $ind_bss = \DB::table('projects')
        ->join('outcomes', 'outcomes.project_id', 'projects.id')
        ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
        ->join('indicators', 'indicators.output_id', 'outputs.id')
        ->join('indicatorafters', 'indicatorafters.indicator_id', 'indicators.id')
        ->select('indicatorafters.*')
        ->where('projects.country', 5)
        ->where('indicatorafters.year', $year)
        ->where('indicatorafters.before_after', "before")
        ->get();
        
        $iddss = 0;
        
        foreach ($ind_bss as $iddss) {
        $iddss = $iddss + $iddss->monthly_total;
        }
        
        $ind_ass = \DB::table('projects')
        ->join('outcomes', 'outcomes.project_id', 'projects.id')
        ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
        ->join('indicators', 'indicators.output_id', 'outputs.id')
        ->join('indicatorafters', 'indicatorafters.indicator_id', 'indicators.id')
        ->select('indicatorafters.*')
        ->where('projects.country', 5)
        ->where('indicatorafters.year', $year)
        ->where('indicatorafters.before_after', "after")
        ->get();
        
        $iddass = 0;
        
        foreach ($ind_ass as $iddcss) {
        $iddass = $iddass + $iddcss->monthly_total;
        }
            return view('regional')->with(['idda' => $idda, 'idd' => $idd, 'iddae' => $iddae, 'idde' => $idde, 'iddasom' => $iddasom, 'iddsom' => $iddsom, 'iddasud' => $iddasud, 'iddsud' => $iddsud,'iddass' => $iddass, 'iddss' => $iddss]);
        }
        if ($user->role == 0) {
            return redirect('/home');
        }

    }

}