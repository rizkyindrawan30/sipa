<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jdl = Kegiatan::paginate(10);
        return response()->json($jdl);
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
        $ValidateData = $request->validate([
            'nm_kgtn'           => 'required|max:100',
            'tmpt'              => 'required|max:100',
            'tgl'               => 'required',
            'jam'               => 'required|max:100',
            'interval'          => 'required|max:100',
            'peserta'           => 'required|max:100',
        ]);
        // dd($ValidateData);
        try {
            $jadwal = Kegiatan::create($ValidateData);
            return response()->json([
                'success'   => true,
                'message'   => 'success',
                'data'      => $jadwal
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_kegiatan)
    {
        $jadwal = Kegiatan::find($id_kegiatan);
        return response()->json($jadwal);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kegiatan)
    {
        $ValidateData = $request->validate([
            'nm_kgtn'           => 'required|max:100',
            'tmpt'              => 'required|max:100',
            'tgl'               => 'required',
            'jam'               => 'required|max:100',
            'interval'          => 'required|max:100',
            'peserta'           => 'required|max:100',
        ]);
        try {
            Kegiatan::where('id_kegiatan', $id_kegiatan)->update($ValidateData);
            return response()->json([
                'success'   => true,
                'message'   => 'success',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error',
                'errors'   => $e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kegiatan)
    {
        try {
            Kegiatan::destroy($id_kegiatan);
            return response()->json([
                'success'   => true,
                'message'   => 'success'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message'  => 'Error',
                'errors'   => $e->getMessage()
            ]);
        }
    }
}
