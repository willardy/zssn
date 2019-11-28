<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survivor extends Model
{
    protected $fillable = ['name', 'age', 'gender', 'infected', 'latitude', 'longitude'];

    public function resources()
    {
        return $this->hasMany(Resource::class);
    }
}
