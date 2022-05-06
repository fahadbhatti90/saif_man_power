<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\User;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\ApplyForJob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function updatePassword()
    {

        $userID = Auth::user()->id;
         return view('backend.change_pass')->with(['userID' => $userID]);
    }

    public function changePassword(Request $request, $id)
    {
        $this->validate($request, [
            'oldpassword' => ['required', 'string', 'min:8'],
            'newpassword' => ['required', 'string', 'min:8'],
        ]);


        $hashedPassword = Auth::user()->password;

        if (Hash::check($request->oldpassword, $hashedPassword)) {

            if (!Hash::check($request->newpassword, $hashedPassword)) {

                $users = User::find(Auth::user()->id);
                $users->password = bcrypt($request->newpassword);
                User::where('id', Auth::user()->id)->update(array('password' => $users->password));

                return redirect()->route('change-password')->with('success', "Password Changed successfully.");
                
            } else {
                return redirect()->route('change-password')->with('error', "new password can not be the old password!");
            }
        } else {
            return redirect()->route('change-password')->with('error', "old password does not matched.");
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::all();
        $recruiters = Job::where('post_by', 'recruiter')->get();
        $jobcategories = JobCategory::all();
        $jobapplies = ApplyForJob::all();
        return view('backend/index', compact('jobs', 'recruiters', 'jobcategories', 'jobapplies'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
