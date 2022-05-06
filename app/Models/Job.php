<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    // protected $guarded = ['title', 'description', 'company_name', 'email', 'username', 'app_deadline', 'job_sector', 'salary', 'currency', 'offered_salary', 'career_level', 'experience', 'gender', 'industry', 'qualification', 'file', 'country', 'state', 'city', 'post_by'];

//    public function jobApplyDetail()
//    {
//    	return $this->hasMany(ApplyForJob::class);
//    } public function jobApplyDetail()
//    {
//    	return $this->hasMany(ApplyForJob::class);
//    }

	public function jobCategoryDetails()
	{
		return $this->belongsTo(JobCategory::class, 'job_sector');
	}
}
