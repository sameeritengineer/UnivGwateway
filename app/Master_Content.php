<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Master_Content extends Model
{
    protected $table = 'master_content';
    protected $fillable = ['content_type','name','description','image','url'];
}
