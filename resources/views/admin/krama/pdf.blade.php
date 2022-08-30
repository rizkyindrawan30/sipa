<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Pembayaran</title>
    <style>
        body {
            background-color: white;
        }

        .text-center {
            text-align: center;
        }

        .data {
            font-size: 12px;
        }

        .judul {
            font-size: 14px;
        }

        .garis {
            border: solid;
        }
    </style>
</head>

<body>
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
            border-width: 0.5px;
            border-color:black;
            border: solid;
            margin-left: 0px;
            margin-right: 0px;
            ">
    <br><br><br>
    <table border="1" cellpadding="5" cellspacing="0" class="display" style="width:100%">
        <thead>
            <tr>
                <th class="judul">No</th>
                <th class="judul">NIK</th>
                <th class="judul">No KK</th>
                <th class="judul">Nama</th>
                <th class="judul">Banjar Adat</th>
                <th class="judul">Tempekan</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            @foreach ($kramaPdf as $kramas )
            <tr>
                <td class="data" style="text-align:center;">{{$no}}</td>
                <td class="data">{{$kramas->nik}}</td>
                <td class="data">{{$kramas->no_kk}}</td>
                <td class="data">{{$kramas->nm}}</td>
                <td class="data">{{$kramas->banjarAdat->nama_banjar_adat}}</td>
                <td class="data">{{$kramas->tempekan->nama_tempekan}}</td>
            </tr>
            <?php $no++; ?>
            @endforeach
        </tbody>
    </table>
</body>

</html>