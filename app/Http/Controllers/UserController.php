<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }
    public function store(Request $request)
    {
        $user = new User();
        $user->email_address = $request->input("email_address");
        $user->password = bcrypt($request->input("password"));
        $user->save();

        return response()->json($user);
    }
    public function show($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->email_address = $request->input('email_address');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return response()->json($user);
    }
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(('User deleted Successfully'));
    }
    
}
