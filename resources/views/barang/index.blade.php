@extends('templates.layout')
@push('style')
@endpush
@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h1 class="card-title">Barang</h1>
        <br>
        <td>
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary">
                        Launch Primary Modal --}}
                </button>
                {{ session('success') }}
            </div>
            @endif
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formBarangModal">
                <i class="fas fa-plus"></i>
            </button>
            @include('barang.form')
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
                    <th>Nama barang</th>
                    <th>Jenis</th>
                    <th>Kode</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Action</th>
                </tr>
            <tbody>
                @foreach ($barang as $p)
                <tr>
                    <td>{{ $i = isset($i) ? ++$i : 1 }}</td>
                    <td>{{ $p->nama_barang }}</td>
                    <td>{{ $p->jenis }}</td>
                    <td>{{ $p->kode }}</td>
                    <td>{{ $p->stok }}</td>
                    <td>{{ $p->harga }}</td>
                    <td>
                        <form action="barang/{{ $p->id }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-delete" data-dismiss="modal"><i class="fas fa-trash-alt"></i></button>
                        </form>

                        <button class="btn btn-info" data-toggle="modal" data-target="#formBarangModal" data-mode="edit" data-id="{{ $p->id }}" data-nama_barang="{{ $p->nama_barang }}" data-jenis="{{ $p->jenis }}" data-kode="{{ $p->kode }}" data-stok="{{ $p->stok }}" data-harga="{{ $p->harga }}"><i class="fas fa-edit"></i></button>
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
    $('.alert-success').fadeTo(5000, 500).slideUp(500, function() {
        $('.alert-success').slideUp(500)
    })

    $('.alert-danger').fadeTo(10000, 500).slideUp(500, function() {
        $('.alert-danger').slideUp(500)
    })

    console.log('barang')
    // $('#tbl_barang').DataTable()
    // dialog hapus
    $('.btn-delete').on('click', function(e) {
        console.log('delete')
        let nama_barang = $(this).closest('tr').find('td:eq(1)').text();
        Swal.fire({
            icon: 'error',
            title: 'hapus data',
            html: `Hapus <b>${nama_barang}</br> engga?`,
            confirmButtonText: 'Iyah',
            denyButtonText: 'engga',
            showDenyButton: true,
            focusConfirm: false
        }).then((result) => {
            if (result.isConfirmed) $(e.target).closest('form').submit()
            else swal.close()
        })
    })
    $('#formBarangModal').on('show.bs.modal', function(e) {
        const btn = $(e.relatedTarget)
        console.log(btn.data('mode'))
        const mode = btn.data('mode')
        const nama_barang = btn.data('nama_barang')
        const id = btn.data('id')
        const kode = btn.data('kode')
        const stok = btn.data('stok')
        const harga = btn.data('harga')
        const modal = $(this)
        console.log(mode)
        if (mode === 'edit') {
            modal.find('.modal-title').text('Edit Data barang')
            modal.find('#nama_barang').val(nama_barang)
            modal.find('#jenis').val(jenis)
            modal.find('#kode').val(kode)
            modal.find('#stok').val(stok)
            modal.find('#harga').val(harga)
            modal.find('.modal-body form').attr('action', '{{ url("barang") }}/' + id)
            modal.find('#method').html('@method("PATCH")')
        } else {
            modal.find('.modal-title').text('Input Data barang')
            modal.find('#nama_barang').val('')
            modal.find('#jenis').val('')
            modal.find('#kode').val('')
            modal.find('#stok').val('')
            modal.find('#harga').val('')
            modal.find('#method').html('')
            modal.find('.modal-body form').attr('action', '{{ url("barang") }}')
        }
    })
</script>
@endpush