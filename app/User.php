<?php

namespace App;

use Illuminate\Support\Facades\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Usuario\ActivityController;
use Carbon\Carbon;
use Laravel\Cashier\Billable;
class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    use Billable;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','lastname', 'email', 'password', 'address', 'phone','ci','client_id','card_last_four'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['deleted_at'];

    public function style(){
        return $this->hasOne(UserPreference::class,'user_id');
    }

    /*Funciones Daniel*/
    public function isAdmin()
    {
        return $this->client_id == $this->id;
    }
    public function isDoctor($id)
    {
        $doctor = Doctor::find($id);
        if (!is_null($doctor)){
            return true;
        }

        return false;
    }
    public function isReceptionist($id)
    {
        $receptionist = Receptionist::find($id);
        if (!is_null($receptionist)){
            return true;
        }
        return false;
    }
    public function isLaboratory($id)
    {
        $laboratory = Laboratory::find($id);
        if (!is_null($laboratory)){
            return true;
        }
        return false;
    }
    public function getUserAtributtes($id)
    {
        return User::find($id);
    }

    public function activities()
    {
        return $this->hasMany('App\Activity');
    }
    public function setActivities()
    {
        $description = "Usted ha visitado la url: ".Request::url()." en fecha y hora: ".Carbon::now();
        Activity::create(['description' => $description,
                            'date' => date('Y-m-d'),
                            'user_id' => Auth()->id(),
                            'client_id' => Auth()->user()->client_id??Auth()->id()
            ]);
    }
    public function registerBinnacle()
    {
        //el archivo binaccle.txt debe estar creado dentro de la carpeta binnacle sino  va a tirar error a no ser que se haga un if
        $user = $this::find(Auth::id());
        $date = date('d-m-Y H:i:s');
        $path = public_path().'/binnacle'.'/binnacle.txt';
        $myfile = fopen($path, "a");
        $txt = "Fecha: ".$date." || ID: ".Auth()->id()." || Nombre: ".$user->name." ".$user->lastname." || IP: ".Request::ip()." || Url: ".Request::fullUrl();
        fwrite($myfile, "\n". $txt);
        fclose($myfile);

    }

    public function tasks()
    {
        return $this->belongsToMany('App\Task','user_task')->withPivot('status');
    }
    public function favorites()
    {
        return $this->hasMany('App\Favorite');
    }


}
