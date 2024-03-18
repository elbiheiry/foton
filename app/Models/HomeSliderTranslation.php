<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomeSliderTranslation extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'home_slider_translations';

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
    protected $fillable = ['locale', 'title', 'description', 'home_slider_id'];

    /**
     * HomeSliderTranslation belongs to HomeSlider.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function homeSlider()
    {
        // belongsTo(RelatedModel, foreignKey = homeSlider_id, keyOnRelatedModel = id)
        return $this->belongsTo(HomeSlider::class, 'home_slider_id', 'id');
    }
}
