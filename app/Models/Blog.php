<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Blog extends Model
{
    use SoftDeletes, SoftCascadeTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'blogs';

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['active', 'featured', 'image', 'cover', 'date'];

    protected $appends = [
       'localized'
    ];

    protected $softCascade = ['blogTranslations'];

    /**
     * Blog has many BlogTranslations.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function blogTranslations()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = blog_id, localKey = id)
        return $this->hasMany(BlogTranslation::class, 'blog_id', 'id');
    }

    public function getLocalizedAttribute()
    {
        $model = $this;

        $localize = $model->blogTranslations->where('locale', \App::getLocale())->first();
        if (!$localize) {
            $localize = $model->blogTranslations->whereIn('locale', ['en','ar'])->first();
        }
        return $localize;
    }
}
