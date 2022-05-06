<?php

namespace App\Http\Controllers;

use App\Models\JobCategory;
use Illuminate\Http\Request;

class JobCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $jobcat = JobCategory::all();
        return view('backend.job-category.show', compact('jobcat'));
    }

    public function showJobCategories()
    {
        $jobcategories = JobCategory::where('status', 'active')->latest()->get();
        return view('frontend.job', compact('jobcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.job-category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fileOrignalName = null;
        $request->validate([
            'title' => 'required',
            'positions' => 'required',
        ]);
        if(!empty($request->file('image'))){
        $fileOrignalName = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('public/images', $fileOrignalName);
        }

        $jobcat = new JobCategory;

        $jobcat->title = $request->title;
        $jobcat->positions = $request->positions;
        $jobcat->image = $fileOrignalName ;
        $jobcat->save();

        return redirect()->route('show-jobcategory')->with('success','Data added successfully.');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobCategory  $jobCategory
     * @return \Illuminate\Http\Response
     */
     public function edit($id)
    {
        $jobcat = JobCategory::findOrFail($id);
        return view('backend.job-category.edit')->with(['jobcat' => $jobcat]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobCategory  $jobCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'positions' => 'required',
        ]);

        $jobcat = JobCategory::find($id);
        if($request->hasFile('image')){
            $fileOrignalName = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('public/images', $fileOrignalName);
            $jobcat->image = $fileOrignalName;
        }
        $jobcat->title = $request->title;
        $jobcat->positions = $request->positions;
        $jobcat->save();

        return redirect()->route('show-jobcategory')->with('success', 'Data updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobCategory  $jobCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobCategory $jobCategory)
    {
        //
    }

    public function addAjax(Request $request)
    {
        $jobcat = new JobCategory;

        $jobcat->title = $request->title;
        $jobcat->positions = $request->positions;
        //dd($jobcat);
        $jobcat->save();

        return response()->json(['success' => 'Job Category Added.']);
    }

    public function changeStatus(Request $request)
    {
        $jobcat = JobCategory::find($request->id);
        $jobcat->status = $request->status;
        $jobcat->save();

        return response()->json(['success' => 'Status has been changed.']);
    }
}
