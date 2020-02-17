<?php

namespace App\Http\Controllers;

use DB;
use Excel;
use App\Answer;
use App\Group;
use App\Option;
use App\Question;
use App\Survey;

class ExportExcelController extends Controller
{
    

    public function excel($id)
    {

        $survey = Survey::findOrFail($id);

        $questions = Question::where('survey_id', $id)->orderBy('qn_order', 'asc')->paginate(10);

        $survey_data = Answer::where('survey_id', $id)->get();

        $survey_headers[] = Answer::where('survey_id', $id)->groupBy('qn_id')->get()->toArray();


        foreach ($survey_headers as $header) {

            // dd($header[0]);

            foreach ($survey_data as $data) {

                    for ($i=0; $i < sizeof($header); $i++) { 
                        
                if ($data->qn_id == $header){
                        

 $header[$i] = $data($i);
                    }
                    }


            }
           
        }
        
        Excel::create('Survey Data', function ($excel) use ($survey_headers) {
            $excel->setTitle('Survey Data');
            $excel->sheet('Survey Data', function ($sheet) use ($survey_headers) {
                $sheet->fromArray($survey_headers, null, 'A1', false, false);
            });
        })->download('xlsx');
    }
}
