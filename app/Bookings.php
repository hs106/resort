<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
	public function package () {
	        return $this->belongsTo('App\Packages');
	}
}
