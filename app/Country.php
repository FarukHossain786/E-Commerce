<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $guarded = [];

    public function country(){
        return $this->belongsTo(Profile::class);
    }
}
