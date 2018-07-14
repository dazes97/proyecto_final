<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeTask extends Model
{
    protected $table = "type_task";
    protected $fillable = [
        'name',
    ];

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }
}
