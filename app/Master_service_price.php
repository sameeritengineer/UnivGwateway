<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Master_service_price extends Model
{
    protected $table = 'master_service_price';
    protected $fillable = ['service_id','text','amount','quantity'];
}
