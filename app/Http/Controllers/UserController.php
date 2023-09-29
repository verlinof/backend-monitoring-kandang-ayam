<?php

namespace App\Http\Controllers;

use App\Http\Resources\KandangDetailResource;
use App\Models\Kandang;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\TryCatch;

class UserController extends Controller
{
    //Memperlihatkan semua kandang yang diawasi anak kandang
    public function index()
    {
        try{
            $user = Auth::user();
            
            $kandang = Kandang::where('id_user', $user->id)->get();
            return KandangDetailResource::collection($kandang);
        }catch(Exception $e) {
            return response()->json([
                "error" => $e
            ]);
        }
    }

    //Get semua kandang oleh owner
    public function ownerIndex()
    {
        try{
            $user = Auth::user();
            
            $kandang = Kandang::with('User:id,username')->get();
            return KandangDetailResource::collection($kandang);
        }catch(Exception $e) {
            return response()->json([
                "error" => $e
            ]);
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
     * Display the specified resource.
     */
    public function show(User $user)
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