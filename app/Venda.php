<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $fillable = ['purchaser_name', 'description', 'price', 'count', 'merchant_address', 'merchant_name'];
}
