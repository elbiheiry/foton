<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class VehicleSlider extends Model
{
    use SoftDeletes, SoftCascadeTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'vehicle_sliders';

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['image'];

    protected $appends = [
       'localized'
    ];

    protected $softCascade = ['vehicleSliderTranslations'];

    /**
     * VehicleSlider belongs to Vehicle.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehicle()
    {
        // belongsTo(RelatedModel, foreignKey = vehicle_id, keyOnRelatedModel = id)
        return $this->belongsTo(Vehicle::class, 'vehicle_id', 'id');
    }

    /**
     * VehicleSlider has many VehicleSliderTranslations.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vehicleSliderTranslations()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = vehicleSlider_id, localKey = id)
        return $this->hasMany(VehicleSliderTranslation::class, 'vehicle_slider_id', 'id');
    }

    public function getLocalizedAttribute()
    {
        $model = $this;

        $localize = $model->vehicleSliderTranslations->where('locale', \App::getLocale())->first();
        if (!$localize) {
            $localize = $model->vehicleSliderTranslations->whereIn('locale', ['en','ar'])->first();
        }
        return $localize;
    }
}
