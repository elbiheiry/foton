<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Dealer extends Model
{
    use SoftDeletes, SoftCascadeTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dealers';

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['active', 'map', 'images', 'city_id'];

    protected $appends = [
       'localized', 'cityLocalized', 'stateLocalized'
    ];

    protected $softCascade = ['dealerTranslations', 'contacts', 'workingHours'];

    /**
     * Dealer has many DealerTranslations.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dealerTranslations()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = dealer_id, localKey = id)
        return $this->hasMany(DealerTranslation::class, 'dealer_id', 'id');
    }

    /**
     * Dealer morphs many Contact.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function contacts()
    {
        // morphMany(MorphedModel, morphableName, type = able_type, relatedKeyName = able_id, localKey = id)
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

    /**
     * Dealer belongs to City.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        // belongsTo(RelatedModel, foreignKey = city_id, keyOnRelatedModel = id)
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function setImagesAttribute($images)
    {
        if (is_array($images)) {
            $this->attributes['images'] = json_encode($images);
        }
    }

    public function getImagesAttribute($images)
    {
        return json_decode($images, true);
    }

    public function getLocalizedAttribute()
    {
        $model = $this;

        $localize = $model->dealerTranslations->where('locale', \App::getLocale())->first();
        if (!$localize) {
            $localize = $model->dealerTranslations->whereIn('locale', ['en','ar'])->first();
        }
        return $localize;
    }

    public function getCityLocalizedAttribute()
    {
        $model = $this;

        if(\App::getLocale() == 'ar'){
            $city = $model->city->name_ar;
            if(!$city){
                $city = $model->city->name;
            }
        }else{
            $city = $model->city->name;
        }

        return $city;
    }

    public function getstateLocalizedAttribute()
    {
        $model = $this;

        if(\App::getLocale() == 'ar'){
            $state = $model->city->state->name_ar;
            if(!$state){
                $state = $model->city->state->name;
            }
        }else{
            $state = $model->city->state->name;
        }

        return $state;
    }
}
