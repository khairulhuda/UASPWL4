<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/beranda') }}" class="brand-link" align="center">
        <span class="brand-text font-weight-light" >DonasiQu</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- SidebarSearch Form -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

<!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ url('/beranda') }}" class="nav-link">
                        <i class="fas fa-home nav-icon"></i>
                        <p>Beranda</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/about') }}" class="nav-link">
                        <i class="fas fa-question-circle nav-icon"></i>
                        <p>Tentang Donasi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-database nav-icon"></i>
                        <p>
                            Menu Donasi
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-futbol nav-icon"></i>
                                <p>
                                   Donasi
                                <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/lapangan') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Donasi</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('lapanganpdf') }}" class="nav-link" title="klik untuk mendownload data">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ekspor PDF</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-user nav-icon"></i>
                                <p>Penerima Donasi
                                <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/pemilik') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Penerima Donasi</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('pemilikpdf') }}" class="nav-link" title="klik untuk mendownload data">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ekspor PDF</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-users nav-icon"></i>
                                <p>Donatur</p>
                                <i class="fas fa-angle-left right"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/penyewa') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Donatur</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('penyewapdf') }}" class="nav-link" title="klik untuk mendownload data">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ekspor PDF</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>