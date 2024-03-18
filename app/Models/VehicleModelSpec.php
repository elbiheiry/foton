<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicleModelSpec extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'vehicle_model_specifications';

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
    protected $fillable = ['spec_id', 'value_en', 'value_ar'];

    protected $appends = [
       'localized'
    ];

    public function spec(){
        return $this->belongsTo('App\Models\Spec');
    }

    public function getLocalizedAttribute()
    {
        $model = $this;

        if(\App::getLocale() == 'ar'){
            $localize = $model->value_ar;
            if(!$localize){
                $localize = $model->value_en;
            }
        }else {
            $localize = $model->value_en;
        }

        return $localize;
    }
}
