@empty($stok)
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kesalahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">
                    <h5><i class="icon fas fa-ban"></i>Kesalahan!!!</h5>
                    Data yang Anda cari tidak ditemukan.
                </div>
                <a href="{{ url('/stok') }}" class="btn btn-warning">Kembali</a>
            </div>
        </div>
    </div>
@else
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Data Stok</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info">
                    <h5><i class="icon fas fa-info"></i> Data Stok</h5>
                    Berikut adalah detail dari data stok
                </div>
                <table class="table table-sm table-bordered table-striped">
                    <tr>
                        <th class="text-right col-4">Supplier Stok :</th>
                        <td class="col-8">{{ $stok->supplier->supplier_nama }}</td>
                    </tr>
                    <tr>
                        <th class="text-right col-4">Nama Barang :</th>
                        <td class="col-8">{{ $stok->barang->barang_nama }}</td>
                    </tr>
                    <tr>
                        <th class="text-right col-4">Pengguna Stok Barang :</th>
                        <td class="col-8">{{ $stok->user->nama }}</td>
                    </tr>
                    <tr>
                        <th class="text-right col-4">Waktu Stok :</th>
                        <td class="col-8">{{ $stok->stok_tanggal }}</td>
                    </tr>
                    <tr>
                        <th class="text-right col-4">Jumlah Stok :</th>
                        <td class="col-8">{{ $stok->stok_jumlah }}</td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-warning">Tutup</button>
            </div>
        </div>
    </div>
@endempty