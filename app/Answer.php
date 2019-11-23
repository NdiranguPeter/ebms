<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['qid','survey_id', 'qn_id', 'ans'];
}
