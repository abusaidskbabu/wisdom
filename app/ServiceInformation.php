<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceInformation extends Model
{
    protected $fillable = [
        'name', 'description', 'icon','image','status','parent',
    ];
}
