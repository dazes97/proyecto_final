<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientStructure extends Model
{
    protected $table = 'patient_structure';
    protected $fillable = ['structure_id','patient_id','type_structure_id'];

    public function patient(){
    	return $this->belongsTo(Patient::class,'patient_id');
    }
}
