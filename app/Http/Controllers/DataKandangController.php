<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\DataKandang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateDataKandangRequest;
use App\Http\Resources\DataKandangResource;
use App\Models\AmoniakSensor;
use App\Models\Kandang;
use App\Models\SuhuKelembabanSensor;
use Carbon\Carbon;

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

    public function test() {
        $currentDateTime = Carbon::now();

        // Set the time to 15:59:59 (3:59 PM) of the current day
        $todayEndTime = Carbon::tomorrow()->setTime(15, 59, 59);

        // Check if the current time is before 4:00 PM today
        if ($currentDateTime->lessThan($todayEndTime)) {
            // If current time is before 4:00 PM, set the end time to yesterday 3:59 PM
            $todayEndTime = Carbon::yesterday()->setTime(23, 59, 59);
        }

        // Set the start time to yesterday at 4:00 PM
        $yesterdayStartTime = Carbon::yesterday()->setTime(16, 0, 0);
        $formattedYesterdayStartTime = $yesterdayStartTime->format('Y-m-d H:i:s');
        $formattedTodayEndTime = $todayEndTime->format('Y-m-d H:i:s');

        // Fetch records within the specified range
        $dataKandangRange = DataKandang::whereBetween('date', [$formattedYesterdayStartTime, $formattedTodayEndTime])->get();

        dd($dataKandangRange);
    }
}
