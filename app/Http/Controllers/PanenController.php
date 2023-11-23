<?php

namespace App\Http\Controllers;

use App\Http\Resources\DataPanenResource;
use App\Models\Kandang;
use App\Models\Panen;
use App\Http\Requests\StorePanenRequest;
use App\Http\Requests\UpdatePanenRequest;
use Exception;

class PanenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $panen = Panen::with('Kandang:nama_kandang')->get();
            return DataPanenResource::collection($panen);
        }catch(Exception $e) {
            return response()->json([
                "error" => $e
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePanenRequest $request)
    {
        try{
            $validatedData = $request->validate([
                "id_kandang"=> "required|exists:kandangs,id",
                "tanggal_mulai"=> "required|date",
                "jumlah_panen"=> "nullable|numeric",
                "bobot_total"=> "nullable|numeric",
            ]);

                // Membuat panen
                $panen = Panen::create($validatedData);

                // Mendapatkan kandang yang terkait dan menyimpan relasinya
                $kandang = Kandang::find($validatedData['id_kandang']);
                $kandang->panens()->save($panen);

            return response()->json([
                'message' => 'Data Panen successfully entry',
                'data' => $panen,
            ], 201);

        }catch(Exception $e) {
            return response()->json([
                "error" => $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Panen $panen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Panen $panen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePanenRequest $request, Panen $panen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Panen $panen)
    {
        //
    }
}
