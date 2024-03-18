<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class VideoGallary extends Model
{
    use SoftDeletes, SoftCascadeTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'video_gallaries';

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['active', 'video_url', 'image'];

    protected $appends = [
       'localized'
    ];

    protected $softCascade = ['videoGallaryTranslations'];

    /**
     * VideoGallary has many VideoGallaryTranslations.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function videoGallaryTranslations()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = videoGallary_id, localKey = id)
        return $this->hasMany(VideoGallaryTranslation::class, 'videoGallary_id', 'id');
    }

    public function getLocalizedAttribute()
    {
        $model = $this;

        $localize = $model->videoGallaryTranslations->where('locale', \App::getLocale())->first();
        if (!$localize) {
            $localize = $model->videoGallaryTranslations->whereIn('locale', ['en','ar'])->first();
        }
        return $localize;
    }
}
