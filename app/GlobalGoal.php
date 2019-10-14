<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GlobalGoal extends Model
{
    public $table = "global_goals";
    public $fillable = ['global_goal', 'global_split'];
}
