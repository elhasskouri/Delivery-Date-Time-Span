<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    public function partners() {
    	return $this->hasMany('App\Partner');
    }
}
