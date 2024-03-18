<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DealerTranslation extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dealer_translations';

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
    protected $fillable = ['locale', 'title', 'address', 'working_hour'];

    /**
     * DealerTranslation belongs to Dealer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dealer()
    {
        // belongsTo(RelatedModel, foreignKey = dealer_id, keyOnRelatedModel = id)
        return $this->belongsTo(Dealer::class, 'dealer_id', 'id');
    }
}
