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
use App\Models\Population;

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
    public function store(Request $request)
    {
        try{
            $request->validate([
                'nama_kandang' => 'required|max:255',
                'id_user' => 'required|exists:users,id',
                'luas_kandang' => 'required|integer',
                'alamat_kandang' => 'required|max:255',
            ]);

            $kandang = Kandang::create($request->all());

            return new KandangDetailResource($kandang);

        }catch(Exception $e) {
            return response()->json([
                "error" => $e
            ], 400);
        }
    }

    #Menampilkan kandang spesifik
    public function show($id)
    {
        try{
            $kandang = Kandang::findOrFail($id);
            return new KandangDetailResource($kandang->loadMissing('User:id,username'));
        }catch(Exception $e){
            return response()->json([
                "error" => $e
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $request->validate([
                'nama_kandang' => 'required|max:255|',
                'id_user' => 'required|exists:users,id',
                'luas_kandang' => 'required|integer',
                'alamat_kandang' => 'required|max:255',
            ]);

            $kandang = Kandang::findOrFail($id);
            $kandang->update($request->all());

            return new KandangDetailResource($kandang);

        }catch(Exception $e) {
            return response()->json([
                "error" => $e
            ], 404);
        }
    }

    #API untuk menghapus suatu kandang
    public function destroy($id)
    {
        try{
            $kandang = Kandang::findOrFail($id);
            $kandang->delete();

            return response()->json([
                "nama_kandang" => $kandang->nama_kandang,
                "status" => "Kandang Berhasil Dihapus"
            ]);
        }catch(Exception $e){
            return response()->json([
                "error" => $e
            ],404);
        }
    }

    public function kandangPerAnak($id){
        $kandang = Kandang::where("id_user",$id)->get();
        return response()->json([
            'data'=>$kandang
        ]);
    }
}
