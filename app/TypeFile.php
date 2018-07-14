<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class TypeFile extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];
    protected $table = "type_file";
    protected $fillable = ['nombre'];
}
