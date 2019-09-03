<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $table = "levels";

    public function user() {
    	return $this->hasOne('App\User');
    }
}
