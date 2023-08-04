<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
class UserController extends Controller
{
    public function show_users () {
        $users = User::all();
        return view('users' , ['users'=>$users]);
    }

    public function create_user (Request $request) {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $user->save();
        
        return redirect(route('index'));
    }

    // public function count() {
    //     $users = User::all()->count();
    // }
}
