<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class ImagesGallary extends Model
{
    use SoftDeletes, SoftCascadeTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'images_gallaries';

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['active', 'featured', 'date', 'image', 'gallary', 'cover'];

    protected $appends = [
       'localized'
    ];

    protected $softCascade = ['imagesGallaryTranslations'];

    /**
     * ImagesGallary has many ImageGallaryTranslations.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function imagesGallaryTranslations()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = imagesGallary_id, localKey = id)
        return $this->hasMany(ImagesGallaryTranslation::class, 'imagesGallary_id', 'id');
    }

    public function setGallaryAttribute($gallary)
    {
        if (is_array($gallary)) {
            $this->attributes['gallary'] = json_encode($gallary);
        }
    }

    public function getGallaryAttribute($gallary)
    {
        return json_decode($gallary, true);
    }

    public function getLocalizedAttribute()
    {
        $model = $this;

        $localize = $model->imagesGallaryTranslations->where('locale', \App::getLocale())->first();
        if (!$localize) {
            $localize = $model->imagesGallaryTranslations->whereIn('locale', ['en','ar'])->first();
        }
        return $localize;
    }
}
