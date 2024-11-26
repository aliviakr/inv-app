<!-- Modal Edit Data Barang -->
<div class="modal fade" id="editBarang{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editBarangLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBarangLabel">Edit Data Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('barang.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mandatory">
                        <label class="form-label" for="nama_barang">Nama Barang</label>
                        <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" name="nama_barang" value="{{ $item->nama_barang }}">
                        @error('nama_barang')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mandatory">
                        <label class="form-label" for="kategori">Kategori</label>
                        <select class="form-control @error('kategori') is-invalid @enderror" id="kategori" name="kategori">
                            <option value="">Pilih Kategori Barang</option>
                            <!-- <option value="{{ $item->kategori }}">{{ $item->kategori }}</option> -->
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
                        <label class="form-label" for="stok">Stok</label>
                        <input type="text" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok" value="{{ $item->stok }}">
                        @error('stok')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mandatory">
                        <label class="form-label" for="harga_masuk">Harga Masuk</label>
                        <input type="text" class="form-control @error('harga_masuk') is-invalid @enderror" id="harga_masuk" name="harga_masuk" value="{{ $item->harga_masuk }}">
                        @error('harga_masuk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mandatory">
                        <label class="form-label" for="harga_keluar">Harga Keluar</label>
                        <input type="text" class="form-control @error('harga_keluar') is-invalid @enderror" id="harga_keluar" name="harga_keluar" value="{{ $item->harga_keluar }}">
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