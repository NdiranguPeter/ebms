<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['user_id', 'survey_id', 'group_id', 'name', 'type', 'qn_order','mandatory', 'column', 'hint', 'default','skip'];
    protected $table = "questions";

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function survey()
    {
        return $this->belongsTo('App\Survey');
    }
    public function options()
    {
        return $this->hasMany('App\Option');
    }
    public function groups()
    {
        return $this->hasMany('App\Group');
    }
}
