<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
   protected $guarded = ['id'];

    function ticket(){
        return $this->morphTo;
    }
}
