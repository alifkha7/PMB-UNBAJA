<div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Soal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="{{ route('soal.destroy', $item->id) }}" role="form">
                {{ method_field('delete') }}
                @csrf
                <div class="modal-body">
                    <h4>Anda yakin ingin menghapus data?</h4>
                </div>
                <!-- /.card-body -->

                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tidak,
                        Batal</button>
                    <button type="submit" class="btn btn-danger waves-effect remove-data-from-delete-form">Ya,
                        Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
