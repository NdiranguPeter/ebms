<?php

namespace App\Imports;

use App\Project;
use Maatwebsite\Excel\Concerns\ToModel;

class CsvImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Project([
            'name' => $row['name'],
            'description'=>$row['description'],
            'target_group'=>$row['target group'],
            'partners'=>$row['partners'],
            'location'=>$row['location'],
            'donors'=>$row['donors'],
            'stage'=>$row['stage'],
            'type'=>$row['type'],
            'sector'=>$row['sector'],
        ]);
    }
}
