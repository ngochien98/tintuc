<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table="video";
    public function loaitin(){
    	return $this->belongsTo('App\Loaitin','idLoaiTin','id');
    }

    
}
