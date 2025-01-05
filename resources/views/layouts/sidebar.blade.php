<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <!-- <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div> -->
        <div class="sidebar-brand-text mx-3">Aliviaku<sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Kategori -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKategori"
            aria-expanded="true" aria-controls="collapseKategori">
            <i class="fas fa-fw fa-box"></i>
            <span>Kategori</span>
        </a>
        <div id="collapseKategori" class="collapse" aria-labelledby="headingKategori"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ Route('kategori.index') }}">Data Kategori</a>
            </div>
        </div>
    </li>
    
    <!-- Inventori -->    
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInventori"
            aria-expanded="true" aria-controls="collapseInventori">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Inventori</span>
        </a>
        <div id="collapseInventori" class="collapse" aria-labelledby="headingInventori"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('barang.index') }}">Data Barang</a>
                <a class="collapse-item" href="{{ route('barang-masuk.index') }}">Barang Masuk</a>
                <a class="collapse-item" href="{{ route('barang-keluar.index') }}">Barang Keluar</a>
            </div>
        </div>
    </li>

    <!-- Laporan -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaporan"
            aria-expanded="true" aria-controls="collapseLaporan">
            <i class="fas fa-fw fa-history"></i>
            <span>Laporan</span>
        </a>
        <div id="collapseLaporan" class="collapse" aria-labelledby="headingLaporan"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('laporan-masuk.index') }}">Laporan Barang Masuk</a>
                <a class="collapse-item" href="{{ route('laporan-keluar.index') }}" >Laporan Barang Keluar</a>
                <a class="collapse-item" href="{{ route('laporan-keuangan.index') }}" >Laporan Keuangan</a>
            </div>
        </div>
    </li>

    <!-- Pengaturan -->
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePengaturan"
            aria-expanded="true" aria-controls="collapsePengaturan">
            <i class="fas fa-fw fa-cogs"></i>
            <span>Setting</span>
        </a>
        <div id="collapsePengaturan" class="collapse" aria-labelledby="headingPengaturan"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="">Data User</a>
            </div>
        </div>
    </li> -->



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>