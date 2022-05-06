<?php

namespace App\Http\Controllers;

use App\Models\OurTeam;
use Illuminate\Http\Request;

class OurTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $ourteam = OurTeam::all();
        return view('backend.our-team.show', compact('ourteam'));
    }

    public function showTeamMembers()
    {
        $team = OurTeam::where('status', 'active')->latest()->get();
        return view('frontend.our_team', compact('team'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.our-team.add');
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
            'designation' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $fileOrignalNameWithSpaces = $request->file('image')->getClientOriginalName();
        $fileOrignalNameSpacesRemoved = preg_replace("/\s+/", "", $fileOrignalNameWithSpaces);
        $fileOrignalName = md5(date('Y-m-d H:i:s:u')).$fileOrignalNameSpacesRemoved;
        $path = $request->file('image')->storeAs('public/images', $fileOrignalName);
        $ourteam = new OurTeam;
        $ourteam->name = $request->name;
        $ourteam->designation = $request->designation;
        $ourteam->image = $fileOrignalName;
        $ourteam->save();

        return redirect()->route('show-ourteam')->with('success','Data added successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OurTeam  $ourTeam
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OurTeam  $ourTeam
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ourteam = OurTeam::findOrFail($id);
        return view('backend.our-team.edit')->with(['ourteam' => $ourteam]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OurTeam  $ourTeam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
        ]);

        $ourteam = OurTeam::find($id);
        if($request->hasFile('image')){
            $request->validate([
              'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $fileOrignalNameWithSpaces = $request->file('image')->getClientOriginalName();
            $fileOrignalNameSpacesRemoved = preg_replace("/\s+/", "", $fileOrignalNameWithSpaces);
            $fileOrignalName = md5(date('Y-m-d H:i:s:u')).$fileOrignalNameSpacesRemoved;
            $path = $request->file('image')->storeAs('public/images', $fileOrignalName);
            $ourteam->image = $fileOrignalName;
        }
        $ourteam->name = $request->name;
        $ourteam->designation = $request->designation;
        $ourteam->save();

        return redirect()->route('show-ourteam')->with('success', 'Data updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OurTeam  $ourTeam
     * @return \Illuminate\Http\Response
     */
    public function destroy(OurTeam $ourTeam)
    {
        //
    }

    public function changeStatus(Request $request)
    {
        $ourteam = OurTeam::find($request->id);
        $ourteam->status = $request->status;
        $ourteam->save();

        return response()->json(['success' => 'Status has been changed.']);
    }
}
