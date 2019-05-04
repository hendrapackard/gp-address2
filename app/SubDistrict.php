<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubDistrict extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
    ];

    public function address()
    {
        return $this->hasMany("App\Address");
    }
}
