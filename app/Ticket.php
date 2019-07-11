<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{   
    protected $guarded = ['id'];

    function comments(){
        return $this->morphMany('App\comment','ticket');
    }
}
