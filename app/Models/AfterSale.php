<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class AfterSale extends Model
{
    use SoftDeletes, SoftCascadeTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'after_sales';

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['active', 'city_id', 'map'];

    protected $appends = [
       'localized'
    ];

    protected $softCascade = ['afterSaleTranslations', 'contacts', 'workingHours'];

    /**
     * AfterSale has many AfterSaleTranslations.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function afterSaleTranslations()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = afterSale_id, localKey = id)
        return $this->hasMany(AfterSaleTranslation::class, 'after_sale_id', 'id');
    }

    /**
     * AfterSale belongs to City.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        // belongsTo(RelatedModel, foreignKey = city_id, keyOnRelatedModel = id)
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    /**
     * AfterSale morphs many Contact.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function contacts()
    {
        // morphMany(MorphedModel, morphableName, type = contactable_type, relatedKeyName = contactable_id, localKey = id)
        return $this->morphMany(Contact::class, 'contactable');
    }

    /**
     * AfterSale morphs many WorkingHour.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function workingHours()
    {
        // morphMany(MorphedModel, morphableName, type = hourable_type, relatedKeyName = hourable_id, localKey = id)
        return $this->morphMany(WorkingHour::class, 'hourable');
    }

    public function getLocalizedAttribute()
    {
        $model = $this;

        $localize = $model->afterSaleTranslations->where('locale', \App::getLocale())->first();
        if (!$localize) {
            $localize = $model->afterSaleTranslations->whereIn('locale', ['en','ar'])->first();
        }
        return $localize;
    }
}
