<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Risksafter extends Model
{
    protected $table = "risksafters";

     protected $fillable = ['risk_id','occur', 'impact', 'response'];
}
