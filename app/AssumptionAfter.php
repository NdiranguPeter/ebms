<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssumptionAfter extends Model
{
  protected $table = "assumption_afters";

     protected $fillable = ['assumption_id','occur', 'impact', 'response'];
}
