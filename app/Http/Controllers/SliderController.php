<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $slider = Slider::all();
        return view('backend.slider.show', compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.slider.add');
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
        $slider = new Slider;
        $slider->title = $request->title;
        $slider->image = $fileOrignalName;
        $slider->save();

        return redirect()->route('show-slider')->with('success','Data added successfully.');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('backend.slider.edit')->with(['slider' => $slider]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $slider = Slider::find($id);
        if($request->hasFile('image')){
            $request->validate([
              'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $fileOrignalNameWithSpaces = $request->file('image')->getClientOriginalName();
            $fileOrignalNameSpacesRemoved = preg_replace("/\s+/", "", $fileOrignalNameWithSpaces);
            $fileOrignalName = md5(date('Y-m-d H:i:s:u')).$fileOrignalNameSpacesRemoved;
            $path = $request->file('image')->storeAs('public/images', $fileOrignalName);
            $slider->image = $fileOrignalName;
        }
        $slider->title = $request->title;
        $slider->save();

        return redirect()->route('show-slider')->with('success', 'Data updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        //
    }

    public function changeStatus(Request $request)
    {
        $slider = Slider::find($request->id);
        $slider->status = $request->status;
        $slider->save();

        return response()->json(['success' => 'Status has been changed.']);
    }
}
