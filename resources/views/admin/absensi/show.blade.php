@extends('layouts.main')

@section('header')
<h1>{{ $title }}</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body p-4">
        <div class="table-responsive">
            <table width="40%">
                <tr>
                    <th>Nama Kegiatan</th>
                    <td>:</td>
                    <td>{{ $absen->dataKegiatan->nm_kgtn }}</td>
                </tr>
                <tr>
                    <th>Waktu</th>
                    <td>:</td>
                    <td>{{ $absen->dataKegiatan->jam }}</td>
                </tr>
                <tr>
                    <th>Tanggal Kegiatan</th>
                    <td>:</td>
                    <td>{{ \Carbon\Carbon::parse($absen->dataKegiatan->tgl)->isoFormat('dddd, D MMMM Y') }}</td>
                </tr>
            </table>
        </div>
        <div class="table-responsive mt-4">
            <table class="table table-bordered">
                <tr class="thead-light text-center">
                    <th>Nama</th>
                    <th>Kehadiran</th>
                </tr>
                @if (Auth::guard('prajuru')->user()->level == "prajuru")

                @foreach ($krama as $item)
                <tr>
                    <td>{{$item->dataKrama->nm}}</td>
                    <td>{{$item->kehadiran}}</td>
                </tr>
                @endforeach

                @elseif (Auth::guard('prajuru')->user()->level == "kelian_tempekan")

                @foreach ($krama as $item)
                @if ($item->dataKrama->tmpkn == Auth::guard('prajuru')->user()->tempekan_id)
                <tr>
                    <td>{{$item->dataKrama->nm}}</td>
                    <td>{{$item->kehadiran}}</td>
                </tr>
                @endif
                @endforeach

                @endif
            </table>
        </div>
    </div>
</div>
@endsection