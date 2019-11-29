<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model {
    protected $fillable = ['survivor_id', 'item_id', 'quantity'];

    public function survivors() {
        return $this->belongsTo(Survivor::class);
    }

    public function items() {
        return $this->belongsTo(Item::class);
    }
}
