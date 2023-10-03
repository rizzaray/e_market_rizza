<div class="modal fade" id="tblPembelianModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Barang</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id='tblBarang2' class="table table-stripped table-compact">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>Nama Barang</th>
                            <th>Jenis</th>
                            <th>Kode</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barang as $b)
                        <tr>
                            <td>{{ $i = (!isset($i)?1:++$i)}} </td>
                            <td> {{ $b->nama_barang }}</td>
                            <td> {{ $b->jenis }}</td>
                            <td> {{ $b->kode }}</td>
                            <td> {{ $b->stok }}</td>
                            <td> {{ $b->harga }}</td>
                            <td><button class="pilihPembelianBtn">Pilih</button></td>
                        </tr>
                        @endforeach
                    <tbody>
                </table>
            </div>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>