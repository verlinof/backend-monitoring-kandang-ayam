<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        try {
            $request->validate([
                'username' => 'required|max:50',
                'password' => 'required',
            ]);
        
            $user = User::where('username', $request->username)->first();
        
            if (! $user || ! Hash::check($request->password, $user->password)) {
                throw ValidationException::withMessages([
                    'username' => ['The provided credentials are incorrect.'],
                ]);
            }
            
            $token = $user->createToken($user->username)->plainTextToken;

            return response()->json([
                "token" => $token
            ]);
        } catch (Exception $e) {
            return response()->json(['error' => $e], 500);
        }
        
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required',
            'username' => 'required|max:50',
            'email' => 'required|email',
            'status' => 'required|in:owner,anak kandang',
            'password' => 'required|max:50',
            'phone_number' => 'required'
        ]);
   
        try{
            $user = User::create([
                'nama_lengkap' => $validated['nama_lengkap'],
                'username' => $validated['username'],
                'email' => $validated['email'],
                'status' => $validated['status'],
                'password' => Hash::make($validated['password']),
                'phone_number' => $validated['phone_number']
            ]);
            return response()->json([
                'username' => $user->username,
                'status' => 'Success'
            ]);
        }catch(Exception $e){
            return response()->json([
                'error' => $e
            ]);
        } 
    }

    public function logout(Request $request)
    {
        try{
            return $request->user()->currentAccessToken()->delete();
        }catch(Exception $e){
            return response()->json([
                "error" => $e
            ]);
        }
    }
}