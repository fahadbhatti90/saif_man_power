<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobCategory;
use App\Models\ApplyForJob;
use Illuminate\Http\Request;
use App\Countries;
use App\Cities;
use Storage;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show()
    {
        // $jobDetail = Job::with('jobCategoryDetails')->find(1);

        // foreach ($jobDetail as $job){
        //     $job->jobCategoryDetails->job_sector;
        // }
        // dd($jobDetail);
        $adminjobs = Job::where('post_by', 'admin')->where('status','active')->with('jobCategoryDetails')->orderBy('id', 'desc')->get();
        $recruiterjobs = Job::where('post_by', 'recruiter')->with('jobCategoryDetails')->orderBy('id', 'desc')->get();
         // dd($adminjobs);
        return view('backend.post-job.show', compact('adminjobs', 'recruiterjobs'));
    }


    public function showJobs()
    {
        $jobs = Job::where('status', 'active')->latest()->get();
        return view('frontend.job_list', compact('jobs'));
    }

    public function jobCount()
    {
        $jobs = Job::all();
        $jobapply = ApplyForJob::all();
        $jobcategory = JobCategory::all();
        $recruiterjobs = Job::where('post_by', 'recruiter')->get();
        return view('frontend.about_us', compact('jobs', 'jobapply', 'jobcategory', 'recruiterjobs'));
    }

    public function jobsCount()
    {
        $jobs = Job::all();
        $jobapply = ApplyForJob::all();
        $recruiterjobs = Job::where('post_by', 'recruiter')->get();
        return view('frontend.services', compact('jobs', 'jobapply', 'recruiterjobs'));
    }

    public function showJobDetails($id)
    {
        $job = Job::with('jobCategoryDetails')->findOrFail($id);
        $jobapply = ApplyForJob::all();
        //dd($job);
        return view('frontend.job_detail', compact('job', 'jobapply'));
    }

    public function showJobCategoryDetails($id)
    {
        // $jobcategory = Job::with('jobCategoryDetails')->findOrFail($id);
        $currentDate = date('Y-m-d');
        $jobsResult   = Job::where('job_sector', $id)->where('status', 'active')->where('app_deadline', '>=' , $currentDate)->orderBy('id', 'desc')->take(100)->get();
        $jobCategoryTitle = JobCategory::findOrFail($id);
         return view('frontend.job_list', compact('jobsResult', 'jobCategoryTitle'));
    }
    public function showCurrentJobs()
    {
        $currentDate = date('Y-m-d');
        $jobsResult   = Job::where('app_deadline', '>=' , $currentDate)->where('status', 'active')->orderBy('id', 'desc')->get();
        return view('frontend.current-jobs', compact('jobsResult'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobcat = JobCategory::all();
        return view('backend.post-job.add', compact('jobcat'));
    }

    public function indexPostJob()
    {
        $jobcat = JobCategory::all();
        return view('frontend.post_job', compact('jobcat'));
    }

    public function confirmPostJob()
    {
        return view('frontend.confirmation');
    }

    public function storePostJob(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'company_name' => 'required',
            'address' => 'required',
            'email' => 'required',
            /*'username' => 'required',*/
            'app_deadline' => 'required',
            'job_sector' => 'required',
            /*'salary' => 'required',*/
            'min' => 'required',
            'max' => 'required',
            'currency' => 'required',
            /*'offered_salary' => 'required',*/
            'career_level' => 'required',
            'experience' => 'required',
            'gender' => 'required',
            'job_type' => 'required',
            'qualification' => 'required',
            'country' => 'required',
            'city' => 'required',
            'file' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $fileOrignalName = $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->storeAs('public/images', $fileOrignalName);
        $job = new Job;
        $job->title = $request->title;
        $job->description = $request->description;
        $job->company_name = $request->company_name;
        $job->address = $request->address;
        $job->email = $request->email;
        //$job->username = $request->username;
        $job->app_deadline = $request->app_deadline;
        $job->job_sector = $request->job_sector;
        //$job->salary = $request->salary;
        $job->min = $request->min;
        $job->max = $request->max;
        $job->currency_id = $request->currency;
        $job->currency = $request->currency_name;
        //$job->offered_salary = $request->offered_salary;
        $job->career_level = $request->career_level;
        $job->experience = $request->experience;
        $job->gender = $request->gender;
        $job->job_type = $request->job_type;
        $job->qualification = $request->qualification;
        $job->country = $request->country_name;
        $job->country_id = $request->country;
        $job->city = $request->city_name;
        $job->city_id = $request->city;
        $job->post_by = 'recruiter';
        $job->status = 'inactive';
        $job->file = $fileOrignalName;
        $job->save();

        return redirect()->route('confirmation')->with('success','Job posted! Please check the job in a while...');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'company_name' => 'required',
            'address' => 'required',
            'email' => 'required',
            /*'username' => 'required',*/
            'app_deadline' => 'required',
            'job_sector' => 'required',
            /*'salary' => 'required',*/
            'min' => 'required',
            'max' => 'required',
            'currency' => 'required',
            /*'offered_salary' => 'required',*/
            'career_level' => 'required',
            'experience' => 'required',
            'gender' => 'required',
            'job_type' => 'required',
            'qualification' => 'required',
            'country_name' => 'required',
            'city_name' => 'required',
            /*'country' => 'required',
            'city' => 'required',*/
            'file' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $fileOrignalName = $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->storeAs('public/images', $fileOrignalName);
        $job = new Job;
        $job->title = $request->title;
        $job->description = $request->description;
        $job->company_name = $request->company_name;
        $job->address = $request->address;
        $job->email = $request->email;
        /*$job->username = $request->username;*/
        $job->app_deadline = $request->app_deadline;
        $job->job_sector = $request->job_sector;
        /*$job->salary = $request->salary;*/
        $job->min = $request->min;
        $job->max = $request->max;
        $job->currency_id = $request->currency;
        $job->currency = $request->currency_name;
        /*$job->offered_salary = $request->offered_salary;*/
        $job->career_level = $request->career_level;
        $job->experience = $request->experience;
        $job->gender = $request->gender;
        $job->job_type = $request->job_type;
        $job->qualification = $request->qualification;
        $job->country = $request->country_name;
        $job->country_id = 1;
        /*$job->country_id = $request->country;*/
        $job->city = $request->city_name;
        /*$job->city_id = $request->city;*/
        $job->city_id = 1;
        $job->post_by = 'admin';
        $job->status = 'active';
        $job->file = $fileOrignalName;
        $job->save();

        return redirect()->route('show-job')->with('success','Data added successfully.');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::findOrFail($id);
        $jobs = JobCategory::all();
        $jobcat = Job::with('jobCategoryDetails')->findOrFail($id);
        return view('backend.post-job.edit')->with(['job' => $job, 'jobs' => $jobs, 'jobcat' => $jobcat]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'company_name' => 'required',
            'address' => 'required',
            'email' => 'required',
            /*'username' => 'required',*/
            'app_deadline' => 'required',
            'job_sector' => 'required',
            /*'salary' => 'required',*/
            'min' => 'required',
            'max' => 'required',
            'currency' => 'required',
            /*'offered_salary' => 'required',*/
            'career_level' => 'required',
            'experience' => 'required',
            'gender' => 'required',
            'job_type' => 'required',
            'qualification' => 'required',
            'country_name' => 'required',
            'city_name' => 'required',
        ]);

        $job = Job::find($id);
        if($request->hasFile('file')){
            $request->validate([
              'file' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $fileOrignalName = $request->file('file')->getClientOriginalName();
            $path = $request->file('file')->storeAs('public/images', $fileOrignalName);
            $job->file = $fileOrignalName;
        }
        $job->title = $request->title;
        $job->description = $request->description;
        $job->company_name = $request->company_name;
        $job->address = $request->address;
        $job->email = $request->email;
        /*$job->username = $request->username;*/
        $job->app_deadline = $request->app_deadline;
        $job->job_sector = $request->job_sector;
        /*$job->salary = $request->salary;*/
        $job->min = $request->min;
        $job->max = $request->max;
        $job->currency_id = $request->currency;
        $job->currency = $request->currency_name;
        /*$job->offered_salary = $request->offered_salary;*/
        $job->career_level = $request->career_level;
        $job->experience = $request->experience;
        $job->gender = $request->gender;
        $job->job_type = $request->job_type;
        $job->qualification = $request->qualification;
        $job->country = $request->country_name;
        $job->country_id = 1;
        /*$job->country_id = $request->country;*/
        $job->city = $request->city_name;
        /*$job->city_id = $request->city;*/
        $job->city_id = 1;
        $job->save();

        return redirect()->route('show-job')->with('success', 'Data updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        //
    }

    public function changeStatus(Request $request)
    {
        $job = Job::find($request->id);
        $job->status = $request->status;
        $job->save();
        /*if (Job::where('id', intval($request->id))->count() > 0) {
            if (ApplyForJob::where('job_id', intval($request->id))->count() > 0) {
                $getFileName = ApplyForJob::where('job_id', intval($request->id))->get();
                if (!empty($getFileName)) {
                foreach ($getFileName as $singleFileName){
                    $fileName = $singleFileName->cv;
                    Storage::delete(['public/images/'.$fileName]);
                    $deleteCv =  ApplyForJob::where('job_id', intval($request->id))
                        ->delete();
                }

                }
            }
            $deleteJob = Job::where('id', intval($request->id))->delete();
        }*/

        return response()->json(['success' => 'Status has been changed successfully.']);
    }
    public function countries(Request $request){
        //return "testing";
        try {
            if(!isset($_GET['type']) || empty($_GET['type'])) {
                throw new exception("Type is not set.");
            }
            $type = $_GET['type'];
            if($type=='getCountries') {
                $data = $this->getCountries();
            }

            if($type=='getCities') {
                if(!isset($_GET['countryId']) || empty($_GET['countryId'])) {
                    throw new exception("Country Id is not set.");
                }
                $countryId = $_GET['countryId'];
                $data = $this->getCities($countryId);
            }

        } catch (Exception $e) {
            $data = array('status'=>'error', 'tp'=>0, 'msg'=>$e->getMessage());
        } finally {
            echo json_encode($data);
        }
    }
    // Fetch all countries list
    private function getCountries() {
        try {
            $query = Countries::all();
            if(!$query) {
                throw new exception("Country not found.");
            }
            $res = array();
            foreach ($query as $resultSet){
                $res[$resultSet->id] = $resultSet->name;
            }
            $data = array('status'=>'success', 'tp'=>1, 'msg'=>"Countries fetched successfully.", 'result'=>$res);
        } catch (Exception $e) {
            $data = array('status'=>'error', 'tp'=>0, 'msg'=>$e->getMessage());
        } finally {
            return $data;
        }
    }
    // Fetch all cities list by state id
    private function getCities($countryId) {
        try {
            $query = Cities::where("country_id", $countryId)->get();
            //dd($query);
            //dd($query);
            if(!$query) {
                throw new exception("City not found.");
            }
            $res = array();
            foreach ($query as  $resultSet){
                $res[$resultSet->id] = $resultSet->name;
            }
            //dd($res);
            $data = array('status'=>'success', 'tp'=>1, 'msg'=>"Cities fetched successfully.", 'result'=>$res);
        } catch (Exception $e) {
            $data = array('status'=>'error', 'tp'=>0, 'msg'=>$e->getMessage());
        } finally {
            return $data;
        }
    }

}
