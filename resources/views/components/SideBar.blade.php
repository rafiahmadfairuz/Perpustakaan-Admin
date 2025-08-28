<!-- Sidebar -->
<div class="sidebar" data-background-color="dark2">
    <div class="sidebar-logo">
        <div class="logo-header" data-background-color="dark2">
            <a href="#" class="logo d-flex align-items-center">
                <img src="{{ asset('assets/img/Skarisa.png') }}" alt="Logo Skarisa" height="34" class="me-2">
                <span style="color: white; font-weight: bold; font-size: 20px;">Smk Krian 1</span>
            </a>

            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
    </div>

    <!-- Wrapper pakai flex column -->
    <div class="sidebar-wrapper scrollbar scrollbar-inner d-flex flex-column">
        <!-- Konten Atas -->
        <div class="sidebar-content flex-grow-1">
            <!-- User Profile -->
            <div class="text-center pe-3 py-3 profile-info">
                <!-- Avatar -->
                <div class="mb-2">
                    <img src="{{ asset('assets/img/avatar.png') }}" alt="Profile" class="avatar-img rounded-circle"
                        style="width:120px; height:120px; border:3px solid #fff;">
                </div>

                <!-- Nama & Role -->
                <div class="text-white fw-bold">Rafi Ahmad</div>

                <!-- Tombol Modul -->
                <div class="mt-3">
                    <a href="#" class="btn btn-sm px-5"
                        style="background:none; border:1px solid yellow; color:yellow; font-weight:bold;">
                        LOGOUT
                    </a>
                </div>
            </div>
            <!-- End User Profile -->

            <!-- Menu Navigasi -->
            <ul class="nav nav-secondary">
                <!-- BERANDA -->
                <li class="nav-item my-3 py-2" style="background-color: rgba(255,255,255,0.05); ">
                    <a data-bs-toggle="collapse" href="#menuBeranda" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Beranda</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="menuBeranda">
                        <ul class="nav nav-collapse">
                            <li><a href="#"><span class="sub-item">Home</span></a></li>
                            <li><a href="#"><span class="sub-item">Konfigurasi</span></a></li>
                            <li>
                                <a data-bs-toggle="collapse" href="#submenuKeanggotaan" aria-expanded="false">
                                    <span class="sub-item">Keanggotaan</span>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse" id="submenuKeanggotaan">
                                    <ul class="nav nav-collapse ms-4">
                                        <li><a href="#"><span class="sub-item">Daftar Anggota</span></a></li>
                                        <li><a href="#"><span class="sub-item">Tipe Anggota</span></a></li>
                                        <li><a href="#"><span class="sub-item">Cetak Kartu Anggota</span></a></li>
                                        <li><a href="#"><span class="sub-item">Surat Bebas Perpustakaan</span></a></li>
                                    </ul>
                                    <hr>
                                </div>
                            </li>
                            <li>
                                <a data-bs-toggle="collapse" href="#submenuTabel" aria-expanded="false">
                                    <span class="sub-item">Tabel Data</span>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse" id="submenuTabel">
                                    <ul class="nav nav-collapse ms-4">
                                        <li><a href="#"><span class="sub-item">Hari Libur</span></a></li>
                                        <li><a href="#"><span class="sub-item">Jenis Item (GMD)</span></a></li>
                                        <li><a href="#"><span class="sub-item">Penerbit</span></a></li>
                                        <li><a href="#"><span class="sub-item">Penulis</span></a></li>
                                        <li><a href="#"><span class="sub-item">Supplier</span></a></li>
                                        <li><a href="#"><span class="sub-item">Topik</span></a></li>
                                        <li><a href="#"><span class="sub-item">Lokasi</span></a></li>
                                        <li><a href="#"><span class="sub-item">Rak</span></a></li>
                                        <li><a href="#"><span class="sub-item">Tempat Penerbit</span></a></li>
                                        <li><a href="#"><span class="sub-item">Status Item</span></a></li>
                                        <li><a href="#"><span class="sub-item">Tipe Koleksi</span></a></li>
                                        <li><a href="#"><span class="sub-item">Frekuensi</span></a></li>
                                        <li><a href="#"><span class="sub-item">Bahasa</span></a></li>
                                        <li><a href="#"><span class="sub-item">Tujuan Bebas Perpus</span></a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- SIRKULASI -->
                <li class="nav-item my-3 py-2" style="background-color: rgba(255,255,255,0.05); ">
                    <a data-bs-toggle="collapse" href="#menuSirkulasi" aria-expanded="false">
                        <i class="fas fa-exchange-alt"></i>
                        <p>Sirkulasi</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="menuSirkulasi">
                        <ul class="nav nav-collapse">
                            <li><a href="#"><span class="sub-item">Transaksi</span></a></li>
                            <li><a href="#"><span class="sub-item">Pengembalian</span></a></li>
                            <li><a href="#"><span class="sub-item">Pemesanan</span></a></li>
                            <li><a href="#"><span class="sub-item">Aturan Peminjaman</span></a></li>
                            <li><a href="#"><span class="sub-item">Riwayat Peminjaman</span></a></li>
                            <li><a href="#"><span class="sub-item">Daftar Keterlambatan</span></a></li>
                            <li><a href="#"><span class="sub-item">Stock Opname</span></a></li>
                        </ul>
                    </div>
                </li>

                <!-- KATALOG -->
                <li class="nav-item my-3 py-2" style="background-color: rgba(255,255,255,0.05); ">
                    <a data-bs-toggle="collapse" href="#menuKatalog" aria-expanded="false">
                        <i class="fas fa-book-open"></i>
                        <p>Katalog</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="menuKatalog">
                        <ul class="nav nav-collapse">
                            <li><a href="#"><span class="sub-item">Biblio Grafi</span></a></li>
                            <li><a href="#"><span class="sub-item">Daftar Item</span></a></li>
                            <li><a href="#"><span class="sub-item">Item Keluar</span></a></li>
                            <li><a href="#"><span class="sub-item">Serial Control</span></a></li>
                            <li><a href="#"><span class="sub-item">Cetak Label</span></a></li>
                            <li><a href="#"><span class="sub-item">Cetak Barcode Item</span></a></li>
                            <li><a href="#"><span class="sub-item">Cetak Catalog</span></a></li>
                        </ul>
                    </div>
                </li>

                <!-- PELAPORAN -->
                <li class="nav-item my-3 py-2" style="background-color: rgba(255,255,255,0.05); ">
                    <a data-bs-toggle="collapse" href="#menuPelaporan" aria-expanded="false">
                        <i class="fas fa-chart-pie"></i>
                        <p>Pelaporan</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="menuPelaporan">
                        <ul class="nav nav-collapse">
                            <li><a href="#"><span class="sub-item">Statistik Koleksi</span></a></li>
                            <li><a href="#"><span class="sub-item">Laporan Peminjaman</span></a></li>
                            <li><a href="#"><span class="sub-item">Laporan Keanggotaan</span></a></li>
                            <li><a href="#"><span class="sub-item">Rekapitulasi</span></a></li>
                            <li><a href="#"><span class="sub-item">Daftar Pengunjung</span></a></li>
                            <li><a href="#"><span class="sub-item">Laporan Denda</span></a></li>
                            <li><a href="#"><span class="sub-item">Rekaptulasi Berkala</span></a></li>
                            <li><a href="#"><span class="sub-item">Rekaptulasi Buku</span></a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>

    </div>
</div>
<!-- End Sidebar -->
