<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StructureFile extends Model
{
	protected $table = "structure_files";
    protected $fillable = ['structure_id','file_id','client_id'];

    public function clientFile($client){
    	return $this->all()->where('structure_id',null)->where('client_id',$client);
    }
    public function clientFileNode($client,$nodo){
    	return $this->all()->where('structure_id',$nodo)->where('client_id',$client);
    }

    public function file(){
    	return $this->belongsTo(File::class,'file_id');
    }
}
