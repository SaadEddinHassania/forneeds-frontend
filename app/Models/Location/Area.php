<?php

namespace App\Models\Location;

use App\Models\Users\Citizen;
use App\Models\Users\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Area",
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
 *          property="location_meta_id",
 *          description="location_meta_id",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class Area extends Model
{
    use SoftDeletes;

    public $table = 'areas';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'lat',
        'lng',
        'shape_id',
        'location_meta_id',
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
        'location_meta_id' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function cities(){
        return $this->hasMany(City::class);
    }
    public function service_providers(){
        return $this->belongsToMany(ServiceProvider::class);
    }
    public function citizens(){
        return $this->belongsToMany(Citizen::class);
    }

    public function citizensCount()
    {
        return $this->citizens()->selectRaw('count(citizens.id) as aggregate')
            ->groupBy(['pivot_citizen_id', 'pivot_area_id']);
    }
}
