<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VideoGallaryTranslation extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'video_gallary_translations';

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
    protected $fillable = ['locale', 'title'];

    /**
     * VideoGallaryTranslation belongs to VideoGallary.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function videoGallary()
    {
        // belongsTo(RelatedModel, foreignKey = videoGallary_id, keyOnRelatedModel = id)
        return $this->belongsTo(VideoGallary::class, 'videoGallary_id', 'id');
    }
}
