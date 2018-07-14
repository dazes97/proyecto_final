<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use SoftDeletes;
    protected $dates = ['delete_at'];
    protected $fillable = ['uri','user_id','metadata_id','file_id','type_file_id','client_id'];

    public function metadata(){
    	return $this->belongsTo(Metadata::class,'metadata_id');
    }

    public function typeFile(){
    	return $this->belongsTo(TypeFile::class,'type_file_id');
    }

    public function content(){
    	return $this->belongsToMany(Content::class,'file_content','file_id','content_id');
    }
}
