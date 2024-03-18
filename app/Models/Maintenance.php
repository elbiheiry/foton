<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Maintenance extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'maintenances';

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['locale', 'km', 'description'];

    /**
     * Maintenance belongs to Vehicle.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehicle()
    {
        // belongsTo(RelatedModel, foreignKey = vehicle_id, keyOnRelatedModel = id)
        return $this->belongsTo(Vehicle::class, 'vehicle_id', 'id');
    }
}
