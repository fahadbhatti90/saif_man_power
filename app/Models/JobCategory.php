<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    protected $fillable = ['title', 'image', 'positions'];

    public function jobs()
    {
    	return $this->hasMany(Job::class);
    }

    public function getJobsByCategory()
	{
		return $this->belongsTo(Job::class, 'job_sector');
	}
}
