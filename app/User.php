<?php

namespace App;

use App\Models\Users\Citizen;
use App\Models\Users\ServiceProvider;
use App\Models\Users\SocialWorker;
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
    protected $fillable = [
        'name', 'email', 'password', 'facebook_token', 'facebook_id', 'google_token', 'google_id', 'is_admin'
    ];

    protected $appends = ['user_type', 'password'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getUserTypes()
    {
        return ([
            'admin',
            'sp',
            'worker',
            'citizen',
        ]);
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function isServiceProvider()
    {
        if (!$this->serviceProvider()->count())
            return false;
        else
            return true;
    }

    public function isCitizen()
    {
        if (!$this->citizen()->count())
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
        'is_admin' => 'boolean',
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

    public function unlink()
    {
        $this->facebook_token = null;
        $this->facebook_id = null;
        $this->save();
    }

    Public function isWorker()
    {
        return $this->hasOne(SocialWorker::class)->exists();
    }

    public function getUserTypeAttribute()
    {
        $type = [];
        if ($this->isServiceProvider()) {
            $type[] = 'Service_Provider';
        }
        if ($this->isCitizen()) {
            $type[] = 'Citizen';
        }
        if ($this->is_admin) {
            $type[] = 'Admin';
        }

        if ($this->isWorker()) {
            $type[] = 'Worker';
        }

        if (empty($type)) {
            return 'Not completed';
        }
        return str_replace('_', ' ', implode(' , ', $type));
    }

}
