<?php

namespace App\Http\Controllers;

use App\Http\Resources\KandangDetailResource;
use App\Http\Resources\UserDetailResource;
use App\Models\Kandang;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}