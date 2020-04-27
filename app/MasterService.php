<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterService extends Model
{
    protected $table = 'master_service';
    protected $fillable = ['category_id','service_name','deliverables','description','image','gst_rate','updated_at','created_at','parent_id','service_type','sort'];
}
