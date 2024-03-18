<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogTranslation extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'blog_translations';

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
     * BlogTranslation belongs to Blog.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function blog()
    {
        // belongsTo(RelatedModel, foreignKey = blog_id, keyOnRelatedModel = id)
        return $this->belongsTo(Blog::class, 'blog_id', 'id');
    }
}
