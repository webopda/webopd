<?php

namespace App\Http\Controllers;

use App\Models\JadwalDokter;
use Illuminate\Http\Request;

class JadwalDokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $dokterId = $request->dokter_id;
        $jadwal   = $request->jadwal;

        foreach ($jadwal as $hari => $jam) {
            if ($jam['jam_mulai'] && $jam['jam_selesai']) {
                JadwalDokter::updateOrCreate(
                    ['dokter_id' => $dokterId, 'hari' => ucfirst($hari)],
                    ['jam_mulai' => $jam['jam_mulai'], 'jam_selesai' => $jam['jam_selesai']]
                );
            }
        }

        return response()->json(['success' => true]);
    }

    public function getJadwal($id)
    {
        $jadwal = JadwalDokter::where('dokter_id', $id)
            ->select('hari', 'jam_mulai', 'jam_selesai')
            ->get()
            ->map(function ($item) {
                return [
                    'hari' => $item->hari,
                    'jam_mulai' => date('H:i', strtotime($item->jam_mulai)),
                    'jam_selesai' => date('H:i', strtotime($item->jam_selesai)),
                ];
            });

        return response()->json($jadwal);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JadwalDokter  $jadwalDokter
     * @return \Illuminate\Http\Response
     */
    public function show(JadwalDokter $jadwalDokter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JadwalDokter  $jadwalDokter
     * @return \Illuminate\Http\Response
     */
    public function edit(JadwalDokter $jadwalDokter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JadwalDokter  $jadwalDokter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JadwalDokter $jadwalDokter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JadwalDokter  $jadwalDokter
     * @return \Illuminate\Http\Response
     */
    public function destroy(JadwalDokter $jadwalDokter)
    {
        //
    }
}
