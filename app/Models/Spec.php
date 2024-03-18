<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Spec extends Model
{
    use SoftDeletes, SoftCascadeTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'specs';

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['active'];

    protected $appends = [
       'localized'
    ];

    protected $softCascade = ['specTranslations'];

    /**
     * Spec has many SpecTranslations.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function specTranslations()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = spec_id, localKey = id)
        return $this->hasMany(SpecTranslation::class, 'spec_id', 'id');
    }

    public function getLocalizedAttribute()
    {
        $model = $this;

        $localize = $model->specTranslations->where('locale', \App::getLocale())->first();
        if (!$localize) {
            $localize = $model->specTranslations->whereIn('locale', ['en','ar'])->first();
        }
        return $localize;
    }
}
