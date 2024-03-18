<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PageSettingTranslation extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'page_setting_translations';

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
    protected $fillable = ['page_setting_id', 'locale', 'description'];

    /**
     * PageSettingTranslation belongs to .
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pageSetting()
    {
        // belongsTo(RelatedModel, foreignKey = _id, keyOnRelatedModel = id)
        return $this->belongsTo(PageSetting::class, 'page_setting_id', 'id');
    }
}
