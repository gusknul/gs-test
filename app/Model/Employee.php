<?php

namespace GsTest\Model;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    protected $fillable = ['name', 'last_name', 'phone', 'address', 'image_profile'];


    function user()
    {
        return $this->belongsTo('GsTest\User');
    }
}
