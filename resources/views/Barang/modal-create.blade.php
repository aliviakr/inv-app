<!-- Modal Tambah Data Barang -->
<div class="modal fade" id="tambahBarang" tabindex="-1" role="dialog" aria-labelledby="tambahBarangLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahBarangLabel">Tambah Data Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mandatory">
                        <label class="form-label" for="nama_barang">Nama Barang</label>
                        <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" name="nama_barang" value="{{ old('nama_barang') }}">
                        @error('nama_barang')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mandatory">
                        <label class="form-label" for="id_jenis_barang">Kategori</label>
                        <select class="form-control @error('id_jenis_barang') is-invalid @enderror" id="kategori" name="kategori">
                            <option value="">Pilih Kategori</option>
                            <option value="Makanan">Makanan</option>
                            <option value="Minuman">Minuman</option>
                            <option value="Alat Tulis">Alat Tulis</option>
                            <option value="Atribut Seragam">Atribut Seragam</option>
                        </select>
                        @error('kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mandatory">
                        <label class="form-label" for="stok">Stok (pcs)</label>
                        <input type="text" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok" value="{{ old('stok') }}">
                        @error('stok')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mandatory">
                        <label class="form-label" for="harga_masuk">Harga Masuk</label>
                        <input type="text" class="form-control @error('harga_masuk') is-invalid @enderror" id="harga_masuk" name="harga_masuk" value="{{ old('harga_masuk') }}">
                        @error('harga_masuk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mandatory">
                        <label class="form-label" for="harga_keluar">Harga Keluar</label>
                        <input type="text" class="form-control @error('harga_keluar') is-invalid @enderror" id="harga_keluar" name="harga_keluar" value="{{ old('harga_keluar') }}">
                        @error('harga_keluar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

