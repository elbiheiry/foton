<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Career extends Model
{
    use SoftDeletes, SoftCascadeTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'careers';

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['active', 'available_vacancies'];

    protected $appends = [
       'localized'
    ];

    protected $softCascade = ['careerTranslations'];

    /**
     * Career has many CareerTranslations.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function careerTranslations()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = career_id, localKey = id)
        return $this->hasMany(CareerTranslation::class, 'career_id', 'id');
    }

    public function getLocalizedAttribute()
    {
        $model = $this;

        $localize = $model->careerTranslations->where('locale', \App::getLocale())->first();
        if (!$localize) {
            $localize = $model->careerTranslations->whereIn('locale', ['en','ar'])->first();
        }
        return $localize;
    }
}
