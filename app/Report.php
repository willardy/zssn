<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = ['survivor_reporter_id', 'survivor_infected_id'];

    function survivorInfected()
    {
        return $this->belongsTo('App\Survivor');
    }

    function survivorReporter()
    {
        return $this->belongsTo('App\Survivor');
    }
}
