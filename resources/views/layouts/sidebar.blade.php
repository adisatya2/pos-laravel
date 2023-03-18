<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="{{ asset('/') }}dist/img/Logo Hermina.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Hermina Palembang</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-1">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-collapse-hide-child text-sm"
                data-widget="treeview" role="menu" data-accordion="false">
                {{-- <li class="nav-header">Master</li>
                <li class="nav-item">
                    <a href="{{ route('kategori.index') }}" class="nav-link">
                        <i class="fa-fw fas fa-cube nav-icon"></i>
                        <p>Kategori</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('produk.index') }}" class="nav-link">
                        <i class="fa-fw fab fa-product-hunt nav-icon"></i>
                        <p>Produk</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-fw fas fa-users nav-icon"></i>
                        <p>Member</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-fw fas fa-truck nav-icon"></i>
                        <p>Supplier</p>
                    </a>
                </li>
                <li class="nav-header">Transaksi</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-fw fas fa-money-bill-alt nav-icon"></i>
                        <p>Pengeluaran</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-fw fas fa-download nav-icon"></i>
                        <p>Pembelian</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-fw fas fa-upload nav-icon"></i>
                        <p>Penjualan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-fw fas fa-tachometer-alt nav-icon"></i>
                        <p>Transaksi Lama</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-fw fas fa-tachometer-alt nav-icon"></i>
                        <p>Transaksi Baru</p>
                    </a>
                </li>
                <li class="nav-header">Laporan</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-fw fas fa-file-alt nav-icon"></i>
                        <p>Laporan</p>
                    </a>
                </li> --}}
                <li class="nav-header">MENU</li>
                <li class="nav-item">
                    <a href="{{ url('/') }}"
                        class="nav-link {{ request()->segment(1) == null || request()->segment(1) == 'dashboard' ? 'active' : '' }}">
                        <i class="fa-fw fas fa-tachometer-alt nav-icon"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->segment(1) == 'master' ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->segment(1) == 'master' ? 'active' : '' }}">
                        <i class="fa-fw fas fa-database nav-icon"></i>
                        <p>
                            Data master
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('pasien.index') }}"
                                class="nav-link {{ request()->segment(1) == 'master' && request()->segment(2) == 'pasien' ? 'active' : '' }}">
                                <i class="fa-fw fas fa-users nav-icon"></i>
                                <p>Data Pasien</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dokter.index') }}"
                                class="nav-link {{ request()->segment(1) == 'master' && request()->segment(2) == 'dokter' ? 'active' : '' }}">
                                <i class="fa-fw fas fa-user-md nav-icon"></i>
                                <p>Data Dokter</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('ruangan.index') }}"
                                class="nav-link {{ request()->segment(1) == 'master' && request()->segment(2) == 'ruangan' ? 'active' : '' }}">
                                <i class="fa-fw fas fa-clinic-medical nav-icon"></i>
                                <p>Data Ruangan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('bed.index') }}"
                                class="nav-link {{ request()->segment(1) == 'master' && request()->segment(2) == 'bed' ? 'active' : '' }}">
                                <i class="fa-fw fas fa-bed nav-icon"></i>
                                <p>Data Tempat Tidur</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->segment(1) == 'bedmanagement' ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="fa-fw fas fa-hospital-alt nav-icon"></i>
                        <p>
                            Bed Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('pasiendirawat.index') }}"
                                class="nav-link {{ request()->segment(1) == 'bedmanagement' && request()->segment(2) == 'pasiendirawat' ? 'active' : '' }}">
                                <i class="fa-fw fas fa-procedures nav-icon"></i>
                                <p>Pasien Sedang Dirawat</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa-fw fas fa-hospital-user nav-icon"></i>
                                <p>Pasien Lalu</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-fw fas fa-virus nav-icon"></i>
                        <p>
                            Surveilans
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa-fw fas fa-file-contract nav-icon"></i>
                                <p>Input Data</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa-fw far fa-circle nav-icon"></i>
                                <p>UC</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa-fw far fa-circle nav-icon"></i>
                                <p>IVL</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa-fw far fa-circle nav-icon"></i>
                                <p>VAP</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa-fw far fa-circle nav-icon"></i>
                                <p>HAP</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa-fw far fa-circle nav-icon"></i>
                                <p>ISK</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa-fw far fa-circle nav-icon"></i>
                                <p>IAD</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa-fw far fa-circle nav-icon"></i>
                                <p>IDO</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa-fw far fa-circle nav-icon"></i>
                                <p>Phlebitis</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-fw fas fa-utensils nav-icon"></i>
                        <p>
                            Gizi
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa-fw fas fa-procedures nav-icon"></i>
                                <p>Pasien Sedang Dirawat</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa-fw fas fa-folder-open nav-icon"></i>
                                <p>Log Data</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
