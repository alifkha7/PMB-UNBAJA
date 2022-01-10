<div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Prodi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="{{ route('prodi.update', $item->id) }}" role="form">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <form class="needs-validation" novalidate>
                        <div class="form-group">
                            <label>Nama Prodi</label>
                            <input type="text" class="form-control" id="nama" placeholder="Nama Prodi" name="nama"
                                value="{{ $item->nama }}" required>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Pilih Jenjang</label>
                                    <select class="form-control" name="jenjang" id="jenjang">
                                        <option value="S1" @if (old('jenjang', $item->jenjang) === 'S1') selected @endif>S1</option>
                                        <option value="D3" @if (old('jenjang', $item->jenjang) === 'D3') selected @endif>D3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label>Pilih Fakultas</label>
                                    <select class="form-control" name="fakultas" id="fakultas">
                                        <option value="Ilmu Komputer" @if (old('fakultas', $item->fakultas) === 'Ilmu Komputer') selected @endif>Ilmu Komputer</option>
                                        <option value="Teknik" @if (old('fakultas', $item->fakultas) === 'Teknik') selected @endif>Teknik</option>
                                        <option value="Keguruan dan Ilmu Pendidikan" @if (old('fakultas', $item->fakultas) === 'Keguruan dan Ilmu Pendidikan') selected @endif>Keguruan dan Ilmu
                                            Pendidikan</option>
                                        <option value="Ekonomi dan Bisnis" @if (old('fakultas', $item->fakultas) === 'Ekonomi dan Bisnis') selected @endif>Ekonomi dan Bisnis
                                        </option>
                                        {{-- <option value="Ilmu Komputer">Ilmu Komputer</option>
                                                        <option value="Teknik">Teknik</option>
                                                        <option value="Keguruan & Ilmu Pendidikan">Keguruan & Ilmu
                                                            Pendidikan
                                                        </option>
                                                        <option value="Ekonomi & Bisnis">Ekonomi & Bisnis</option> --}}
                                    </select>
                                </div>
                            </div>
                        </div>
                </div>
                <!-- /.card-body -->

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
