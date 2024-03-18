<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'applications';

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'notes', 'resume'];
}
