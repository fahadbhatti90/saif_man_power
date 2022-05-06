<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUsEmail;

class ContactusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $contact = ContactUs::where('status','active')->get();
        return view('backend.contact_us.show', compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::all();
        return view('frontend.contact_us', compact('settings'));
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
            'subject' => 'required',
            'email' => 'required|email',
            'phone' => 'required|max:15',
            'message' => 'required',
        ]);

        $contact = new ContactUs;
        $contact->name = $request->name;
        $contact->subject = $request->subject;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;

        $contact->save();

        //Mail::to ('fahadbhatti90@gmail.com')->send(new ContactUsEmail($contact));
        return redirect()->route('add-contactus')->with('success','Thanks for your message, we will contact you soon.');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactUs $contactUs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactUs $contactUs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactUs $contactUs)
    {
        //
    }

    public function changeStatus(Request $request)
    {
        $contact = ContactUs::find($request->id);
        $contact->status = $request->status;
        $contact->save();

        return response()->json(['success' => 'Status has been changed.']);
    }
}
