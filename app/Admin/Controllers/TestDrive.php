<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestDrive extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'test_drives';

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'vehicle_id', 'phone', 'email', 'state_id'];

    /**
     * TestDrive belongs to VehicleType.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehicle()
    {
        // belongsTo(RelatedModel, foreignKey = vehicleType_id, keyOnRelatedModel = id)
        return $this->belongsTo(Vehicle::class, 'vehicle_id', 'id');
    }

    /**
     * TestDrive belongs to State.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function state()
    {
        // belongsTo(RelatedModel, foreignKey = state_id, keyOnRelatedModel = id)
        return $this->belongsTo(State::class, 'state_id', 'id');
    }
}
