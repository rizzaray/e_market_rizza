<div class="modal fade" id="formBarangModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- <p>One fine body&hellip;</p> --}}
                <form method="post" action="barang">
                    @csrf
                    <div id="method"></div>
                    <div class="method"></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_barang">Nama barang</label>
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang">
                        </div>
                        <div class="form-group">
                            <label for="nama_barang">Jenis</label>
                            <select class="form-control" id="jenis" name="jenis">
                                <option value="makanan">Makanan</option>
                                <option value="minuman">Minuman</option>
                                <option value="elektronik">Elektronik</option>
                                <option value="olah raga">Olahraga</option>
                                <option value="barang">Barang</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama_barang">Kode</label>
                            <input type="text" class="form-control" id="kode" name="kode" placeholder="Kode">
                        </div>
                        <div class="form-group">
                            <label for="nama_barang">Stok</label>
                            <input type="text" class="form-control" id="stok" name="stok" placeholder="Stok">
                        </div>
                        <div class="form-group">
                            <label for="nama_barang">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga">
                        </div>
                    </div>

                    <!-- /.card-body -->

                    <div class="card-footer">
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">TUTUP</button>
                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>