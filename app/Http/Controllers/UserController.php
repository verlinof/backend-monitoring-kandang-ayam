<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserDetailResource;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //GET semua anak kandang oleh owner
    public function index()
    {
        try{
            $user = User::where('status', '!=', 'owner')->get();
            return UserDetailResource::collection($user);
        }catch(Exception $e) {
            return response()->json([
                "error" => $e
            ],400);
        }
    }
    
    public function show($id)
    {
        try{
            $user = User::findOrFail($id);
         
            return new UserDetailResource($user);
        }catch(Exception $e) {
            return response()->json([
                "error" => $e
            ],400);
        }
    }

    public function update(Request $request, $id)
    {
        try{
            $request->validate([
                'nama_lengkap' => '',
                'username' => 'max:50',
                'email' => 'email',
                'password' => 'max:50',
                'no_telepon' => ''
            ]);
            
            $request['password'] = Hash::make($request->password);
            $user = User::findOrFail($id);
            $user->update($request->all());
            
            return new UserDetailResource($user);
            
        }catch(Exception $e) {
            return response()->json([
                "error" => $e
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try{
            $user = Auth::user();
            $deleteUser = User::findOrFail($user->id);
            $deleteUser->delete();
            $request->user()->currentAccessToken()->delete();

            return response()->json([
                "username" => $user->username,
                "status" => "Akun Berhasil Dihapus"
            ]);
            
        }catch(Exception $e){
            return response()->json([
                "error" => $e
            ],404);
        }
    }
}