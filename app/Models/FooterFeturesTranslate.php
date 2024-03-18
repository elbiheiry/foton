<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\FooterFeture;
class FooterFeturesTranslate extends Model
{
    protected $table = 'footer_fetures_translations';
    protected $fillable = ['title', 'description', 'locale'];
    
    public function footerFeture(){
        return $this->belongsTo(FooterFeture::class,'footer_fetures_id');
    }

}
