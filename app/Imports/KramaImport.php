<?php

namespace App\Imports;

use App\Models\Keterangan;
use App\Models\Krama;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class KramaImport implements ToModel, WithHeadingRow, WithUpserts
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if (!empty($row['password'])) {
            $password = Hash::make($row['password']);
        } else {
            $password = null;
        }

        $kramaImport = new Krama([
            'nik' => $row['nik'], //B
            'level' => $row['level'], //C
            'no_kk' => $row['no_kk'], //D
            'nm' => $row['nama'], //E
            'tmpt' => $row['tempat_lahir'], //F
            'tgl' => Carbon::parse($row['tanggal_lahir']), //G
            'stts_dlm_klrg' => $row['status_keluarga'], //H
            'jbt' => $row['jabatan'], //I
            'bnjr_adt' => $row['banjar_adat'], //J
            'tmpkn' => $row['tempekan'], //K
            'stts' => $row['status'], //L
            'pndd' => $row['pendidikan'], //M
            'pkrjn' => $row['pekerjaan'], //N
            'jk' => $row['jenis_kelamin'], //O
            'ktrgn' => $row['keterangan'], //P
            'ft' => $row['foto'], //Q
            'nm_ddy' => $row['nama_dadya'], //R
            'nm_kt_ddy' => $row['ketua_dadya'], //S
            'password' => $password //T
        ]);

        // dd($kramaImport);

        return $kramaImport;
    }

    public function uniqueBy()
    {
        return 'nik';
    }
}
