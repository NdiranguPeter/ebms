<?php

namespace App\Exports;

use App\Activity;
use App\Output;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CsvExport implements FromView
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

        return view('planning.table', [
            'outputs' => $outputs,
            'activities' => $activities,
        ]);
    }
}
