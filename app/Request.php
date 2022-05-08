<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone', 'resume','letter', 'job_id',
    ];
}
