<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model {

    /**
     * Mass assignable attributes.
     * 
     * @var array
     */
    protected $fillable = [
        'key', 'data'
    ];

    /**
     * $conf->data accessor.
     * 
     * @return mixed
     */
    public function getDataAttribute()
    {
        return json_decode($this->attributes['data']);
    }
}
