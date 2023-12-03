<?php

namespace App\Http\Controllers;

use App\Http\Resources\RekapDataResource;
use App\Models\RekapData;
use App\Http\Requests\StoreRekapDataRequest;
use App\Http\Requests\UpdateRekapDataRequest;
use App\Models\DataKandang;
use App\Models\DataKematian;
use App\Models\Population;
use App\Models\RekapDataHarian;
use Carbon\Carbon;

class RekapDataController extends Controller
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
    public function store(StoreRekapDataRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show( $id_kandang)
    {
        //
        // dd($id_kandang);
        $currentDateTime = Carbon::now();

        // Set the time to 15:59:59 (3:59 PM) of the current day
        $todayEndTime = Carbon::today()->setTime(23, 59, 59);

        // Check if the current time is before 4:00 PM today
        // if ($currentDateTime->lessThan($todayEndTime)) {
        //     // If current time is before 4:00 PM, set the end time to yesterday 3:59 PM
        //     $todayEndTime = Carbon::yesterday();
        //     // ->setTime(15, 59, 59);
        // }

        // Set the start time to yesterday at 4:00 PM
        $yesterdayStartTime = Carbon::yesterday()->setTime(0, 0, 0);
        $formattedYesterdayStartTime = $yesterdayStartTime->format('Y-m-d H:i:s');
        $formattedTodayEndTime = $todayEndTime->format('Y-m-d H:i:s');

        // Fetch records within the specified range
        $dataKandang = DataKandang::where('id_kandang',$id_kandang)
        ->whereBetween('date', [$formattedYesterdayStartTime, $formattedTodayEndTime])->orderBy('date','DESC')->first();

        $population=Population::where('id_kandang',$id_kandang)->first();
        $dataKematianRange=DataKematian::where('id_population',$population->id)
        ->whereBetween('date',[$formattedYesterdayStartTime, $formattedTodayEndTime])
        ->get();

        $RekapDataHarian=RekapDataHarian::where('id_kandang')
        ->whereBetween('date',[$formattedYesterdayStartTime, $formattedTodayEndTime])
        ->get();

        $totalKematian=$dataKematianRange->sum('kematian');
        // dd($totalKematian);
        $avg_amoniak=$RekapDataHarian->sum('amoniak')??0;
        $avg_suhu=$RekapDataHarian->sum('suhu')??0;
        $avg_kelembaban=$RekapDataHarian->sum('kelembaban')??0;
        // dd($avg_amoniak);
        $RekapData=RekapData::create([
            'id_kandang'=>$id_kandang,
            'avg_amoniak'=>$avg_amoniak,
            'avg_suhu'=>$avg_suhu,
            'avg_kelembaban'=>$avg_kelembaban,
            'pakan'=>$dataKandang->pakan,
            'minum'=>$dataKandang->minum,
            'jumlah_kematian'=>(int)$totalKematian,
        ]);
        return new RekapDataResource($RekapData);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RekapData $rekapData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRekapDataRequest $request, RekapData $rekapData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RekapData $rekapData)
    {
        //
    }
}
