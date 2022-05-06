<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Slider;
use App\Models\Job;
use App\Models\JobCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('frontend/home');
    }

    public function showHomePageData()
    {
        $currentDate = date('Y-m-d');
        $sliders = Slider::where('status', 'active')->latest()->get();
        $clients = Client::where('status', 'active')->latest()->get();
        //$jobs = Job::where('status', 'active')->where('app_deadline', '<=' , $currentDate)->with('jobCategoryDetails')->latest()->paginate(10);
        $jobs = Job::where('status', 'active')->where('app_deadline', '>=' , $currentDate)->with('jobCategoryDetails')->orderBy('id', 'desc')->take('10')->get();
        $jobscount = Job::where('status', 'active')->where('app_deadline', '>=' , $currentDate)->orderBy('id', 'desc')->get();
        //$jobcategories = JobCategory::where('status', 'active')->latest()->get();
        //$recruiterJobs = Job::where('post_by', 'recruiter')->latest()->get();
        return view('frontend.home', compact('sliders', 'jobs', 'jobscount','clients'));
    }


}
