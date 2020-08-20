<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $fillable = [
        'client_id',
        'email_address'
    ];

    protected $table = "emails";

    public function Client()
    {
        return $this->belongsTo('App\Models\Client')->withTrashed();
    }
}
