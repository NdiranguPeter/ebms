<?php

namespace App\Exports;

use App\Activity;
use App\Activityafter;
use App\Output;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DipExport implements FromView
{
    public function __construct($id)
    {
        $this->id = $id;
    }
    public function view(): View
    {
        $outcomeid = $this->id;

        $outputs = Output::where('outcome_id', $outcomeid)->get();
        $activities = Activity::all();
        $activityafter = Activityafter::all();

        return view('reports.dip', [
            'outputs' => $outputs,
            'activities' => $activities,
            'activitiesafter' => $activityafter,
        ]);
    }
}
