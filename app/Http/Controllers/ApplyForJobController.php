<?php

namespace App\Http\Controllers;

use App\Models\ApplyForJob;
use App\Models\Job;
use Illuminate\Http\Request;
use Storage;

class ApplyForJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $applyjobDetail = ApplyForJob::with('getJobDetail')->latest()->get();
        // dd($applyjobDetail);
        // foreach ($applyjobDetail as $job){
        //     $job->getJobDetail->title;
        // }
        return view('backend.apply_job.show', compact('applyjobDetail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'contact' => 'required|max:15',
            'cv' => 'required|mimes:jpg,jpeg,pdf,docx,doc|max:2048',
        ]);
        $fileOrignalNameWithSpaces = $request->file('cv')->getClientOriginalName();
        $fileOrignalNameSpacesRemoved = preg_replace("/\s+/", "", $fileOrignalNameWithSpaces);
        $fileOrignalName = md5(date('Y-m-d H:i:s:u')).$fileOrignalNameSpacesRemoved;
        $path = $request->file('cv')->storeAs('public/images', $fileOrignalName);
        $applyjob = new ApplyForJob;
        $applyjob->job_id = $request->job_id;
        $applyjob->name = $request->name;
        $applyjob->email = $request->email;
        $applyjob->contact = $request->contact;
        $applyjob->cv = $fileOrignalName;
        // dd($applyjob);
        $applyjob->save();
        return redirect()->back()->with('success', 'Applied for Job successfully');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ApplyForJob  $applyForJob
     * @return \Illuminate\Http\Response
     */
    public function edit(ApplyForJob $applyForJob)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ApplyForJob  $applyForJob
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ApplyForJob $applyForJob)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ApplyForJob  $applyForJob
     * @return \Illuminate\Http\Response
     */
    public function destroy(ApplyForJob $applyForJob)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ApplyForJob  $applyForJob
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Request $request)
    {
        if (ApplyForJob::where('id', intval($request->id))->count() > 0) {
            $getFileName = ApplyForJob::where('id', intval($request->id))->first();
            if (!empty($getFileName)) {
            $fileName = $getFileName->cv;
           // dd(storage_path('public/images/'.$fileName));
             //unlink(storage_path('public/images/'.$fileName));
                Storage::delete(['public/images/'.$fileName]);
                ApplyForJob::where('id', intval($request->id))
                ->delete();
        }
        }
/*        $job = Job::find($request->id);
        $job->status = $request->status;
        $job->save();*/

        return response()->json(['success' => 'Record Deleted Successfully.']);
    }
}
