<?php

namespace App\Exports;

use App\Project;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProjectExport implements FromView
{
    public function __construct($id)
    {
        $this->id = $id;
    }
    public function view(): View
    {
        $projectid = $this->id;
        $project = Project::findOrFail($projectid);

        return view('projects.table', [
            'project' => $project,
        ]);
    }

}
