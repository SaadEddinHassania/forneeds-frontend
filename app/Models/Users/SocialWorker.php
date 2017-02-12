<?php

namespace App\Models\Users;

use App\Models\Age;
use App\Models\Gender;
use App\Models\Location\Area;
use Illuminate\Database\Eloquent\Model;

class SocialWorker extends Model
{
    public $fillable = [
        'is_accepted','cv','gender_id', 'age_id','area_id', 'is_accepted', 'address', 'telephone', 'mobile'
    ];
    private $fillableMap = [
        'gender_id' => Gender::class,
        'age_id' => Age::class,

    ];
    protected $appends = ['name'];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getNameAttribute()
    {
        if ($this->user()->exists()) {
            return $this->user()->first()->name;
        } else {
            return "No User";
        }
    }

    public function getAgeAttribute()
    {
        return Age::where('id', $this->age_id)->first() ? Age::where('id', $this->age_id)->first()->name : '';
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function age()
    {
        return $this->belongsTo(Age::class);
    }
}
