<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Vehicle extends Model
{
    use SoftDeletes, SoftCascadeTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'vehicles';

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['active', 'featured', 'vehicle_type_id', 'image'];

    protected $appends = [
       'localized'
    ];

    protected $softCascade = ['vehicleTranslations', 'vehicleModels', 'vehicleSliders'];

    /**
     * Vehicle has many VehicleTranslations.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vehicleTranslations()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = vehicle_id, localKey = id)
        return $this->hasMany(VehicleTranslation::class, 'vehicle_id', 'id');
    }

    /**
     * Vehicle belongs to VehicleType.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehicleType()
    {
        // belongsTo(RelatedModel, foreignKey = vehicleType_id, keyOnRelatedModel = id)
        return $this->belongsTo(VehicleType::class, 'vehicle_type_id', 'id');
    }

    /**
     * Vehicle has many VeicleSliders.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vehicleSliders()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = vehicle_id, localKey = id)
        return $this->hasMany(VehicleSlider::class, 'vehicle_id', 'id');
    }

    /**
     * Vehicle has many VehicleModels.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vehicleModels()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = vehicle_id, localKey = id)
        return $this->hasMany(VehicleModel::class, 'vehicle_id', 'id');
    }

    /**
     * Vehicle has many Maintenances.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function maintenances()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = vehicle_id, localKey = id)
        return $this->hasMany(Maintenance::class, 'vehicle_id', 'id');
    }

    public function getLocalizedAttribute()
    {
        $model = $this;

        $localize = $model->vehicleTranslations->where('locale', \App::getLocale())->first();
        if (!$localize) {
            $localize = $model->vehicleTranslations->whereIn('locale', ['en','ar'])->first();
        }
        return $localize;
    }

    public function getMaintenanceAttribute()
    {
        $model = $this;

        $maintenance = $model->maintenances->where('locale', \App::getLocale());

        return $maintenance;
    }
}
