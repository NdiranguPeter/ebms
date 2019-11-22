<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    protected $table = "challenges";

    protected $fillable = ['project_id','activity_id', 'challenge','solution'];

    public function activity()
    {
        return $this->belongsTo('App\activity');
    }
}
