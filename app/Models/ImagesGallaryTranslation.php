<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImagesGallaryTranslation extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'images_gallary_translations';

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
    protected $fillable = ['locale', 'title', 'description', 'seo_description'];

    /**
     * ImagesGallaryTranslation belongs to ImagesGallary.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function imagesGallary()
    {
        // belongsTo(RelatedModel, foreignKey = imagesGallary_id, keyOnRelatedModel = id)
        return $this->belongsTo(ImagesGallary::class, 'imagesGallary_id', 'id');
    }
}
