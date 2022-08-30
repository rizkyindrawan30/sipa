@extends('layouts.main')

@section('header')
<h1>{{ $title }}</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body p-0">

        <!-- <a href="#mymodal" data-remote="{{ route('form.import') }}" data-toggle="modal" data-target="#mymodal" data-title="Detail Transaksi" class="btn btn-primary m-2">
            Import
        </a> -->
        <div class="container mt-4">
            <a href="{{ route('krama.pdf') }}" class="btn btn-success mb-4">PDF Krama</a>
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NIK</th>
                        <th>No KK</th>
                        <th>Nama</th>
                        <th>Banjar Adat</th>
                        <th>Tempekan</th>
                        <th>Detail</th>
                        <th>Aksi <i class="fa fa-exchange-alt" aria-hidden="true"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($krama_desa as $kramas )
                    <tr>
                        <td class="text-center">{{$no}}</td>
                        <td>{{$kramas->nik}}</td>
                        <td>{{$kramas->no_kk}}</td>
                        <td>{{$kramas->nm}}</td>
                        <td>{{$kramas->banjarAdat->nama_banjar_adat}}</td>
                        <td>{{$kramas->tempekan->nama_tempekan}}</td>
                        <td class="text-center">
                            <div class="d-flex d-inline-flex">
                                <a href="{{ route('krama.show', $kramas->id) }}" class="btn btn-info btn-sm mr-2">Diri</a>
                                <a href="{{ route('krama.detail-krama', $kramas->id) }}" class="btn btn-primary btn-sm">Keluarga</a>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="d-flex d-inline-flex">
                                <a href="{{route('krama.edit', $kramas->id)}}" class="btn btn-info btn-sm mr-2">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('krama.destroy', $kramas->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php $no++; ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-footer"></div>

</div>
@endsection

@push('javascript')
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

<script>
    jQuery(document).ready(function($) {
        $('#mymodal').on('show.bs.modal', function(e) {
            var button = $(e.relatedTarget);
            var modal = $(this);
            modal.find('.modal-body').load(button.data("remote"));
            modal.find('.modal-title').html(button.data("title"));
        });
    });
    $('#mymodal').appendTo("body").modal('show');
</script>

<div class="modal" id="mymodal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <i class="fa fa-spinner fa-spin"></i>
            </div>
        </div>
    </div>
</div>
@endpush