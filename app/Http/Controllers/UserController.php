<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\DataTables\UserDataTable;
use App\Mail\UserMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('back.user.index');
    }

    public function create()
    {
        return view('back.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        $data = [
            "subject"=> "Your Login Info",
            "body"=> [
                "name" => $request->name,
                "email" => $request->email,
                "password" => $request->password,
            ]
        ];

        Mail::to($request->email)->send(new UserMail($data));
        
        return redirect()->route('admin.user')->with('success', 'New user added successfully');

    }

    public function edit($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        return view('back.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->firstOrFail();

        if($user->email != $request->email) {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8',
                'confirm_password' => 'required|same:password',
            ]);
        } else {
            $request->validate([
                'name' => 'required',
                'password' => 'required|min:8',
                'confirm_password' => 'required|same:password',
            ]);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        $data = [
            "subject"=> "Your Login Info",
            "body"=> [
                "name" => $request->name,
                "email" => $request->email,
                "password" => $request->password,
            ]
        ];

        Mail::to($request->email)->send(new UserMail($data));

        if($user->email == Auth::user()->email) {
            Session::flush();
            Auth::logout();
            return redirect('login');
        } else {
            return redirect()->route('admin.user')->with('success', 'User info updated successfully');
        }

    }

    public function delete(Request $request)
    {
        
        $user = User::where('id', $request->data_id)->firstOrFail();
        $user->delete();
        return redirect()->route('admin.user')->with('success', 'User removed successfully');
    }

    public function user()
    {
        $user = Auth::user();
        return view('back.user.user', compact('user'));
    }
}
