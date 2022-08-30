<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Pembayaran</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">

    <style>
        body {
            background-color: white;
        }
    </style>
</head>

<body>
    <div class="card border-4 card flex-fill align-content-lg-center" style="max-width: 60rem;">
        <table>
            <tr>
                <td width="100px">
                    <img src="{{asset('assets/image/LogoD .png')}}" alt="logo" width="70px" height="70px" class="mr-2">
                </td>
                <td class="text-center">
                    <span>DESA ADAT TEMUKUS, KEC. BANJAR, KAB. BULELENG</span>
                    <br>
                    <span>Jl. Singaraja-Seririt KM.17, Telp: +6285903714007 | Email: temukusdesaadat@gmail.com</span>
                </td>
            </tr>
        </table>
        <hr style="
            border-width: 3px;
            border-color:black;
            margin-left: 0px;
            margin-right: 0px;
            ">
        <div class="card-body">
            <h6 class="text-center mb-5"> KWITANSI PEMBAYARAN </h6>
            <table width="100%" class="mb-4">
                <tr>
                    <td>
                        <span>Nomor Kwitansi &nbsp;</span>
                    </td>
                    <td width="15%">
                        <input type="text" class="form-control w-75" value="{{ $transaksi->no_kwitansi }}" disabled>
                    </td>
                </tr>
            </table>

            <table border="0" width="100%">
                <tr>
                    <td width="50%">
                        <table width="100%">
                            <tr>
                                <td>
                                    <span>NIK</span>
                                </td>
                                <td>
                                    <span>:</span>
                                </td>
                                <td>
                                    <span>{{ $transaksi->dataKrama->nik }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Nama</span>
                                </td>
                                <td>
                                    <span>:</span>
                                </td>
                                <td>
                                    <span>{{ $transaksi->dataKrama->nm }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Status</span>
                                </td>
                                <td>
                                    <span>:</span>
                                </td>
                                <td>
                                    <span>{{ $transaksi->dataKrama->status->status_krama }}</span>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td width="50%">
                        <table width="100%">
                            <tr>
                                <td>
                                    <span>Banjar</span>
                                </td>
                                <td>
                                    <span>:</span>
                                </td>
                                <td>
                                    <span>{{ $transaksi->dataKrama->banjarAdat->nama_banjar_adat }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Tempekan</span>
                                </td>
                                <td>
                                    <span>:</span>
                                </td>
                                <td>
                                    <span>{{ $transaksi->dataKrama->tempekan->nama_tempekan }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Tanggal Transaksi</span>
                                </td>
                                <td>
                                    <span>:</span>
                                </td>
                                <td>
                                    <span>
                                        {{ \Carbon\Carbon::parse($transaksi->tgl_transaksi)->isoFormat('dddd, D MMMM Y') }}
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <table border="1" cellpadding="10" width="100%" class="mt-2">
                <tr>
                    <th>Jenis Pembayaran</th>
                    <th>Periode</th>
                    <th>Nominal</th>
                </tr>
                <tr>
                    @if ($detail_urunan)
                    <td>
                        Urunan
                    </td>
                    <td> {{ $detail_urunan->periode }} </td>
                    <td> {{ rupiah($detail_urunan->nominal) }} </td>
                    @endif
                </tr>
                <tr>
                    @if ($detail_denda)
                    <td>
                        Denda
                    </td>
                    <td> {{ $detail_denda->periode }} </td>
                    <td> {{ rupiah($detail_denda->nominal) }} </td>
                    @endif
                </tr>
                <tr>
                    <td colspan="2" class="text-center">Total</td>
                    <td>{{ rupiah($transaksi->total) }}</td>
                </tr>
            </table>
            <div class="text-right mt-3">
                <h6 class="p-2">Penerima</h6>
                <br><br>
                <h6 class="p-2">{{ $transaksi->dataPrajuru->nama_pegawai }}</h6>
            </div>
        </div>
    </div>
</body>

</html>