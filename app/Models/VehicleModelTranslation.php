<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicleModelTranslation extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'vehicle_model_translations';

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
     * VehicleModelTranslation belongs to VehicleModel.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehicleModel()
    {
        // belongsTo(RelatedModel, foreignKey = vehicleModel_id, keyOnRelatedModel = id)
        return $this->belongsTo(VehicleModel::class, 'vehicle_model_id', 'id');
    }
}
