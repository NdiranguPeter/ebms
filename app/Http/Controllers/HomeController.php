<?php

namespace App\Http\Controllers;

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
    public function admin()
    {
        return view('pages.admin');
    }
    public function regional($year)
    {

        $user = auth()->user();

        if ($user->role == 999 || $user->role == $user->country) {

            $act_b = \DB::table('projects')
                ->join('outcomes', 'outcomes.project_id', 'projects.id')
                ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
                ->join('activities', 'activities.output_id', 'outputs.id')
                ->join('activityafters', 'activityafters.activity_id', 'activities.id')
                ->select('activityafters.*')
                ->where('projects.country', 1)
                ->where('activityafters.year', $year)
                ->where('activityafters.before_after', "before")
                ->get();

            $tt = 0;

            foreach ($act_b as $ac) {
                $tt = $tt + $ac->total_beneficiaries;
            }

            $act_a = \DB::table('projects')
                ->join('outcomes', 'outcomes.project_id', 'projects.id')
                ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
                ->join('activities', 'activities.output_id', 'outputs.id')
                ->join('activityafters', 'activityafters.activity_id', 'activities.id')
                ->select('activityafters.*')
                ->where('projects.country', 1)
                ->where('activityafters.year', $year)
                ->where('activityafters.before_after', "after")
                ->get();

            $tta = 0;

            foreach ($act_a as $acc) {
                $tta = $tta + $acc->total_beneficiaries;
            }

            $kia = \DB::table('projects')
                ->join('indicators', 'indicators.project_id', 'projects.id')
                ->join('indicatorafters', 'indicatorafters.indicator_id', 'indicators.id')
                ->select('indicatorafters.*')
                ->where('projects.country', 1)
                ->where('indicatorafters.before_after', 'after')
                ->where('indicatorafters.year', $year)
                ->get();

            $kib = \DB::table('projects')
                ->join('indicators', 'indicators.project_id', 'projects.id')
                ->join('indicatorafters', 'indicatorafters.indicator_id', 'indicators.id')
                ->select('indicatorafters.*')
                ->where('projects.coutry', 1)
                ->where('indicatorafters.before_after', 'before')
                ->where('indicatorafters.year', $year)
                ->get();

            $act_be = \DB::table('projects')
                ->join('outcomes', 'outcomes.project_id', 'projects.id')
                ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
                ->join('activities', 'activities.output_id', 'outputs.id')
                ->join('activityafters', 'activityafters.activity_id', 'activities.id')
                ->select('activityafters.*')
                ->where('projects.country', 3)
                ->where('activityafters.year', $year)
                ->where('activityafters.before_after', "before")
                ->get();

            $tte = 0;

            foreach ($act_be as $ace) {
                $tte = $tte + $ace->total_beneficiaries;
            }

            $act_ae = \DB::table('projects')
                ->join('outcomes', 'outcomes.project_id', 'projects.id')
                ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
                ->join('activities', 'activities.output_id', 'outputs.id')
                ->join('activityafters', 'activityafters.activity_id', 'activities.id')
                ->select('activityafters.*')
                ->where('projects.country', 3)
                ->where('activityafters.year', $year)
                ->where('activityafters.before_after', "after")
                ->get();

            $ttae = 0;

            foreach ($act_ae as $acce) {
                $ttae = $ttae + $acce->total_beneficiaries;
            }

            $act_bsom = \DB::table('projects')
                ->join('outcomes', 'outcomes.project_id', 'projects.id')
                ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
                ->join('activities', 'activities.output_id', 'outputs.id')
                ->join('activityafters', 'activityafters.activity_id', 'activities.id')
                ->select('activityafters.*')
                ->where('projects.country', 2)
                ->where('activityafters.year', $year)
                ->where('activityafters.before_after', "before")
                ->get();

            $ttsom = 0;

            foreach ($act_bsom as $acsom) {
                $ttsom = $ttsom + $acsom->total_beneficiaries;
            }

            $act_asom = \DB::table('projects')
                ->join('outcomes', 'outcomes.project_id', 'projects.id')
                ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
                ->join('activities', 'activities.output_id', 'outputs.id')
                ->join('activityafters', 'activityafters.activity_id', 'activities.id')
                ->select('activityafters.*')
                ->where('projects.country', 2)
                ->where('activityafters.year', $year)
                ->where('activityafters.before_after', "after")
                ->get();

            $ttasom = 0;

            foreach ($act_asom as $accsom) {
                $ttasom = $ttasom + $accsom->total_beneficiaries;
            }

            $act_bsud = \DB::table('projects')
                ->join('outcomes', 'outcomes.project_id', 'projects.id')
                ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
                ->join('activities', 'activities.output_id', 'outputs.id')
                ->join('activityafters', 'activityafters.activity_id', 'activities.id')
                ->select('activityafters.*')
                ->where('projects.country', 4)
                ->where('activityafters.year', $year)
                ->where('activityafters.before_after', "before")
                ->get();

            $ttsud = 0;

            foreach ($act_bsud as $acsud) {
                $ttsud = $ttsud + $acsud->total_beneficiaries;
            }

            $act_asud = \DB::table('projects')
                ->join('outcomes', 'outcomes.project_id', 'projects.id')
                ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
                ->join('activities', 'activities.output_id', 'outputs.id')
                ->join('activityafters', 'activityafters.activity_id', 'activities.id')
                ->select('activityafters.*')
                ->where('projects.country', 4)
                ->where('activityafters.year', $year)
                ->where('activityafters.before_after', "after")
                ->get();

            $ttasud = 0;

            foreach ($act_asud as $accsud) {
                $ttasud = $ttasud + $accsud->total_beneficiaries;
            }

            $act_bss = \DB::table('projects')
                ->join('outcomes', 'outcomes.project_id', 'projects.id')
                ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
                ->join('activities', 'activities.output_id', 'outputs.id')
                ->join('activityafters', 'activityafters.activity_id', 'activities.id')
                ->select('activityafters.*')
                ->where('projects.country', 5)
                ->where('activityafters.year', $year)
                ->where('activityafters.before_after', "before")
                ->get();

            $ttss = 0;

            foreach ($act_bss as $acss) {
                $ttss = $ttss + $acss->total_beneficiaries;
            }

            $act_ass = \DB::table('projects')
                ->join('outcomes', 'outcomes.project_id', 'projects.id')
                ->join('outputs', 'outputs.outcome_id', 'outcomes.id')
                ->join('activities', 'activities.output_id', 'outputs.id')
                ->join('activityafters', 'activityafters.activity_id', 'activities.id')
                ->select('activityafters.*')
                ->where('projects.country', 5)
                ->where('activityafters.year', $year)
                ->where('activityafters.before_after', "after")
                ->get();

            $ttass = 0;

            foreach ($act_ass as $accss) {
                $ttass = $ttass + $accss->total_beneficiaries;
            }

            $allprojects = Project::all();

            return view('regional')->with(['allprojects' => $allprojects, 'tta' => $tta, 'tt' => $tt, 'ttae' => $ttae, 'tte' => $tte, 'ttasom' => $ttasom, 'ttsom' => $ttsom, 'ttasud' => $ttasud, 'ttsud' => $ttsud, 'ttass' => $ttass, 'ttss' => $ttss]);
        }
        if ($user->role == 0) {
            return redirect('/home');
        }

    }

}
