<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function import()
	{
		return $this->belongsTo('App\Import');
	}
}
