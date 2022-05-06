<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplyForJob extends Model
{
    protected $guarded = ['name', 'email', 'contact', 'cv'];

    public function getJobDetail()
    {
	    return $this->belongsTo(Job::class,'job_id');
    }
}
