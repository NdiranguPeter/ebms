<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
  protected $fillable = ['user_id', 'project_id', 'goal_id', 'outcome_id', 'output_id', 'name', 'scoring', 'i_order','unit', 'baseline_target', 'project_target', 'start','end'];
    protected $table = "indicators";

}
