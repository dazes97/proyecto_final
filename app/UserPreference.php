<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPreference extends Model
{
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = "user_id";
    protected $fillable = ['user_id','preference_id','fontsize'];

    public function user(){
    	return $this->belongsTo(User::class,'user_id');
    }

    public function theme(){
    	return $this->belongsTo(Preference::class,'preference_id');
    }
}
