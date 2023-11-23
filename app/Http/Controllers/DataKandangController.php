<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\DataKandang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateDataKandangRequest;
use App\Http\Resources\DataKandangResource;
use App\Models\Kandang;

class DataKandangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        try{
            $kandang = Kandang::findOrFail($id);
            $dataKandang = DataKandang::where('id_kandang', $id)->get();

            return DataKandangResource::collection($dataKandang);
        }catch(Exception $e) {
            return response()->json([
                "error" => $e
            ],400);
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
    public function store(Request $request)
    {
        try{
            $request->validate([
                "pakan"=> "required|numeric",
                "id_kandang"=> "required|exists:kandangs,id",
                "minum"=> "required|numeric",
                "bobot"=> "required|numeric",
            ]);
            $dataKandang = DataKandang::create($request->all());
            return response()->json([
                'message' => 'Data Kandang created successfully',
                'data' => $dataKandang,
            ], 201);

        }catch(Exception $e) {
            return response()->json([
                "error" => $e
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(DataKandang $dataKandang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataKandang $dataKandang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDataKandangRequest $request, DataKandang $dataKandang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataKandang $dataKandang)
    {
        //
    }
}
