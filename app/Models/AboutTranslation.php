<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AboutTranslation extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'about_translations';

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
    protected $fillable = ['locale', 'title', 'description'];

    /**
     * AboutTranslation belongs to About.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function about()
    {
        // belongsTo(RelatedModel, foreignKey = about_id, keyOnRelatedModel = id)
        return $this->belongsTo(About::class, 'about_id', 'id');
    }
}
