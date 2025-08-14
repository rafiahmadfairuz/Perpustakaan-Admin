@php
    $isKelolaActive = request()->routeIs('buku.index') || request()->routeIs('anggota.index');
    $isLogActive = request()->routeIs('log.peminjaman') || request()->routeIs('log.pengembalian');
@endphp

<!-- Sidebar -->
<div class="sidebar" data-background-color="dark2">
    <div class="sidebar-logo">
        <div class="logo-header" data-background-color="dark2">
            <a href="{{ route('dashboard.index') }}" class="logo">
                <img src="{{ asset('assets/img/kaiadmin/logo_light.svg') }}" alt="navbar brand" class="navbar-brand" height="20" />
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

    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">

            <!-- User Profile -->
            <div class="user-box d-flex align-items-center justify-center pt-3 px-3 profile-info">
                <div class="avatar avatar-lg mx-4">
                    <img src="{{ asset('assets/img/jm_denis.jpg') }}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="">
                    <div class="text-white fw-bold">Rafi Ahmad</div>
                    <div class="badge" style="background-color: #6f42c1; color: #fff; margin-top: 4px;">Administrator</div>
                </div>
            </div>
            <!-- End User Profile -->

            <ul class="nav nav-secondary">
                <li class="nav-section" style="background-color: rgba(255, 255, 255, 0.05); padding: 0.02px 0 15px 0">
                    <span class="sidebar-mini-icon text-white">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <div class="text-section text-white mb-0">MAIN NAVIGATION</div>
                </li>

                <li class="nav-item {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.index') }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item {{ $isKelolaActive ? 'active submenu' : '' }}">
                    <a data-bs-toggle="collapse" href="#kelolaData" aria-expanded="{{ $isKelolaActive ? 'true' : 'false' }}">
                        <i class="fas fa-folder"></i>
                        <p>Kelola Data</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ $isKelolaActive ? 'show' : '' }}" id="kelolaData">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->routeIs('buku.index') ? 'active' : '' }}">
                                <a href="{{ route('buku.index') }}"><span class="sub-item">Data Buku</span></a>
                            </li>
                            <li class="{{ request()->routeIs('anggota.index') ? 'active' : '' }}">
                                <a href="{{ route('anggota.index') }}"><span class="sub-item">Data Anggota</span></a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item {{ request()->routeIs('sirkulasi') ? 'active' : '' }}">
                    <a href="{{ route('sirkulasi') }}">
                        <i class="fas fa-sync-alt"></i>
                        <p>Sirkulasi</p>
                    </a>
                </li>

                <li class="nav-item {{ $isLogActive ? 'active submenu' : '' }}">
                    <a data-bs-toggle="collapse" href="#logData" aria-expanded="{{ $isLogActive ? 'true' : 'false' }}">
                        <i class="fas fa-book"></i>
                        <p>Log Data</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ $isLogActive ? 'show' : '' }}" id="logData">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->routeIs('log.peminjaman') ? 'active' : '' }}">
                                <a href="{{ route('log.peminjaman') }}"><span class="sub-item">Log Peminjaman</span></a>
                            </li>
                            <li class="{{ request()->routeIs('log.pengembalian') ? 'active' : '' }}">
                                <a href="{{ route('log.pengembalian') }}"><span class="sub-item">Log Pengembalian</span></a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item {{ request()->routeIs('laporan.sirkulasi') ? 'active' : '' }}">
                    <a href="{{ route('laporan.sirkulasi') }}">
                        <i class="fas fa-print"></i>
                        <p>Laporan Sirkulasi</p>
                    </a>
                </li>

                <li class="nav-section" style="background-color: rgba(255, 255, 255, 0.05); padding: 0.02px 0 15px 0">
                    <span class="sidebar-mini-icon text-white">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <div class="text-section text-white mb-0">SETTING</div>
                </li>

                <li class="nav-item {{ request()->routeIs('pengguna.sistem') ? 'active' : '' }}">
                    <a href="{{ route('pengguna.sistem') }}">
                        <i class="fas fa-users-cog"></i>
                        <p>Pengguna Sistem</p>
                    </a>
                </li>
<li class="nav-item">
    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-out-alt"></i>
        <p>Logout</p>
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</li>


            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
