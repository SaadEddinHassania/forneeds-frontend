<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Model; 
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="City",
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
 *          property="lat",
 *          description="lat",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="lng",
 *          description="lng",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="shape_id",
 *          description="shape_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="area_id",
 *          description="area_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="location_meta_id",
 *          description="location_meta_id",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class City extends Model
{
    use SoftDeletes;

    public $table = 'cities';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'lat',
        'lng',
        'shape_id',
        'area_id',
        'location_meta_id',
        'deleted_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'lat' => 'string',
        'lng' => 'string',
        'shape_id' => 'integer',
        'area_id' => 'integer',
        'location_meta_id' => 'integer',
        'deleted_at' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function districts()
    {
        return $this->hasMany(District::class);
    }
}
