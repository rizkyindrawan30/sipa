<?php

namespace App\Exports;

use App\Models\Krama;
use Maatwebsite\Excel\Concerns\FromCollection;

class KramaExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Krama::all();
    }
}
