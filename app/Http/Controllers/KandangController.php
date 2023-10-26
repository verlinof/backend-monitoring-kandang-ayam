<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Kandang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreKandangRequest;
use App\Http\Requests\UpdateKandangRequest;
use App\Http\Resources\KandangDetailResource;
use App\Models\DataKandang;

class KandangController extends Controller
{

    #Memperlihatkan semua kandang yang diawasi oleh anak kandang yang login
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

    #API untuk membuat sebuah kandang baru(owner)
    public function create(Request $request)
    {
        try{
            $request->validate([
                'nama_kandang' => 'required|max:255',
                'id_user' => 'required|exists:users,id',
                'populasi_awal' => 'integer',
                'alamat_kandang' => 'required',
            ]);

            Kandang::create($request->all());
            return new KandangDetailResource($request);

        }catch(Exception $e) {
            return response()->json([
                "error" => $e
            ], 400);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKandangRequest $request)
    {
        //
    }

    #Menampilkan kandang spesifik
    public function show(Kandang $kandang)
    {
        try{
            $kandang = Kandang::where('id_kandang', $kandang->id)->first();      
            return new KandangDetailResource($kandang->loadMissing('User:id,username'));
        }catch(Exception $e){
            return response()->json([
                "error" => $e
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kandang $kandang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKandangRequest $request, Kandang $kandang)
    {
        //
    }

    #API untuk menghapus suatu kandang
    public function destroy(Kandang $kandang)
    {
        
    }
}