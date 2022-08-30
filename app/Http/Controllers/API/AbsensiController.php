<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\Krama;
use App\Models\Presensi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function GuzzleHttp\Promise\all;

class AbsensiController extends Controller
{
    public function dataAbsen()
    {
        $absen = Presensi::all();
        return response()->json($absen);
    }

    public function tambahAbsen(Request $request)
    {
        $request->validate([
            'krama_id'              => 'required',
            'id_kegiatan'           => 'required',
            'tgl_absen'             => '',
        ]);

        for ($i = 0; $i < count($request->id_kegiatan); $i++) {
            $absen = new Presensi();
            $absen->kehadiran = $request->kehadiran[$i];
            $absen->krama_id = $request->krama_id[$i];
            $absen->id_kegiatan = $request->id_kegiatan[$i];
            $absen->tgl_absen = $request->tgl_absen[$i];
            $absen->save();
        }
        return response()->json([
            'success'   => true,
            'massage'   => 'success',
            'data'      => $absen
        ]);
    }
}
