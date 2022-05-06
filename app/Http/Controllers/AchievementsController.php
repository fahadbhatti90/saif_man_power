<?php

namespace App\Http\Controllers;

use App\Models\Achievements;
use Illuminate\Http\Request;

class AchievementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $achievements = Achievements::all();
        return view('backend.achievements.show', compact('achievements'));
    }

    public function showAchievements()
    {
        $achievements = Achievements::latest()->get();
        return view('frontend.achievements', compact('achievements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.achievements.add');
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
            'title' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $fileOrignalNameWithSpaces = $request->file('image')->getClientOriginalName();
        $fileOrignalNameSpacesRemoved = preg_replace("/\s+/", "", $fileOrignalNameWithSpaces);
        $fileOrignalName = md5(date('Y-m-d H:i:s:u')).$fileOrignalNameSpacesRemoved;
        $path = $request->file('image')->storeAs('public/images', $fileOrignalName);
        $achievements = new Achievements;
        $achievements->title = $request->title;
        $achievements->achievement_type = $request->achievement_type;
        $achievements->image = $fileOrignalName;
        $achievements->save();

        return redirect()->route('show-achievements')->with('success','Data added successfully.');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Achievements  $achievements
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $achievements = Achievements::findOrFail($id);
        return view('backend.achievements.edit')->with(['achievements' => $achievements]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Achievements  $achievements
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $achievements = Achievements::find($id);
        if($request->hasFile('image')){
            $request->validate([
              'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $fileOrignalNameWithSpaces = $request->file('image')->getClientOriginalName();
            $fileOrignalNameSpacesRemoved = preg_replace("/\s+/", "", $fileOrignalNameWithSpaces);
            $fileOrignalName = md5(date('Y-m-d H:i:s:u')).$fileOrignalNameSpacesRemoved;
            $path = $request->file('image')->storeAs('public/images', $fileOrignalName);
            $achievements->image = $fileOrignalName;
        }
        $achievements->title = $request->title;
        $achievements->achievement_type = $request->achievement_type;
        $achievements->save();

        return redirect()->route('show-achievements')->with('success', 'Data updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Achievements  $achievements
     * @return \Illuminate\Http\Response
     */
    public function destroy(Achievements $achievements)
    {
        //
    }

    public function changeStatus(Request $request)
    {
        $achievements = Achievements::find($request->id);
        $achievements->status = $request->status;
        $achievements->save();

        return response()->json(['success' => 'Status has been changed.']);
    }
}
