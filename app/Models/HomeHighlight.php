<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomeHighlight extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'home_highlights';

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
    protected $fillable = ['ar_title', 'en_title', 'ar_description', 'en_description', 'image', 'order', 'link'];

    protected $appends = [
       'localized'
    ];

    /**
     * HomeHighlight belongs to Setting.
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
            $localize = ['title' => $model->ar_title, 'description' => $model->ar_description];
        }elseif(\App::getLocale() == 'en'){
            $localize = ['title' => $model->en_title, 'description' => $model->en_description];
        }
        return $localize;
    }
}
