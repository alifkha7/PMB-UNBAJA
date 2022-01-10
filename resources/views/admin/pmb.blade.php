@extends('admin.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data PMB</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    {{-- <h3 class="card-title">Tabel PMB</h3> --}}

                    <div class="card-tools">
                        <form action="{{ route('search') }}" method="GET">
                            <div class="input-group input-group-sm" style="width: 200px;">
                                <input type="search" name="search" class="form-control float-right" placeholder="Cari Nama">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>No. Daftar</th>
                                <th>Tanggal Daftar</th>
                                <th>Nama Lengkap</th>
                                <th>Prodi</th>
                                <th>Kelas</th>
                                <th>Status Ujian</th>
                                <th style="width: 100px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listPmb as $item)
                                <tr>
                                    <td>{{ $item->no_daftar }}</td>
                                    <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                    <td>{{ $item->nama_lengkap }}</td>
                                    <td>{{ $item->prodi->nama }}</td>
                                    <td>{{ $item->kelas }}</td>
                                    <td><a href="{{ route('pembayaranConfirm', $item->id) }}">
                                            <button type="button"
                                                class="btn btn-block btn-success btn-xs">{{ $item->status_ujian }}</button>
                                        </a></td>
                                    <td>
                                        <button type="button" class="btn btn btn-info btn-xs">Detail</button>
                                        <button type="button" class="btn btn btn-warning btn-xs" data-toggle="modal"
                                            data-target="#editModal">Edit</button>
                                        <button type="button" class="btn btn btn-danger btn-xs">Hapus</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $listPmb->links() }}
                </div>
                <!-- /.card-body -->
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
