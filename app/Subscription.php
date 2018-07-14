<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'id','company_name', 'company_email','user_id', 'start_date' ,'finish_date','recovery_token','user_id'
    ];

    public function user()
    {
        return $this->hasOne('App\User');
    }
}
