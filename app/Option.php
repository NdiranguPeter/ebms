<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $table = "options";
    protected $fillable = ['question_id', 'name', 'value'];

    public function question()
    {
        return $this->belongsTo('App\Question');
    }
}
