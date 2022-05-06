<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('backend.users.add');
    }

    public function show()
    {
    	$user = User::all();
    	return view('backend.users.show', compact('user'));
    }

    public function store(Request $request)
    {

    	$validator = $this->validateRules($request);
        
        if ($validator->fails()) {
             return redirect('add-user')->withInput()->withErrors($validator);
            // return redirect()->route('add-user')->with('error', 'user not added');
        }
        else
        {
            $user = $request->input();

        	$user = new User;
        	$user->name = $request->name;
        	$user->email = $request->email;
        	$user->password  = Hash::make($request->get('password'));
        	$user->usertype = $request->usertype;
        	$user->save();
        	// dd($user);
        	return redirect()->route('show-user')->with('success', 'User added successfully');
        }
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('backend.users.edit')->with(['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'usertype' => 'required',
        ]);

        $user = User::find($id);
        $user->name = $request->get('name');
        $user->usertype = $request->get('usertype');
        $user->update();

        return redirect()->route('show-user')->with('success', 'User updated successfully');

    }

    public function changeStatus(Request $request)
    {
        $designation = User::find($request->id);
        $designation->status = $request->status;
        $designation->save();

        return response()->json(['success' => 'Status has been changed.']);
    }

     function validateRules(Request $request)
    {
        
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'usertype' => 'required',
        ];
        return Validator::make($request->all(),$rules);

    }
}
