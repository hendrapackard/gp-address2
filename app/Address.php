<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'address',
        'note',
        'village_id',
        'sub_district_id',
        'city_id',
        'province_id',
        'country_id',
        'is_default',
        'postcode',
        'latitude',
        'longitude',
        'owner_id',
    ];


    public function village()
    {
        return $this->belongsTo('App\Village')->select(['id', 'name']);
    }

    public function subDistrict()
    {
        return $this->belongsTo('App\SubDistrict')->select(['id', 'name']);
    }

    public function city()
    {
        return $this->belongsTo('App\City')->select(['id', 'name']);
    }

    public function province()
    {
        return $this->belongsTo('App\Province')->select(['id', 'name']);
    }

    public function country()
    {
        return $this->belongsTo('App\Country')->select(['id', 'name']);
    }
}
