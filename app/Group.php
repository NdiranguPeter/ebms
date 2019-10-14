<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = "groups";

    protected $fillable = ['survey_id', 'name'];

    public function survey()
    {
        return $this->belongsTo('App\Question');
    }
}
