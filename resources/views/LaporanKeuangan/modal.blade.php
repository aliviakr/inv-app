<!-- Modal Filter Data Laporan Keuangan -->
<div class="modal fade" id="filterLaporanKeuangan" tabindex="-1" role="dialog" aria-labelledby="filterLaporanKeuanganLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="filterLaporanKeuanganLabel">Filter Data Laporan Keluar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- <form action="{{ route('laporan-keluar.cetak-pdf') }}" method="GET"> -->
                    <div class="form-group">
                        <label class="form-label" for="tanggal_mulai">Tanggal Mulai</label>
                        <input type="date" class="form-control @error('tanggal_mulai') is-invalid @enderror" id="tanggal_mulai" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}">
                        @error('tanggal_mulai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="tanggal_selesai">Tanggal Selesai</label>
                        <input type="date" class="form-control @error('tanggal_selesai') is-invalid @enderror" id="tanggal_selesai" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}">
                        @error('tanggal_selesai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Filter</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tanggalInput = document.getElementById('tanggal_keluar');

        if (!tanggalInput.value) { // Cek jika belum ada nilai di input
            const today = new Date();
            const yyyy = today.getFullYear();
            const mm = String(today.getMonth() + 1).padStart(2, '0'); // Bulan dimulai dari 0
            const dd = String(today.getDate()).padStart(2, '0'); 
            tanggalInput.value = `${yyyy}-${mm}-${dd}`; // Format YYYY-MM-DD
        }
    });
</script>
