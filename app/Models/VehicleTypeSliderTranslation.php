<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicleTypeSliderTranslation extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'vehicle_type_slider_translations';

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
    protected $fillable = ['locale', 'title', 'description'];

    /**
     * VehicleSliderTranslation belongs to VehicleSlider.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehicleSlider()
    {
        // belongsTo(RelatedModel, foreignKey = vehicleSlider_id, keyOnRelatedModel = id)
        return $this->belongsTo(VehicleTypeSlider::class, 'vehicle_type_slider_id', 'id');
    }
}