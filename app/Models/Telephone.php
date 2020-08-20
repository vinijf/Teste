<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Telephone extends Model
{
    protected $fillable = [
        'client_id',
        'telephone_number'
    ];

    protected $table = "telephones";

    public function Client()
    {
        return $this->belongsTo('App\Models\Client')->withTrashed();
    }
}
