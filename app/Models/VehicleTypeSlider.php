<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class VehicleTypeSlider extends Model
{
    use SoftDeletes, SoftCascadeTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'vehicle_type_sliders';

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['image', 'active'];

    protected $appends = [
       'localized'
    ];

    protected $softCascade = ['vehicleTypeSliderTranslations'];

    /**
     * VehicleSlider has many VehicleSliderTranslations.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vehicleTypeSliderTranslations()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = vehicleSlider_id, localKey = id)
        return $this->hasMany(VehicleTypeSliderTranslation::class, 'vehicle_type_slider_id', 'id');
    }

    public function getLocalizedAttribute()
    {
        $model = $this;

        $localize = $model->vehicleTypeSliderTranslations->where('locale', \App::getLocale())->first();
        if (!$localize) {
            $localize = $model->vehicleTypeSliderTranslations->whereIn('locale', ['en','ar'])->first();
        }
        return $localize;
    }
}
