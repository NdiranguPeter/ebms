<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TargetGroup extends Model
{
    protected $table = "target_groups";

    protected $fillable = ['name'];
}
