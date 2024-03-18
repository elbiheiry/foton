<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AfterSaleTranslation extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'after_sale_translations';

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
    protected $fillable = ['locale', 'title', 'address', 'description'];

    /**
     * AfterSaleTranslation belongs to AfterSale.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function afterSale()
    {
        // belongsTo(RelatedModel, foreignKey = afterSale_id, keyOnRelatedModel = id)
        return $this->belongsTo(AfterSale::class, 'after_sale_id', 'id');
    }
}
