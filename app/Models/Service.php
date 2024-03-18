<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Service extends Model
{
    use SoftDeletes, SoftCascadeTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'services';

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['active', 'icon'];

    protected $appends = [
       'localized'
    ];

    protected $softCascade = ['serviceTranslations'];

    /**
     * Service has many ServiceTranslations.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function serviceTranslations()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = service_id, localKey = id)
        return $this->hasMany(ServiceTranslation::class, 'service_id', 'id');
    }

    public function getLocalizedAttribute()
    {
        $model = $this;

        $localize = $model->serviceTranslations->where('locale', \App::getLocale())->first();
        if (!$localize) {
            $localize = $model->serviceTranslations->whereIn('locale', ['en','ar'])->first();
        }
        return $localize;
    }
}
