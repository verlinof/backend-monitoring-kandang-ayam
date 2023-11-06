<?php

namespace App\Http\Controllers;

use App\Models\DataKematian;
use App\Http\Requests\StoreDataKematianRequest;
use App\Http\Requests\UpdateDataKematianRequest;
use Exception;
use Illuminate\Http\Request;

class DataKematianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
        try{
            $request->validate([
                'jam' => 'required|integer',
                'jumlah_kematian' => 'required|integer',
            ]);

            $dataKandang = DataKematian::create($request->all());
            return response()->json([
                'message' => 'Data Kematian created successfully',
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
    public function show(DataKematian $dataKematian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataKematian $dataKematian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDataKematianRequest $request, DataKematian $dataKematian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataKematian $dataKematian)
    {
        //
    }
}
