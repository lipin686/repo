<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index()
    {

        $users = User::all();
        return view('admin.users.users', compact('users'));
    }
    public function store(Request $request)
    {
         User::create([
            'name' => $request->input('modal-input-name'),
            'email' => $request->input('modal-input-email'),
            'password' => Hash::make($request->input('modal-input-password')),
            'role' => User::ROLE_USER,
        ]);
        return redirect()->route('users.index');
    }
    public function create()
    {
        
    }
    public function show()
    {
        
    }
    public function update(Request $request)
    {
        
        $user = User::find($request->input('modal-edit-id'));
        $user->name = $request->input('modal-edit-name');
        $user->email = $request->input('modal-edit-email');
        if($request->input('modal-edit-password')){
            $user->password = Hash::make($request->input('modal-edit-password'));
        }
        
        $user->save();
        return redirect()->route('users.index');
    }
    public function destroy($id)
    {
        
        User::find($id)->delete();
        //return redirect()->route('users.index'); 
    }
    public function edit()
    {
        
    }
}
