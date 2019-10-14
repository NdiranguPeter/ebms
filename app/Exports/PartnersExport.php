<?php

namespace App\Exports;

use App\Partners;
use Maatwebsite\Excel\Concerns\FromCollection;

class PartnersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Partners::all();
    }
}
