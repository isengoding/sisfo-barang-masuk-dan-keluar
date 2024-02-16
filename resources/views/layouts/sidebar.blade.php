<aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"
            aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark">
            <a href=".">
                <img src="./static/logo.svg" width="110" height="32" alt="Tabler" class="navbar-brand-image">
            </a>
        </h1>
        <div class="navbar-nav flex-row d-lg-none">
            <div class="nav-item d-none d-lg-flex me-3">
                <div class="btn-list">
                    <a href="https://github.com/tabler/tabler" class="btn" target="_blank" rel="noreferrer">
                        <!-- Download SVG icon from http://tabler-icons.io/i/brand-github -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5" />
                        </svg>
                        Source code
                    </a>
                    <a href="https://github.com/sponsors/codecalm" class="btn" target="_blank" rel="noreferrer">
                        <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon text-pink" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                        </svg>
                        Sponsor
                    </a>
                </div>
            </div>
            <div class="d-flex d-lg-none">
                <a href="?theme=dark" class="nav-link px-3 hide-theme-dark" title="Enable dark mode"
                    data-bs-toggle="tooltip" data-bs-placement="bottom">
                    <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                    </svg>
                </a>
                <a href="?theme=light" class="nav-link px-3 hide-theme-light" title="Enable light mode"
                    data-bs-toggle="tooltip" data-bs-placement="bottom">
                    <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                        <path
                            d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                    </svg>
                </a>

            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                    aria-label="Open user menu">
                    <span class="avatar avatar-sm" style="background-image: url(./static/avatars/000m.jpg)"></span>
                    <div class="d-none d-xl-block ps-2">
                        <div>{{ auth()->user()->name }}</div>
                        <div class="mt-1 small text-secondary">{{ auth()->user()->email }}</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href="./profile.html" class="dropdown-item">Profile</a>
                    <a href="./settings.html" class="dropdown-item">Settings</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="#" class="dropdown-item"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="sidebar-menu">
            <ul class="navbar-nav pt-lg-3">
                <li class="nav-item @if (request()->routeIs('dashboard')) active @endif">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="ti ti-home icon"></i>
                        </span>
                        <span class="nav-link-title">
                            Home
                        </span>
                    </a>
                </li>
                <span class="ms-3 text-secondary mt-3 mb-1">Master Data</span>
                <li class="nav-item @if (request()->routeIs('satuans.*')) active @endif">
                    <a class="nav-link" href="{{ route('satuans.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="ti ti-box-padding icon"></i>
                        </span>
                        <span class="nav-link-title">
                            Satuan
                        </span>
                    </a>
                </li>
                <li class="nav-item @if (request()->routeIs('kategori.*')) active @endif">
                    <a class="nav-link" href="{{ route('kategori.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="ti ti-category-2 icon"></i>
                        </span>
                        <span class="nav-link-title">
                            Kategori
                        </span>
                    </a>
                </li>
                <li class="nav-item @if (request()->routeIs('barang.index')) active @endif">
                    <a class="nav-link" href="{{ route('barang.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="ti ti-notebook icon"></i>
                        </span>
                        <span class="nav-link-title">
                            Barang
                        </span>
                    </a>
                </li>
                <span class="ms-3 text-secondary mt-3 mb-1">Kontak</span>
                <li class="nav-item @if (request()->routeIs('pelanggan.*')) active @endif">
                    <a class="nav-link" href="{{ route('pelanggan.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="ti ti-address-book icon"></i>
                        </span>
                        <span class="nav-link-title">
                            Pelanggan
                        </span>
                    </a>
                </li>
                <li class="nav-item @if (request()->routeIs('pemasok.*')) active @endif">
                    <a class="nav-link" href="{{ route('pemasok.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="ti ti-phone-call icon"></i>
                        </span>
                        <span class="nav-link-title">
                            Pemasok
                        </span>
                    </a>
                </li>
                <span class="ms-3 text-secondary mt-3 mb-1">Transaksi</span>
                <li class="nav-item @if (request()->routeIs('barang-masuk.index') ||
                        request()->routeIs('barang-masuk.create') ||
                        request()->routeIs('barang-masuk.edit') ||
                        request()->routeIs('barang-masuk.show')) active @endif">
                    <a class="nav-link" href="{{ route('barang-masuk.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="ti ti-transfer-in icon"></i>
                        </span>
                        <span class="nav-link-title">
                            Barang Masuk
                        </span>
                    </a>
                </li>
                <li class="nav-item @if (request()->routeIs('barang-keluar.*')) active @endif">
                    <a class="nav-link" href="{{ route('barang-keluar.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="ti ti-transfer-out icon"></i>
                        </span>
                        <span class="nav-link-title">
                            Barang Keluar
                        </span>
                    </a>
                </li>
                <span class="ms-3 text-secondary mt-3 mb-1">Laporan</span>
                <li class="nav-item @if (request()->routeIs('barang-masuk.laporan')) active @endif">
                    <a class="nav-link" href="{{ route('barang-masuk.laporan') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="ti ti-report-analytics icon"></i>
                        </span>
                        <span class="nav-link-title">
                            Barang Masuk
                        </span>
                    </a>
                </li>
                <li class="nav-item @if (request()->routeIs('barang-keluar.laporan')) active @endif">
                    <a class="nav-link" href="{{ route('barang-keluar.laporan') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="ti ti-transfer-out icon"></i>
                        </span>
                        <span class="nav-link-title">
                            Barang Keluar
                        </span>
                    </a>
                </li>
                <li class="nav-item @if (request()->routeIs('barang.stok')) active @endif">
                    <a class="nav-link" href="{{ route('barang.stok') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="ti ti-transfer-out icon"></i>
                        </span>
                        <span class="nav-link-title">
                            Stok Barang
                        </span>
                    </a>
                </li>

                {{-- <li class="nav-item active dropdown">
                    <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown"
                        data-bs-auto-close="false" role="button" aria-expanded="false">
                        <span
                            class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/lifebuoy -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                <path d="M15 15l3.35 3.35" />
                                <path d="M9 15l-3.35 3.35" />
                                <path d="M5.65 5.65l3.35 3.35" />
                                <path d="M18.35 5.65l-3.35 3.35" />
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            Help
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="https://tabler.io/docs" target="_blank" rel="noopener">
                            Documentation
                        </a>
                        <a class="dropdown-item" href="./changelog.html">
                            Changelog
                        </a>
                        <a class="dropdown-item" href="https://github.com/tabler/tabler" target="_blank"
                            rel="noopener">
                            Source code
                        </a>
                        <a class="dropdown-item text-pink" href="https://github.com/sponsors/codecalm"
                            target="_blank" rel="noopener">
                            <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline me-1" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                            </svg>
                            Sponsor project!
                        </a>
                    </div>
                </li> --}}
            </ul>
        </div>
    </div>
</aside>
