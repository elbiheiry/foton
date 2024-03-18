<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class VehicleModel extends Model
{
    use SoftDeletes, SoftCascadeTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'vehicles_models';

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['active', 'vehicle_id', 'image'];

    protected $appends = [
       'localized'
    ];

    protected $softCascade =['vehicleModelTranslations'];

    /**
     * VehicleModel has many VehicleModelTranslations.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vehicleModelTranslations()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = vehicleModel_id, localKey = id)
        return $this->hasMany(VehicleModelTranslation::class, 'vehicle_model_id', 'id');
    }

    /**
     * VehicleModel belongs to Vehicle.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehicle()
    {
        // belongsTo(RelatedModel, foreignKey = vehicle_id, keyOnRelatedModel = id)
        return $this->belongsTo(Vehicle::class, 'vehicle_id', 'id');
    }

    /**
     * VehicleModel morphs many Spec.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function specs()
    {
        // morphMany(MorphedModel, morphableName, type = able_type, relatedKeyName = able_id, localKey = id)
        return $this->morphMany(VehicleModelSpec::class, 'modelable', 'modelable_type', 'modelable_id', 'id');
    }

    public function getLocalizedAttribute()
    {
        $model = $this;

        $localize = $model->vehicleModelTranslations->where('locale', \App::getLocale())->first();
        if (!$localize) {
            $localize = $model->vehicleModelTranslations->whereIn('locale', ['en','ar'])->first();
        }
        return $localize;
    }
}
