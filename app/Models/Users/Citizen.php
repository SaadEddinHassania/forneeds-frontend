<?php

namespace App\Models\Users;

use App\Models\AcademicLevel;
use App\Models\Age;
use App\Models\Answer;
use App\Models\Disability;
use App\Models\Gender;
use App\Models\Location\Area;
use App\Models\MaritalStatus;
use App\Models\Project;
use App\Models\RefugeeState;
use App\Models\Sector;
use App\Models\Survey;
use App\Models\Target;
use App\Models\WorkingState;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="User",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="email",
 *          description="email",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="password",
 *          description="password",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="remember_token",
 *          description="remember_token",
 *          type="string"
 *      )
 * )
 */
class Citizen extends Model
{

    public $fillable = [
        'gender_id', 'age_id', 'marital_status_id',
        'working_state_id', 'refugee_state_id', 'disability_id',
        'academic_level_id', 'contactable'
    ];
    private $fillableMap = [
        'gender_id' => Gender::class,
        'age_id' => Age::class,
        'marital_status_id' => MaritalStatus::class,
        'working_state_id' => WorkingState::class,
        'refugee_state_id' => RefugeeState::class,
        'disability_id' => Disability::class,
        'academic_level_id' => AcademicLevel::class,
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
    ];

    protected $appends = array('name');


    public function getNameAttribute()
    {
        if ($this->user()->exists()) {
            return $this->user()->first()->name;
        } else {
            return "No User";
        }
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function servicesRequests()
    {
        return $this->hasMany('App\Models\ServiceRequest');
    }

    public function areas()
    {
        return $this->belongsToMany(Area::class);
    }

    public function ages()
    {
        return $this->belongsTo(Age::class);
    }

    public function marital()
    {
        return $this->belongsTo(MaritalStatus::class);
    }

    public function workStates()
    {
        return $this->belongsTo(WorkingState::class);
    }

    public function sectors()
    {
        return $this->belongsToMany(Sector::class);
    }

    public function refuge()
    {
        return $this->belongsToMany(RefugeeState::class);
    }

    public function disability()
    {
        return $this->belongsToMany(Disability::class);
    }

    public function academic()
    {
        return $this->belongsToMany(AcademicLevel::class);
    }

    public function Answers()
    {
        return $this->belongsToMany(Answer::class);
    }

    public function surveys()
    {
        return $this->belongsToMany(Survey::class);
    }

    public function applicable_surveys()
    {
        $targets = new Target();
        $fillable = $this->fillableMap;
        $projects = $targets->where(function ($query) use ($fillable) {
            foreach ($fillable as $key => $index) {
                $query->orWhere(array('targetable_id' => $this->$key, 'targetable_type' => $index));
            }
        });
        return Survey::whereIn('project_id', $projects->pluck('project_id'));

    }
}
