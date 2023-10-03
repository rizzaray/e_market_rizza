@extends('templates.layout')
@push('style')
@endpush
@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h1 class="card-title">Pemasok</h1>
        <br>
        <td>
            @if (session('succes'))
            <div></div>
            {{ session('Success') }}
            </button>
            @endif
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formPemasokModal">
                <i class="fas fa-plus"></i>
            </button>
            @include('pemasok.form')
        </td>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <div class="card-body">

        <table class=" table table-bordered table-hover table-stripped table-sm">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama pemasok</th>
                    <th>Aksi</th>
                </tr>
            <tbody>
                @foreach ($pemasok as $p)
                <tr>
                    <td>{{ $i = isset($i) ? ++$i : 1 }}</td>
                    <td>{{ $p->nama_pemasok }}</td>
                    <td>
                        <form action="pemasok/{{ $p->id }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-delete" data-dismiss="modal"><i class="fas fa-trash-alt"></i></button>
                        </form>

                        <button class="btn btn-info" data-toggle="modal" data-target="#formPemasokModal" data-mode="edit" data-id="{{ $p->id }}" data-nama_pemasok="{{ $p->nama_pemasok }}"><i class="fas fa-edit"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </thead>
        </table>
    </div>

    <!-- /.card-body -->
    <div class="card-footer">
    </div>
    <!-- /.card-footer-->
</div>
<!-- /.card -->
@endsection
@push('script')
<script>
    console.log('pemasok')
    // $('#tbl_pemasok').DataTable()
    // dialog hapus
    $('.btn-delete').on('click', function(e) {
        console.log('delete')
        let nama_pemasok = $(this).closest('tr').find('td:eq(1)').text();
        Swal.fire({
            icon: 'error',
            title: 'hapus data',
            html: `Yakin <b>${nama_pemasok}</br> mau dihapus wir?`,
            confirmButtonText: 'hapus aja wir',
            denyButtonText: 'ga jadi wir',
            showDenyButton: true,
            focusConfirm: false
        }).then((result) => {
            if (result.isConfirmed) $(e.target).closest('form').submit()
            else swal.close()
        })
    })


    $('.alert-success').fadeTo(5000, 500).slideUp(500, function() {
        $('.alert-success').slideUp(500)
    })

    $('.alert-danger').fadeTo(10000, 500).slideUp(500, function() {
        $('.alert-danger').slideUp(500)
    })

    $('#formPemasokModal').on('show.bs.modal', function(e) {
        const btn = $(e.relatedTarget)
        console.log(btn.data('mode'))
        const mode = btn.data('mode')
        const id = btn.data('id')
        const nama_pemasok = btn.data('nama_pemasok')
        const modal = $(this)
        console.log(mode)
        if (mode === 'edit') {
            modal.find('.modal-title').text('Edit Data Pemasok')
            modal.find('#nama_pemasok').val(nama_pemasok)
            modal.find('.modal-body form').attr('action', '{{ url("pemasok") }}/' + id)
            modal.find('#method').html('@method("PATCH")')
        } else {
            modal.find('.modal-title').text('Input Data pemasok')
            modal.find('#nama').val('')
            modal.find('#method').html('')
            modal.find('.modal-body form').attr('action', '{{ url("pemasok") }}')
        }
    })
</script>
@endpush