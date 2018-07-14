<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class structure extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['name','description','parent_node','client_id'];

    public function nodoHijos(){
    	return $this->hasMany(Structure::class,'parent_node','id');
    }

    public function nodoPadre(){
    	return $this->belongsTo(Structure::class,'parent_node');
    }

    public function root($client){
    	return $this->all()->where('client_id',$client)->where('parent_node',null);
    }

    public function rootId($client, $node){
    	return $this->all()->where('client_id',$client)->where('parent_node',$node);
    }

    public function structureFile($client){
        return $this->hasMany(StructureFile::class,'structure_id','id');
    }

    public function files(){
        return $this->belongsToMany(File::class,'structure_files','structure_id','file_id');
    }
    
    public function patientStructure($client, $id){
        return $this->hasMany(PatientStructure::class,'structure_id');
    }
}
