<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specialty extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];


    protected $fillable = [
        'id','description','name'
    ];


    public function doctors()
    {
        return $this->belongsToMany('App\Doctor');
    }
}
