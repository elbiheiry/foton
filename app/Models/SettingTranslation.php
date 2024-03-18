<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SettingTranslation extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'setting_translations';

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
    protected $fillable = ['locale', 'address', 'currency', 'seo_description', 'services_main_desc'];

    /**
     * SettingTranslation belongs to Setting.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function setting()
    {
        // belongsTo(RelatedModel, foreignKey = setting_id, keyOnRelatedModel = id)
        return $this->belongsTo(Setting::class, 'setting_id', 'id');
    }
}
