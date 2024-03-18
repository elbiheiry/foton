<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactUs extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'contact_us';

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'mobile', 'email', 'call_time', 'message'];
}
