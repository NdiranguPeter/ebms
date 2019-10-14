<?php

namespace App\Exports;

use App\Activity;
use App\Output;
use App\Outcome;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LogframeExport implements FromView
{
    public function __construct($id)
    {
        $this->id = $id;
    }
    public function view(): View
    {
        $projectid = $this->id;

        
        $outcomes = Outcome::where('project_id', $projectid)->get();
        $outputs = Output::all();
        $activities = Activity::all();

        return view('reports.logframe', [
            'outcomes'=>$outcomes,
            'outputs' => $outputs,
            'activities' => $activities,
        ]);
    }
}
