@extends('admin.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Pembayaran</h1>
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
                    <h3 class="card-title">Pembayaran Menunggu</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Kode Pembayaran</th>
                                <th>Total Transfer</th>
                                <th>Status</th>
                                <th style="width: 100px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listPembayaran as $item)
                                <tr>
                                    <td>{{ $item->kode_bayar }}</td>
                                    <td>{{ 'Rp. ' . number_format($item->total_transfer) }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        <a href="{{ route('pembayaranConfirm', $item->id) }}">
                                            <button type="button" class="btn btn-block btn-success btn-xs">Validasi</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $listPembayaran->appends(['selesai' => $listPembayaran2->currentPage()])->links() }}
                </div>
                <!-- /.card-body -->
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Pembayaran Selesai</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Kode Pembayaran</th>
                                <th>Total Transfer</th>
                                <th>Status</th>
                                {{-- <th style="width: 100px">Aksi</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listPembayaran2 as $item)
                                <tr>
                                    <td>{{ $item->kode_bayar }}</td>
                                    <td>{{ 'Rp. ' . number_format($item->total_transfer) }}</td>
                                    <td>{{ $item->status }}</td>
                                    {{-- <td>
                                        @if ($item->status == 'SELESAI')
                                            <a href="#">
                                                <button type="button" class="btn btn-block btn-info btn-xs">Detail</button>
                                            </a>
                                        @endif
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $listPembayaran2->appends(['pending' => $listPembayaran->currentPage()])->links() }}
                </div>
                <!-- /.card-body -->
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
