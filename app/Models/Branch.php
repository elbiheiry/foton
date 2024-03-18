<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Branch extends Model
{
    use SoftDeletes, SoftCascadeTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'branches';

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['active', 'map', 'images'];

    protected $appends = [
       'localized'
    ];

    protected $softCascade = ['branchTranslations', 'contacts', 'workingHours'];

    /**
     * Branch has many BranchTranslations.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function branchTranslations()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = branch_id, localKey = id)
        return $this->hasMany(BranchTranslation::class, 'branch_id', 'id');
    }

    /**
     * Branch morphs many Contact.
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

        $localize = $model->branchTranslations->where('locale', \App::getLocale())->first();
        if (!$localize) {
            $localize = $model->branchTranslations->whereIn('locale', ['en','ar'])->first();
        }
        return $localize;
    }
}
