<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survivor extends Model
{
    protected $fillable = ['name', 'age', 'gender', 'infected', 'latitude', 'longitude'];
    protected $appends = ['reportsCount'];

    public function resources()
    {
        return $this->hasMany(Resource::class);
    }

    public function getReportsCountAttribute()
    {
        $rows = $this->reports();
        return $rows->count();
    }

    function reports()
    {
        return $this->hasMany(Report::class, 'survivor_infected_id');
    }
}
