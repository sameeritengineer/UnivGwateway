<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lead extends Model
{
    protected $table = 'lead';
    protected $fillable = ['name','email','phone','message','type','status'];
}
