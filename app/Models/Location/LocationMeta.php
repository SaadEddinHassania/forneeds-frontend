<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="LocationMeta",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="unemployment",
 *          description="unemployment",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="poverty_lvl",
 *          description="poverty_lvl",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="model",
 *          description="model",
 *          type="string"
 *      )
 * )
 */
class LocationMeta extends Model
{
    use SoftDeletes;

    public $table = 'location_metas';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'population',
        'unemployment',
        'poverty_lvl',
        'model',
        'deleted_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'unemployment' => 'integer',
        'poverty_lvl' => 'integer',
        'model' => 'string',
        'deleted_at' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
