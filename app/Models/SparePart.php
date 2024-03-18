<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class SparePart extends Model
{
    use SoftDeletes, SoftCascadeTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'spare_parts';

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['active','vehicleType_id', 'price', 'image'];

    protected $appends = [
       'localized'
    ];

    protected $softCascade = ['sparePartTranslations'];

    /**
     * SparePart has many SparePartTranslations.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sparePartTranslations()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = sparePart_id, localKey = id)
        return $this->hasMany(SparePartTranslation::class, 'sparePart_id', 'id');
    }

    /**
     * SparePart belongs to VehicleType.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehicleType()
    {
        // belongsTo(RelatedModel, foreignKey = vehicleType_id, keyOnRelatedModel = id)
        return $this->belongsTo(VehicleType::class, 'vehicleType_id', 'id');
    }

    public function getLocalizedAttribute()
    {
        $model = $this;

        $localize = $model->sparePartTranslations->where('locale', \App::getLocale())->first();
        if (!$localize) {
            $localize = $model->sparePartTranslations->whereIn('locale', ['en','ar'])->first();
        }
        return $localize;
    }
}
