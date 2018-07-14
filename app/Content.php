<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = ['title','description','image_url','client_id'];

    public function files(){
    	return $this->belongsToMany(File::class,'file_content','content_id','file_id')->withTimestamps();
    }
}
