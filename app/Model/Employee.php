<?php

namespace GsTest\Model;

use Illuminate\Database\Eloquent\Model;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class Employee extends Model implements StaplerableInterface
{
    use EloquentTrait;

    protected $fillable = ['name', 'last_name', 'phone', 'address', 'image_profile'];


    function user()
    {
        return $this->belongsTo('GsTest\User');
    }

    public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('image_profile', [
            'styles' => [
                'medium' => '300x300',
                'thumb' => '100x100'
            ]
        ]);

        parent::__construct($attributes);
    }
}
