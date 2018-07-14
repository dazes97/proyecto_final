<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Patient extends Model
{
    use SoftDeletes;
    protected $dates = ['delete_at'];
    protected $fillable = ['name','age','gender','birthdate','birthplace','ci','nationality','address','phone','client_id'];

    public function structure(){
    	return $this->belongsToMany(Structure::class,'patient_structure','patient_id','structure_id')->withPivot('type_structure_id');
    }
}