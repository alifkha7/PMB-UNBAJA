@extends('admin.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-1">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Prodi</h1>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ $message }}
                        </div>
                    @endif
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
                    <button type="button" class="btn btn-info btn-sm float-sm-right" data-toggle="modal"
                        data-target="#addModal"><i class="fas fa-plus"></i> Tambah Prodi</button>
                    {{-- <h3 class="card-title">Tabel Prodi</h3> --}}
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Nama Prodi</th>
                                <th>Jenjang</th>
                                <th>Fakultas</th>
                                <th style="width: 100px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listProdi as $item)
                                <tr>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->jenjang }}</td>
                                    <td>{{ $item->fakultas }}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-xs" data-toggle="modal"
                                            data-target="#editModal{{ $item->id }}">Edit</button>
                                        <button class="btn btn-danger btn-xs deleteProdi" data-toggle="modal"
                                            data-target="#deleteModal{{ $item->id }}">Hapus</button>
                                    </td>
                                    @include('admin.edit_prodi')
                                    @include('admin.delete_prodi')
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>

            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Prodi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form method="POST" action="{{ route('prodi.store') }}" role="form">
                            @csrf
                            <div class="modal-body">
                                <form class="needs-validation" novalidate>
                                    <div class="form-group">
                                        <label>Nama Prodi</label>
                                        <input type="text" class="form-control" id="inputNama" placeholder="Nama Prodi"
                                            name="nama" required>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Pilih Jenjang</label>
                                                <select class="form-control" name="jenjang">
                                                    <option value="S1">S1</option>
                                                    <option value="D3">D3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label>Pilih Fakultas</label>
                                                <select class="form-control" name="fakultas">
                                                    <option value="Ilmu Komputer">Ilmu Komputer</option>
                                                    <option value="Teknik">Teknik</option>
                                                    <option value="Keguruan dan Ilmu Pendidikan">Keguruan dan Ilmu
                                                        Pendidikan
                                                    </option>
                                                    <option value="Ekonomi dan Bisnis">Ekonomi dan Bisnis</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
