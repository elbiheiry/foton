<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Event extends Model
{
    use SoftDeletes, SoftCascadeTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'events';

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['active', 'featured', 'image', 'gallary', 'from', 'to', 'cover'];

    protected $appends = [
       'localized'
    ];

    protected $softCascade = ['eventTranslations'];

    /**
     * Event has many EventTranslations.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function eventTranslations()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = event_id, localKey = id)
        return $this->hasMany(EventTranslation::class, 'event_id', 'id');
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

        $localize = $model->eventTranslations->where('locale', \App::getLocale())->first();
        if (!$localize) {
            $localize = $model->eventTranslations->whereIn('locale', ['en','ar'])->first();
        }
        return $localize;
    }
}
