<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\FooterFeturesTranslate;

class FooterFeture extends Model
{
    protected  $table = 'footer_fetures';
    protected $fields = ['title', 'description', 'icon'];
    protected $appends = [
        'localized'
    ];
    public function feturestranslation()
    {
        return $this->hasMany(FooterFeturesTranslate::class, 'footer_fetures_id', 'id');
    }
    public function getLocalizedAttribute()
    {
        $model = $this;

        $localize = $model->feturestranslation->where('locale', \App::getLocale())->first();
        if (!$localize) {
            $localize = $model->feturestranslation->whereIn('locale', ['en', 'ar'])->first();
        }
        return $localize;
    }
    public function getIconAttribute($value)
    {
        $url = 'uploads/' . $value;
        return $url;
    }
}
