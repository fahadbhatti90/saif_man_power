<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    public $table = "cities";
    protected $fillable = [
        'id',
        'name'
    ];
}
