<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Setting extends Model
{
    use SoftDeletes, SoftCascadeTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'settings';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['foton_logo', 'amg_logo', 'map', 'footer_image', 'footer_link', 'footer_title', 'e_brochure', 'spare_parts_flag', 'services_main_img', 'contact_img', 'contact_mail', 'career_mail', 'drive_mail', 'contact_drive_to_email'];

    protected $appends = [
       'localized'
    ];

    protected $softCascade = ['settingTranslations', 'socialMedia', 'contacts', 'homeHighlights'];

    /**
     * Setting has many SettingTranslations.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function settingTranslations()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = setting_id, localKey = id)
        return $this->hasMany(SettingTranslation::class, 'setting_id', 'id');
    }

    /**
     * Setting has many SocialMedia.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function socialMedia()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = setting_id, localKey = id)
        return $this->hasMany(SocialMedia::class, 'setting_id', 'id');
    }

    /**
     * Setting morphs many Contact.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function contacts()
    {
        // morphMany(MorphedModel, morphableName, type = able_type, relatedKeyName = able_id, localKey = id)
        return $this->morphMany(Contact::class, 'contactable');
    }

    /**
     * Setting has many HomeHighlights.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function homeHighlights()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = setting_id, localKey = id)
        return $this->hasMany(HomeHighlight::class, 'setting_id', 'id');
    }

    /**
     * Setting has many HomeSectionDescriptions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function homeSectionDescriptions()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = setting_id, localKey = id)
        return $this->hasMany(HomeSectionDescription::class, 'setting_id', 'id');
    }

    public function getLocalizedAttribute()
    {
        $model = $this;

        $localize = $model->settingTranslations->where('locale', \App::getLocale())->first();
        if (!$localize) {
            $localize = $model->settingTranslations->whereIn('locale', ['en','ar'])->first();
        }
        return $localize;
    }
}
