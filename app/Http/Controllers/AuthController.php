<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Hash;
use Auth;
use Session;
use Cookie;

class AuthController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $user = Admin::where('email', $request->email)->first();

        if ($user) {
            Session::put('nama', $user->nama);

            if (Auth::attempt($credentials)) {
                return response()->json(true);
            } else {
                return response()->json(false);
            }
        } else {
            return response()->json('notavailable');
        }
    }

    public function logout() {
        Auth::logout();
        Session::forget('nama');
        return response()->json(["title" => "Berhasil", "text" => "Berhasil Logout", "type" => "info", "route" => route('index')]);
    }
}