<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'countries';

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['name', 'name_ar'];

    protected $appends = [
       'localized'
    ];

    /**
     * Country has many States.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function states()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = country_id, localKey = id)
        return $this->hasMany(State::class, 'country_id', 'id');
    }

    /**
     * Country has many Cities.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cities()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = country_id, localKey = id)
        return $this->hasMany(City::class, 'country_id', 'id');
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
