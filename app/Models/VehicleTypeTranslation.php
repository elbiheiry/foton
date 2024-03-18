<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicleTypeTranslation extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'vehicle_type_translations';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['locale', 'title'];

    /**
     * VehicleTypeTranslation belongs to VehicleType.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehicleType()
    {
        // belongsTo(RelatedModel, foreignKey = vehicleType_id, keyOnRelatedModel = id)
        return $this->belongsTo(VehicleType::class, 'vehicleType_id', 'id');
    }
}
