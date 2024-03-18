<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Offer extends Model
{
    use SoftDeletes, SoftCascadeTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'offers';

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['active', 'featured', 'image', 'gallery', 'price', 'date', 'cover'];

    protected $appends = [
       'localized'
    ];

    protected $softCascade = ['offerTranslations'];

    /**
     * Offer has many OfferTranslations.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function offerTranslations()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = offer_id, localKey = id)
        return $this->hasMany(OfferTranslation::class, 'offer_id', 'id');
    }

    public function setGalleryAttribute($gallery)
    {
        if (is_array($gallery)) {
            $this->attributes['gallery'] = json_encode($gallery);
        }
    }

    public function getGalleryAttribute($gallery)
    {
        return json_decode($gallery, true);
    }

    public function getLocalizedAttribute()
    {
        $model = $this;

        $localize = $model->offerTranslations->where('locale', \App::getLocale())->first();
        if (!$localize) {
            $localize = $model->offerTranslations->whereIn('locale', ['en','ar'])->first();
        }
        return $localize;
    }
}
