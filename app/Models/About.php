<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class About extends Model
{
    use SoftDeletes, SoftCascadeTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'abouts';

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['image', 'slug'];

    protected $appends = [
       'localized'
    ];

    protected $softCascade = ['aboutTranslations'];

    /**
     * About has many AboutTranslations.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function aboutTranslations()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = about_id, localKey = id)
        return $this->hasMany(AboutTranslation::class, 'about_id', 'id');
    }

    public function getLocalizedAttribute()
    {
        $model = $this;

        $localize = $model->aboutTranslations->where('locale', \App::getLocale())->first();
        if (!$localize) {
            $localize = $model->aboutTranslations->whereIn('locale', ['en','ar'])->first();
        }
        return $localize;
    }
}
