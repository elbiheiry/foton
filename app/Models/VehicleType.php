<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class VehicleType extends Model
{
    use SoftDeletes, SoftCascadeTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'vehicle_types';

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['active'];

    protected $appends = [
       'localized'
    ];

    protected $softCascade = ['vehicleTypeTranslations'];

    /**
     * VehicleType has many VehicleTypeTranslations.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vehicleTypeTranslations()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = vehicleType_id, localKey = id)
        return $this->hasMany(VehicleTypeTranslation::class, 'vehicleType_id', 'id');
    }

    /**
     * VehicleType has many TestDrive.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function testDrive()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = vehicleType_id, localKey = id)
        return $this->hasMany(TetDrive::class, 'vehicleType_id', 'id');
    }

    /**
     * VehicleType has many Vehicles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vehicles()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = vehicleType_id, localKey = id)
        return $this->hasMany(Vehicle::class, 'vehicle_type_id', 'id');
    }

    public function getLocalizedAttribute()
    {
        $model = $this;

        $localize = $model->vehicleTypeTranslations->where('locale', \App::getLocale())->first();
        if (!$localize) {
            $localize = $model->vehicleTypeTranslations->whereIn('locale', ['en','ar'])->first();
        }
        return $localize;
    }
}
