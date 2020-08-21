<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $guarded = [];

    public function state(){
        return $this->belongsTo(Profile::class);
    }
}
