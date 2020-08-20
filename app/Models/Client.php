<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'client_name',
        'client_status'
    ];

    protected $table = "clients";
}
