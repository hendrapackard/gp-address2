<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Village extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
    ];

    public function postCode()
    {
        return $this->hasMany("App\PostCode");
    }

    public function address()
    {
        return $this->hasMany("App\Address");
    }
}
