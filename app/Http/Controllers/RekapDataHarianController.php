<?php

namespace App\Http\Controllers;

use App\Models\RekapDataHarian;
use App\Http\Requests\StoreRekapDataHarianRequest;
use App\Http\Requests\UpdateRekapDataHarianRequest;
use App\Http\Resources\RekapDataHarianResource;
use Exception;

class RekapDataHarianController extends Controller
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
    public function store($id_kandang)
    {
        //

    }

    /**
     * Display the specified resource.
     */
    public function show($id_kandang)
    {
        //
        try{
            $rekap = RekapDataHarian::where('id_kandang', $id_kandang)->orderBy('date', 'DESC')->first();

            // $rekap = RekapDataHarian::where('id_kandang',$id_kandang)->OrderBy('time','DESC')->first;

            return new RekapDataHarianResource($rekap);
        }catch(Exception $e) {
            return response()->json([
                "error" => $e
            ],400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RekapDataHarian $rekapDataHarian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRekapDataHarianRequest $request, RekapDataHarian $rekapDataHarian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RekapDataHarian $rekapDataHarian)
    {
        //
    }
}
