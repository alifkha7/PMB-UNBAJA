@extends('admin.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-1">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Soal</h1>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
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
                    <a href="{{ route('soal.create') }}"><button type="button"
                            class="btn btn-info btn-sm float-sm-right"><i class="fas fa-plus"></i> Tambah
                            Soal</button></a>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th style="width: 50px">Id</th>
                                <th>Soal</th>
                                <th style="width: 100px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listSoal as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ Str::limit($item->soal, 120) }}</td>
                                    <td>
                                        <a href="{{ route('soal.edit', $item->id) }}"><button type="button"
                                                class="btn btn-warning btn-xs">Edit</button></a>
                                        <button class="btn btn-danger btn-xs deleteSoal" data-toggle="modal"
                                            data-target="#deleteModal{{ $item->id }}">Hapus</button>
                                    </td>
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
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Soal</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form method="POST" action="{{ route('soal.store') }}" role="form" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <form class="needs-validation" novalidate>
                                    <div class="form-group">
                                        <label>Soal</label>
                                        <input type="text" style="height: 50px" class="form-control" id="inputSoal"
                                            placeholder="Soal" name="soal" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Opsi 1</label>
                                        <input type="text" class="form-control" id="inputOpsi1" placeholder="Opsi 1"
                                            name="opsi1" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Opsi 2</label>
                                        <input type="text" class="form-control" id="inputOpsi2" placeholder="Opsi 2"
                                            name="opsi2" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Opsi 3</label>
                                        <input type="text" class="form-control" id="inputOpsi1" placeholder="Opsi 3"
                                            name="opsi3" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Opsi 4</label>
                                        <input type="text" class="form-control" id="inputOpsi4" placeholder="Opsi 4"
                                            name="opsi4" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Jawaban</label>
                                        <input type="text" class="form-control" id="jawaban" placeholder="Jawaban"
                                            name="jawaban" required>
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
