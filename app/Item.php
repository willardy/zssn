<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['description', 'points'];

    public function resources(){
        return $this->hasMany(Resource::class);
    }

}
