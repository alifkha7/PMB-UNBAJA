@extends('admin.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-1">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tambah Soal</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <form method="POST" action="{{ route('soal.store') }}" role="form">
                @csrf
                <div class="mb-3">
                    <label for="inputSoal" class="form-label">Soal</label>
                    <input type="text" class="form-control" id="inputSoal" name="soal">
                </div>
                <div class="mb-3">
                    <label for="inputOpsi1" class="form-label">Opsi 1</label>
                    <input type="text" class="form-control" id="inputOpsi1" name="opsi_1">
                </div>
                <div class="mb-3">
                    <label for="inputOpsi2" class="form-label">Opsi 2</label>
                    <input type="text" class="form-control" id="inputOpsi2" name="opsi_2">
                </div>
                <div class="mb-3">
                    <label for="inputOpsi3" class="form-label">Opsi 3</label>
                    <input type="text" class="form-control" id="inputOpsi3" name="opsi_3">
                </div>
                <div class="mb-3">
                    <label for="inputOpsi4" class="form-label">Opsi 4</label>
                    <input type="text" class="form-control" id="inputOpsi1" name="opsi_4">
                </div>
                <div class="mb-3">
                    <label for="inputOpsi5" class="form-label">Opsi 5</label>
                    <input type="text" class="form-control" id="inputOpsi5" name="opsi_5">
                </div>
                <div class="mb-3">
                    <label for="inputJawaban" class="form-label">Jawaban Opsi</label>
                    <input type="text" class="form-control" id="inputJawaban" width="48" name="jawaban">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </section>

@endsection
