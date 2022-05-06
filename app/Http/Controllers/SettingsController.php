<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::first();
        // dd($settings);
        return view('backend.settings')->with(['title' => 'Setting'])->withSettings($settings);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
         // dd($request->input());
        $validator = $this->validateRules($request);
        if ($validator->fails() == TRUE) {
            return redirect('settings')
                ->withInput()
                ->withErrors($validator);
        } else {
            $data = $request->input();
            $fileOrignalName = $data['logo'];

            if ($request->file('logo')) {

                $validateImage = $request->validate(['logo' => 'required']);

                $fileOrignalName = $request->file('logo')->getClientOriginalName();

                $imagesPath = $request->file('logo')->storeAs('public/settings', $fileOrignalName);

            }
            try {
                $setting->where('id', $data['id'])->update([
                    'company_name' => $data['company_name'],
                    'company_email' => $data['company_email'],
                    'phone_no' => $data['phone_no'],
                    'address' => $data['address'],
                    'logo' => $fileOrignalName
                ]);
                return redirect()->back()->with('success', "Setting Updated successfully");
            } catch (Exception $e) {
                return redirect()->back()->with('error', "operation failed");
            }
        }
    }

    function validateRules(Request $request)
    {
        $rules = [
            'company_name' => 'required',
            'company_email' => 'required',
            'phone_no' => 'required',
            'address' => 'required',
        ];
        return Validator::make($request->all(), $rules);
    }
}
