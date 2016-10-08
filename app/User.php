<?php

namespace App;

use App\Models\Users\Citizen;
use App\Models\Users\ServiceProvider;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =[
        'name','email', 'password','facebook_token','facebook_id','google_token','google_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isServiceProvider()
    {
        if ($this->serviceProvider === null)
            return false;
        else
            return true;
    }

    public function isCitizen()
    {
        if ($this->citizen === null)
            return false;
        else
            return true;
    }

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'email',
        'is_admin' =>'boolean',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function serviceProvider()
    {
        return $this->hasOne(ServiceProvider::class);
    }

    public function citizen()
    {
        return $this->hasOne(Citizen::class);
    }

}
