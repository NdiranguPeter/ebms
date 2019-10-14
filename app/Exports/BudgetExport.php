<?php

namespace App\Exports;

use App\Project;
use Maatwebsite\Excel\Concerns\FromCollection;

class BudgetExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Project::all();
    }
}
