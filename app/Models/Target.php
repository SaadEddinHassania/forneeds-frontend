<?php

namespace App\Models;

use App\Models\Location\Area;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Targetable;

class Target extends Model
{
    protected $fillable = ['project_id','targetable_id', 'targetable_type'];
    public static $types =
        [
            'area' => Area::class,
            'age' => Age::class,
            'disability' => Disability::class,
            'gender' => Gender::class,
            'marital' => MaritalStatus::class,
            'refugee' => RefugeeState::class,
            'workfield' => WorkField::class,
            'workstat' => WorkingState::class,
        ];

    public function targetable()
    {
        return $this->morphTo();
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }


}
