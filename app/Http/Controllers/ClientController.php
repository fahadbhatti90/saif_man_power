<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $client = Client::orderBy('id', 'desc')->get();
        return view('backend.client.show', compact('client'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.client.add');
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
            'country' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        $fileOrignalNameWithSpaces = $request->file('image')->getClientOriginalName();
        $fileOrignalNameSpacesRemoved = preg_replace("/\s+/", "", $fileOrignalNameWithSpaces);
        $fileOrignalName = md5(date('Y-m-d H:i:s:u')).$fileOrignalNameSpacesRemoved;
        $path = $request->file('image')->storeAs('public/images', $fileOrignalName);
        $client = new Client;
        $client->title = $request->title;
        $client->country = $request->country;
        $client->image = $fileOrignalName;
        $client->save();

        return redirect()->route('show-client')->with('success','Data added successfully.');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('backend.client.edit')->with(['client' => $client]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'country' => 'required',
        ]);

        $client = Client::find($id);
        if($request->hasFile('image')){
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $fileOrignalNameWithSpaces = $request->file('image')->getClientOriginalName();
            $fileOrignalNameSpacesRemoved = preg_replace("/\s+/", "", $fileOrignalNameWithSpaces);
            $fileOrignalName = md5(date('Y-m-d H:i:s:u')).$fileOrignalNameSpacesRemoved;
            $path = $request->file('image')->storeAs('public/images', $fileOrignalName);
            $client->image = $fileOrignalName;
        }
        $client->title = $request->title;
        $client->country = $request->country;
        $client->save();

        return redirect()->route('show-client')->with('success', 'Data updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }

    public function changeStatus(Request $request)
    {
        $client = Client::find($request->id);
        $client->status = $request->status;
        $client->save();

        return response()->json(['success' => 'Status has been changed.']);
    }
}
