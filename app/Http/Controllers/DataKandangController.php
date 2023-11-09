<?php

namespace App\Http\Controllers;

use App\Models\DataKandang;
use App\Http\Requests\StoreDataKandangRequest;
use App\Http\Requests\UpdateDataKandangRequest;
use App\Http\Resources\DataKandangResource;
use App\Models\Kandang;
use Exception;

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
    public function store(StoreDataKandangRequest $request)
    {
        //
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