<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','navbar','asidebar'];
}
