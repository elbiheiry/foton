<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cities';

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['name', 'state_id', 'country_id', 'name_ar'];

    protected $appends = [
       'localized'
    ];

    /**
     * City belongs to State.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function state()
    {
        // belongsTo(RelatedModel, foreignKey = state_id, keyOnRelatedModel = id)
        return $this->belongsTo(State::class, 'state_id', 'id');
    }

    /**
     * City belongs to Country.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        // belongsTo(RelatedModel, foreignKey = country_id, keyOnRelatedModel = id)
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function getLocalizedAttribute()
    {
        $model = $this;
        if(\App::getLocale() == 'ar'){
            $localize = $model->name_ar;
            if(!$localize){
                $localize = $model->name;
            }
        }else {
            $localize = $model->name;
        }

        return $localize;
    }
}
