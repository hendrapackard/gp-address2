<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostCode extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'code',
        'village_id',
    ];

    public function village()
    {
        return $this->belongsTo('App\Village')->select(['id', 'name']);
    }
}
