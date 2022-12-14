@extends('layouts.main')

@section('header')
<h1>{{ $title }}</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body p-4">
        <div class=" table-responsive">
            <div class="d-flex justify-content-center">
                @if (empty($krama_desa->ft))
                <img src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="img-preview border border-primary mb-3 rounded-circle @error('ft') is-invalid @enderror" width="150" height="150">
                @else
                <img src="{{ asset('storage/' . $krama_desa->ft) }}" class="img-preview border border-primary mb-3 rounded-circle @error('ft') is-invalid @enderror" width="150" height="150">
                @endif
            </div>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                </thead>
                <tbody>
                    <tr>
                        <td>Nomor Induk Kependudukan</td>
                        <td>{{ $krama_desa->nik }}</td>
                    </tr>
                    <tr>
                        <td>Nomor Kartu Keluarga</td>
                        <td>{{ $krama_desa->no_kk }}</td>
                    </tr>
                    <tr>
                        <td>Nama Krama</td>
                        <td>{{ $krama_desa->nm }}</td>
                    </tr>
                    <tr>
                        <td>Tempat & Tanggal Lahir</td>
                        <td>{{ $krama_desa->tmpt }}, {{ $today }}</td>
                    </tr>
                    <tr>
                        <td>Status dalam Keluarga</td>
                        <td>{{ $krama_desa->statusKeluarga->status_dalam_keluarga }}</td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td>{{ $krama_desa->jabatan->jabatan }}</td>
                    </tr>
                    <tr>
                        <td>Banjar Adat</td>
                        <td>{{ $krama_desa->banjarAdat->nama_banjar_adat }}</td>
                    </tr>
                    <tr>
                        <td>Tempekan</td>
                        <td>{{ $krama_desa->tempekan->nama_tempekan }}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>{{ $krama_desa->status->status_krama }}</td>
                    </tr>
                    <tr>
                        <td>Pendidikan</td>
                        <td>{{ $krama_desa->jenispendidikan->nama_pendidikan }}</td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td>
                        <td>{{ $krama_desa->jenispekerjaan->nama_pekerjaan }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>{{ $krama_desa->jenisKelamin->jenis_kelamin }}</td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td>{{ $krama_desa->keterangan->nama_keterangan }}</td>
                    </tr>
                    <tr>
                        <td>Nama Dadya</td>
                        <td>{{ $krama_desa->nmddy->nm_ktd }}</td>
                    </tr>
                    <tr>
                        <td>Nama Ketua Dadya</td>
                        <td>{{ $krama_desa->ketuaDadya->nm_kt }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-body p-4">
            <h3 class="">Data Keluarga</h3>

            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NIK</th>
                        <th>No KK</th>
                        <th>Nama</th>
                        <th>Status dalam Keluarga</th>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>Pekerjaan</th>
                        <th>Pendidikan</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($keluarga as $item )
                    <tr>
                        <td class="text-center">{{$no}}</td>
                        <td>{{$item->nik}}</td>
                        <td>{{$item->no_kk}}</td>
                        <td>{{$item->nm}}</td>
                        <td>{{$item->statusKeluarga->status_dalam_keluarga}}</td>
                        <td>{{$item->tmpt}}, {{\Carbon\Carbon::parse($item->tgl)->isoFormat('D MMMM Y')}}</td>
                        <td>{{$item->banjarAdat->nama_banjar_adat}}</td>
                        <td>{{$item->tempekan->nama_tempekan}}</td>
                        <td>{{$item->keterangan->nama_keterangan}}</td>
                        <td>
                            <a href="{{route('krama.edit', $item->id)}}" class="btn btn-info btn-sm">
                                <i class="fa fa-pen"></i>
                            </a>
                        </td>
                    </tr>
                    <?php $no++; ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('javascript')
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'print',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                'colvis'
            ],
            columnDefs: [{
                visible: false
            }]
        });
    });
</script>
@endpush
@endsection