<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OfferTranslation extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'offer_translations';

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
    protected $fillable = ['locale', 'title', 'description', 'warranty', 'seo_description'];

    /**
     * OfferTranslation belongs to Offer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function offer()
    {
        // belongsTo(RelatedModel, foreignKey = offer_id, keyOnRelatedModel = id)
        return $this->belongsTo(Offer::class, 'offer_id', 'id');
    }
}
