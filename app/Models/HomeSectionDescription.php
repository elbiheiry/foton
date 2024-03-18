<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomeSectionDescription extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'home_section_descriptions';

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
    protected $fillable = ['section', 'ar_description', 'en_description'];

    protected $appends = [
       'localized'
    ];

    /**
     * HomeSectionDescription belongs to Setting.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function setting()
    {
        // belongsTo(RelatedModel, foreignKey = setting_id, keyOnRelatedModel = id)
        return $this->belongsTo(Setting::class, 'setting_id', 'id');
    }

    public function getLocalizedAttribute()
    {
        $model = $this;

        if(\App::getLocale() == 'ar'){
            $localize = $model->ar_description;
        }elseif(\App::getLocale() == 'en'){
            $localize = $model->en_description;
        }
        return $localize;
    }
}
