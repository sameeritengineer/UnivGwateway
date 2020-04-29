<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Master_category extends Model
{
    protected $table = 'master_categories';
    protected $fillable = ['name','desciption','image','sort','status'];
}
