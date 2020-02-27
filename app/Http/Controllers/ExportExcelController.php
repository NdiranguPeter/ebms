<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\Survey;
use Excel;

class ExportExcelController extends Controller
{

    public function excel($id)
    {

       $survey = Survey::findOrFail($id);

        $questions = Question::where('survey_id', $id)->orderBy('qn_order', 'asc')->get();

        $answers = Answer::where('survey_id', $id)->get();

        $answers_list = Answer::where('survey_id', $id)->groupBy('qn_id')->get();


        $excelData ="";

        if(count($answers_list) >0 ){
            $excelData .='<table><tr>';
            foreach ($answers_list as $answer_list){
                foreach ($questions as $question){
                    
                        if ($question->id == $answer_list->qn_id){

                $excelData .= '<th style="border: 1px solid #ddd; background-color:#ddd; color:#000;">'.$question->column.'</th>';

                    }
                }

            }
            $excelData .='</tr><tr>';


            
            foreach ($answers_list as $answer_list){
                $excelData .= '<td style="border: 1px solid #ddd;"><table>';

                foreach ($answers as $answer){
                if ($answer->qn_id == $answer_list->qn_id){

                    $excelData .= '<tr>';
                    if ($answer->ans == null){
                        $excelData .= '<td></td>';
                    }else{
                        $excelData .= '<td style="border:1px solid #ddd;">'.$answer->ans.'</td>';
                    }
                    $excelData .= '</tr>';
                    }
                }

                $excelData .= '</table></td>';                                        
            }
            $excelData .= '</tr></table>';                       
                                      

        }               

        $filename = $survey->name;

        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename='.$filename.'.xls');

        echo $excelData;


    }
}
