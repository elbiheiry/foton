<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicleTranslation extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'vehicle_translations';

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
    protected $fillable = ['locale', 'title', 'description', 'seo_description', 'featured_description', 'dir'];

    /**
     * VehicleTranslation belongs to Vehicle.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehicle()
    {
        // belongsTo(RelatedModel, foreignKey = vehicle_id, keyOnRelatedModel = id)
        return $this->belongsTo(Vehicle::class, 'vehicle_id', 'id');
    }
}
