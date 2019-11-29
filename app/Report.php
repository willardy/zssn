<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = ['survivor_reporter_id', 'survivor_infected_id'];

    function survivorInfected()
    {
        return $this->belongsTo(Survivor::class);
    }

    function survivorReporter()
    {
        return $this->belongsTo(Survivor::class);
    }
}
