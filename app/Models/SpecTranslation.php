<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SpecTranslation extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'spec_translations';

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
     * SpecTranslation belongs to Spec.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function spec()
    {
        // belongsTo(RelatedModel, foreignKey = spec_id, keyOnRelatedModel = id)
        return $this->belongsTo(Spec::class, 'spec_id', 'id');
    }
}
