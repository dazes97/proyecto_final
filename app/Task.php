<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'id','description', 'user_id','start_date', 'finish_date' ,'task_type_id','client_id',
    ];

    public function typetask()
    {
        return $this->belongsTo('App\TypeTask','task_type_id');
    }
    public function users()
    {
        return $this->belongsToMany('App\User','user_task');
    }
}
