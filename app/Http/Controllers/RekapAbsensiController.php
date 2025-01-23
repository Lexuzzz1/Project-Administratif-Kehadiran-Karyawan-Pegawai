<?php

namespace App\Http\Controllers;

use App\Models\absensi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RekapAbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id = null)
    {
        date_default_timezone_set('Asia/Jakarta');

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        
        $data = $id 
            ? Absensi::where('id_karyawan', $id) 
            : Absensi::query();

        // Filter tanggal
        if ($startDate && $endDate) {
            $data->whereBetween('created_at', [
                date('Y-m-d 00:00:00', strtotime($startDate)),
                date('Y-m-d 23:59:59', strtotime($endDate)),
            ]);
        } elseif ($endDate) {
            $data->where('created_at', '<=', date('Y-m-d 23:59:59', strtotime($endDate)));
        } elseif ($startDate) {
            $data->where('created_at', '>=', date('Y-m-d 00:00:00', strtotime($startDate)));
        }

        $data = $data->get()->sortByDesc('created_at');

        if (!$id) {
            if(!$startDate && !$endDate){
                $statusCounts = $data->filter(function ($item) {
                    $waktuMasuk = Carbon::parse($item->waktu_masuk);
                    return $waktuMasuk->isToday();
                })->groupBy('status')->map(function ($group) {
                    return $group->count();
                });
            }else{
                $statusCounts = $data->groupBy('status')->map(function ($group) {
                    return $group->count();
                });
            }
        }
        else{
            $statusCounts = $data->filter(function ($item) {
                $waktuMasuk = Carbon::parse($item->waktu_masuk);
                return $waktuMasuk->isSameMonth();
            })->groupBy('status')->map(function ($group) {
                return $group->count();
            });
        }
        
        // dd($statusCounts);
        // Ensure the counts are properly initialized
        $hadirCount = $statusCounts->get('Hadir', 0);
        $telatCount = $statusCounts->get('Telat', 0);
        $absenCount = $statusCounts->get('Absen', 0);
        // dd(now());
        $totalEmployees = $hadirCount+$telatCount+$absenCount;
        // dd($totalEmployees, now());

        return view('manajer.rekap', [
            'absensis' => $data,
            // 'rekapKaryawan' => $rekapKaryawan,
            'hadirCount' => $hadirCount,
            'telatCount' => $telatCount,
            'absenCount' => $absenCount,
            'totalEmployees' => $totalEmployees,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function show(absensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function edit(absensi $absensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, absensi $absensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(absensi $absensi)
    {
        //
    }
}
