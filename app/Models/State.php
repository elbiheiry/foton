<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'states';

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['name', 'country_id', 'name_ar'];

    protected $appends = [
       'localized'
    ];

    /**
     * State has many Cities.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cities()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = state_id, localKey = id)
        return $this->hasMany(City::class, 'state_id', 'id');
    }

    /**
     * State belongs to Country.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        // belongsTo(RelatedModel, foreignKey = country_id, keyOnRelatedModel = id)
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    /**
     * State has many TestDrives.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function testDrives()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = state_id, localKey = id)
        return $this->hasMany(TestDrive::class, 'state_id', 'id');
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
