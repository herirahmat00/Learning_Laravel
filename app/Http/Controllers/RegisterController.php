<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function register()
    {
        $data['title'] = 'Registration';
        return view('auth.register', $data);
    }

    public function insert(Request $request)
    {
        // return view('auth.login');
        // dd($request);
        DB::beginTransaction();
        try {
            $data_user = User::where('email', $request->email)->get();

            if (count($data_user) > 0) {
                return response()->json([
                    'status' => 202,
                    'success' => false,
                    'message' => "Email has been registered, please check again"
                ], 200);
            }

            $data_insert = array(
                'id' => Str::uuid(),
                'firstName' => $request->first_name,
                'lastName' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role == 'Admin' ? "0" : "1",
            );

            $user = new User($data_insert);
            $user->save();
            DB::commit();

            return response()->json([
                'status' => 200,
                'success' => true,
                'message' => "Registration Success",
            ], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 500,
                'success' => false,
                'message' => $e->getMessage()
            ], 200);
        }
    }
}
