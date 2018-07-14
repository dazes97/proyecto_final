<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
	use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id','description','user_id','client_id', 'date'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
