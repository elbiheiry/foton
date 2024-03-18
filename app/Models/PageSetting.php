<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class PageSetting extends Model
{
    use SoftDeletes, SoftCascadeTrait;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'page_settings';

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['image'];

    protected $appends = [
       'localized'
    ];

    protected $softCascade = ['pageSettingTranslations'];

    /**
     * PageSetting has many PageSettingTranslations.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pageSettingTranslations()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = pageSetting_id, localKey = id)
        return $this->hasMany(PageSettingTranslation::class, 'page_setting_id', 'id');
    }

    public function getLocalizedAttribute()
    {
        $model = $this;

        $localize = $model->pageSettingTranslations->where('locale', \App::getLocale())->first();
        if (!$localize) {
            $localize = $model->pageSettingTranslations->whereIn('locale', ['en','ar'])->first();
        }
        return $localize;
    }
}
