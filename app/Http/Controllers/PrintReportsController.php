<?php

namespace App\Http\Controllers;

use App\Project;
use Maatwebsite\Excel\Facades\Excel;

class PrintReportsController extends Controller
{
    public function index()
    {
        Excel::create('Project Details', function ($excel) {

            // Set the title
            $excel->setTitle('Project Profile Report');

            // Chain the setters
            $excel->setCreator('Islamic Relief Kenya')->setCompany('eBMS');

            $excel->setDescription('Project profile');

            $data = Project::get()->toArray();

            $excel->sheet('Sheet 1', function ($sheet) use ($data) {
                $sheet->setOrientation('landscape');
                $sheet->fromArray($data, null, 'A3');
            });

        })->export('xlsx');

    }
}
