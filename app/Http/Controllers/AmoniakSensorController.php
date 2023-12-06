<?php

namespace App\Http\Controllers;

use App\Models\AmoniakSensor;
use App\Http\Requests\StoreAmoniakSensorRequest;
use App\Http\Requests\UpdateAmoniakSensorRequest;
use App\Models\RekapDataHarian;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AmoniakSensorController extends Controller
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
    public function store(StoreAmoniakSensorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show( $id_kandang)
    {
        //
        $sensor = AmoniakSensor::find($id_kandang,'id_kandang')->OrderBY('time','desc')->first();
        return response()->json($sensor);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AmoniakSensor $amoniakSensor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAmoniakSensorRequest $request, AmoniakSensor $amoniakSensor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AmoniakSensor $amoniakSensor)
    {
        //
    }

    public function tes() {

        // AmoniakSensor::truncate();

        $date = Carbon::now()->subSecond()->format('Y-m-d H:i:s');
        // dd($date);

        $average =(int)AmoniakSensor::where('time', $date)->avg('amoniak')??0;
        // dd($average);


        // Assuming these values are placeholders; modify accordingly
        $staticSuhu = 10;
        $staticKelembaban = 20;

        $rekap=RekapDataHarian::create([
            'id_kandang' => 1,
            'amoniak' => $average,
            'suhu' => $staticSuhu,
            'kelembaban' => $staticKelembaban,
        ]);
        return response()->json($rekap);
    }
}
