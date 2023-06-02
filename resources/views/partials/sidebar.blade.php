<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">
                <img alt="image" src="{{ asset('assets/img/logo.png') }}" class="header-logo" />
                <span class="logo-name">{{ config('app.name') }}</span>
            </a>
        </div>

        <ul class="sidebar-menu">
            <li class="dropdown {{ request()->is('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i data-feather="monitor"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="dropdown {{ request()->is('montir*') ? 'active' : '' }}">
                <a href="{{ route('montir.index') }}" class="nav-link">
                    <i data-feather="users"></i>
                    <span>Manajemen Montir</span>
                </a>
            </li>

            <li class="dropdown {{ request()->is('barang*') ? 'active' : '' }}">
                <a href="{{ route('barang.index') }}" class="nav-link">
                    <i data-feather="dollar-sign"></i>
                    <span>Manajemen Barang</span>
                </a>
            </li>

            <li class="dropdown {{ request()->is('riwayat*') ? 'active' : '' }}">
                <a href="{{ route('riwayat.index') }}" class="nav-link">
                    <i data-feather="list"></i>
                    <span>Riwayat</span>
                </a>
            </li>

            <li class="dropdown {{ request()->is('aprove-barang*') ? 'active' : '' }}">
                <a href="{{ route('view.aprove.barang') }}" class="nav-link">
                    <i data-feather="check"></i>
                    <span>Daftar Pembelian</span>
                </a>
            </li>

            <li class="dropdown {{ request()->is('profil-bengkel') ? 'active' : '' }}">
                <a href="{{ route('profil-bengkel') }}" class="nav-link">
                    <i data-feather="truck"></i>
                    <span>Profil Bengkel</span>
                </a>
            </li>
        </ul>
    </aside>
</div>
