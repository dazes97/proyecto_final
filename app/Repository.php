<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repository extends Model
{
    protected $fillable = ['name','description','client_id'];

    public function files(){
    	return $this->belongsToMany(File::class,'file_repository','repository_id','file_id')->withTimestamps();
    }

    public function root( $client ){
    	return $this->all()->where('client_id', $client);
    }
}
