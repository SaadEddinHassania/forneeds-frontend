<?php

namespace App\Models;

use App\Models\Users\Citizen;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

/**
 * @SWG\Definition(
 *      definition="Survey",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="subject",
 *          description="subject",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="project_id",
 *          description="project_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="survey_meta_id",
 *          description="survey_meta_id",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class Survey extends Model
{
    use SoftDeletes;

    public $table = 'surveys';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'subject',
        'expires_at',
        'description',
        'project_id',
        'survey_meta_id',
        'deleted_at',
        'questions_count'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'subject' => 'string',
        'expires_at' => 'datetime',
        'description' => 'string',
        'project_id' => 'integer',
        'survey_meta_id' => 'integer',
        'deleted_at' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function Config()
    {
        return $this->belongsToMany(Config::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class)->orderBy('order');
    }

    public function citizens()
    {
        return $this->belongsToMany(Citizen::class);
    }

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('withQuestions', function (Builder $builder) {
            $builder->with('questions');
        });

    }
}
