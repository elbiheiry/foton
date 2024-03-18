<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CareerTranslation extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'career_translations';

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
    protected $fillable = ['locale', 'title', 'description'];

    /**
     * CareerTranslation belongs to Career.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function career()
    {
        // belongsTo(RelatedModel, foreignKey = career_id, keyOnRelatedModel = id)
        return $this->belongsTo(Career::class, 'career_id', 'id');
    }
}
