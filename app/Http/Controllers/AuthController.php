<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login()
    {
        $data['title'] = 'Login';
        return view('auth.login', $data);
    }

    public function loginAction(Request $request)
    {

        $data_user = User::where('email', $request->email)->first();

        if (!$data_user) {
            return response()->json([
                'status' => 202,
                'success' => false,
                'message' => "Wrong username or password"
            ], 200);
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // dd(Auth::attempt(['email' => $request->email, 'password' => $request->password]));
            $request->session()->regenerate();
            return response()->json([
                'status' => 200,
                'success' => True,
                'message' => "Success",
                'data' => ['url_redirect' => route('dashboard')],
            ], 200);
        } else {
            return response()->json([
                'status' => 202,
                'success' => false,
                'message' => "Wrong username or password",
                'data' => [],
            ], 200);
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
