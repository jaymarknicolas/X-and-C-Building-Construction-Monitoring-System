<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function create() {
        return view('register.registration-form');
    }

    public function store(Request $request) {

        $this->validate($request, [
            'employee_id' => 'required|alpha_num|unique:users',
            'name' => 'required|string|max:20',
            'email' => 'required|email|unique:users',
            'password' => 'required|alpha_num|min:8',
            'confirm_password' => 'required|same:password',
            'user_type' => 'required|string',
            'status' => 'required|string',
        ]);

        $admin = User::where('user_type', $request->user_type)->get();

        $user = new User;
        $user->employee_id = $request->employee_id;
        $user->fullname = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->user_type = $request->user_type;
        $user->status = $request->status;
        $isSave = $user->save();

        if(!is_null($isSave)) {
            return redirect('/admin/users')->with('success', 'User Successfully Added!');
        }
        else {
            return back()->with("error", "Alert! Failed to register");
        }
    }
}
