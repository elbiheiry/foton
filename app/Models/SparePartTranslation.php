<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SparePartTranslation extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'spare_part_translations';

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
    protected $fillable = ['locale', 'title'];

    /**
     * SparePartTranslation belongs to SparePart.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sparePart()
    {
        // belongsTo(RelatedModel, foreignKey = sparePart_id, keyOnRelatedModel = id)
        return $this->belongsTo(SparePart::class, 'sparePart_id', 'id');
    }
}
