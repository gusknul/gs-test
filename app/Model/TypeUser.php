<?php

namespace GsTest\Model;

use Illuminate\Database\Eloquent\Model;

class TypeUser extends Model
{
    const ADMIN = 1;
    const EMPLOYEE = 2;

    function user()
    {
        return $this->hasOne('GsTest\User');
    }
}
