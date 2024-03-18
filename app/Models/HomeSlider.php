<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class HomeSlider extends Model
{
    use SoftDeletes, SoftCascadeTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'home_sliders';

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['active', 'image'];

    protected $appends = [
       'localized'
    ];

    protected $softCascade = ['homeSliderTranslations'];

    /**
     * HomeSlider has many HomeSliderTranslations.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function homeSliderTranslations()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = homeSlider_id, localKey = id)
        return $this->hasMany(HomeSliderTranslation::class, 'home_slider_id', 'id');
    }

    public function getLocalizedAttribute()
    {
        $model = $this;

        $localize = $model->homeSliderTranslations->where('locale', \App::getLocale())->first();
        if (!$localize) {
            $localize = $model->homeSliderTranslations->whereIn('locale', ['en','ar'])->first();
        }
        return $localize;
    }
}
