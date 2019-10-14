<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $table = "surveys";

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function questions()
    {
        return $this->hasMany('App\Question');
    }

    public function groups()
    {
        return $this->hasMany('App\Group');
    }
}
