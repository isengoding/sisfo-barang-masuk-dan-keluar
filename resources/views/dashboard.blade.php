@extends('layouts.app')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Home
                    </div>
                    <h2 class="page-title">
                        Dashboard
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">

                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards mb-4">

                <div class="col-12">
                    <div class="row row-cards">
                        <div class="col-sm-6 col-lg-3">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span
                                                class="bg-primary text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->

                                                <i class="ti ti-stack-2 icon"></i>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                132
                                            </div>
                                            <div class="text-secondary">
                                                Produk
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span
                                                class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->

                                                <i class="ti ti-transfer-in icon"></i>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                78
                                            </div>
                                            <div class="text-secondary">
                                                Barang Masuk
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="bg-twitter text-white avatar">
                                                <i class="ti ti-transfer-out icon"></i>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                623
                                            </div>
                                            <div class="text-secondary">
                                                Barang Keluar
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="bg-facebook text-white avatar">
                                                <i class="ti ti-users icon"></i>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                132
                                            </div>
                                            <div class="text-secondary">
                                                Pengguna
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-12">
                    <div class="card card-md">
                        <div class="card-stamp card-stamp-lg">
                            <div class="card-stamp-icon bg-primary">
                                <!-- Download SVG icon from http://tabler-icons.io/i/ghost -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M5 11a7 7 0 0 1 14 0v7a1.78 1.78 0 0 1 -3.1 1.4a1.65 1.65 0 0 0 -2.6 0a1.65 1.65 0 0 1 -2.6 0a1.65 1.65 0 0 0 -2.6 0a1.78 1.78 0 0 1 -3.1 -1.4v-7" />
                                    <path d="M10 10l.01 0" />
                                    <path d="M14 10l.01 0" />
                                    <path d="M10 14a3.5 3.5 0 0 0 4 0" />
                                </svg>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-10">
                                    <h3 class="h1">Welcome, {{ auth()->user()->name }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <div class="row row-cards">
                <div class="col-12 col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Barang Masuk Terakhir</h3>
                        </div>
                        <div class="list-group list-group-flush list-group-hoverable">
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    {{-- <div class="col-auto"><span class="badge bg-red"></span></div>
                                    <div class="col-auto">
                                        <a href="#">
                                            <span class="avatar"
                                                style="background-image: url(./static/avatars/000m.jpg)"></span>
                                        </a>
                                    </div> --}}
                                    <div class="col text-truncate">
                                        <a href="#" class="text-reset text-secondary d-block">#BM-00199293</a>
                                        <div class="d-block  text-truncate">
                                            <i class="ti ti-box-align-bottom text-secondary"></i>
                                            Rexona Deodorant (rex-00399489)
                                        </div>
                                        <div class="d-block  text-truncate"><i class="ti ti-transfer-in text-secondary"></i>
                                            12 Box
                                        </div>
                                        <div class="d-block  text-truncate">
                                            <i class="ti ti-calendar-due text-secondary"></i>
                                            12 Agustus 2024
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#"
                                            class="list-group-item-actions"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-secondary"
                                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path
                                                    d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z">
                                                </path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    {{-- <div class="col-auto"><span class="badge bg-red"></span></div>
                                    <div class="col-auto">
                                        <a href="#">
                                            <span class="avatar"
                                                style="background-image: url(./static/avatars/000m.jpg)"></span>
                                        </a>
                                    </div> --}}
                                    <div class="col text-truncate">
                                        <a href="#" class="text-reset text-secondary d-block">#BM-00199293</a>
                                        <div class="d-block  text-truncate">
                                            <i class="ti ti-box-align-bottom text-secondary"></i>
                                            Rexona Deodorant (rex-00399489)
                                        </div>
                                        <div class="d-block  text-truncate"><i
                                                class="ti ti-transfer-in text-secondary"></i>
                                            12 Box
                                        </div>
                                        <div class="d-block  text-truncate">
                                            <i class="ti ti-calendar-due text-secondary"></i>
                                            12 Agustus 2024
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#"
                                            class="list-group-item-actions"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-secondary"
                                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path
                                                    d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z">
                                                </path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    {{-- <div class="col-auto"><span class="badge bg-red"></span></div>
                                    <div class="col-auto">
                                        <a href="#">
                                            <span class="avatar"
                                                style="background-image: url(./static/avatars/000m.jpg)"></span>
                                        </a>
                                    </div> --}}
                                    <div class="col text-truncate">
                                        <a href="#" class="text-reset text-secondary d-block">#BM-00199293</a>
                                        <div class="d-block  text-truncate">
                                            <i class="ti ti-box-align-bottom text-secondary"></i>
                                            Rexona Deodorant (rex-00399489)
                                        </div>
                                        <div class="d-block  text-truncate"><i
                                                class="ti ti-transfer-in text-secondary"></i>
                                            12 Box
                                        </div>
                                        <div class="d-block  text-truncate">
                                            <i class="ti ti-calendar-due text-secondary"></i>
                                            12 Agustus 2024
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#"
                                            class="list-group-item-actions"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-secondary"
                                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path
                                                    d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z">
                                                </path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Barang Keluar Terakhir</h3>
                        </div>
                        <div class="list-group list-group-flush list-group-hoverable">
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    {{-- <div class="col-auto"><span class="badge bg-red"></span></div>
                                    <div class="col-auto">
                                        <a href="#">
                                            <span class="avatar"
                                                style="background-image: url(./static/avatars/000m.jpg)"></span>
                                        </a>
                                    </div> --}}
                                    <div class="col text-truncate">
                                        <a href="#" class="text-reset text-secondary d-block">#BM-00199293</a>
                                        <div class="d-block  text-truncate">
                                            <i class="ti ti-box-align-bottom text-secondary"></i>
                                            Rexona Deodorant (rex-00399489)
                                        </div>
                                        <div class="d-block  text-truncate"><i
                                                class="ti ti-transfer-out text-secondary"></i>
                                            12 Box
                                        </div>
                                        <div class="d-block  text-truncate">
                                            <i class="ti ti-calendar-due text-secondary"></i>
                                            12 Agustus 2024
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#"
                                            class="list-group-item-actions"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-secondary"
                                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path
                                                    d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z">
                                                </path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    {{-- <div class="col-auto"><span class="badge bg-red"></span></div>
                                    <div class="col-auto">
                                        <a href="#">
                                            <span class="avatar"
                                                style="background-image: url(./static/avatars/000m.jpg)"></span>
                                        </a>
                                    </div> --}}
                                    <div class="col text-truncate">
                                        <a href="#" class="text-reset text-secondary d-block">#BM-00199293</a>
                                        <div class="d-block  text-truncate">
                                            <i class="ti ti-box-align-bottom text-secondary"></i>
                                            Rexona Deodorant (rex-00399489)
                                        </div>
                                        <div class="d-block  text-truncate"><i
                                                class="ti ti-transfer-in text-secondary"></i>
                                            12 Box
                                        </div>
                                        <div class="d-block  text-truncate">
                                            <i class="ti ti-calendar-due text-secondary"></i>
                                            12 Agustus 2024
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#"
                                            class="list-group-item-actions"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-secondary"
                                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path
                                                    d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z">
                                                </path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    {{-- <div class="col-auto"><span class="badge bg-red"></span></div>
                                    <div class="col-auto">
                                        <a href="#">
                                            <span class="avatar"
                                                style="background-image: url(./static/avatars/000m.jpg)"></span>
                                        </a>
                                    </div> --}}
                                    <div class="col text-truncate">
                                        <a href="#" class="text-reset text-secondary d-block">#BM-00199293</a>
                                        <div class="d-block  text-truncate">
                                            <i class="ti ti-box-align-bottom text-secondary"></i>
                                            Rexona Deodorant (rex-00399489)
                                        </div>
                                        <div class="d-block  text-truncate"><i
                                                class="ti ti-transfer-in text-secondary"></i>
                                            12 Box
                                        </div>
                                        <div class="d-block  text-truncate">
                                            <i class="ti ti-calendar-due text-secondary"></i>
                                            12 Agustus 2024
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#"
                                            class="list-group-item-actions"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-secondary"
                                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path
                                                    d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z">
                                                </path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Stok Info</h3>
                        </div>
                        <div class="list-group list-group-flush">
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <i class="ti ti-info-circle icon text-warning"></i>
                                    </div>

                                    <div class="col text-truncate">
                                        <a href="#" class="text-reset text-secondary d-block">Rexona Deodorant
                                            (rex-00399489)</a>

                                        <div class="d-block  text-truncate">
                                            Sisa Stok : 5
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <i class="ti ti-alert-triangle icon text-danger"></i>
                                    </div>

                                    <div class="col text-truncate">
                                        <a href="#" class="text-reset text-secondary text-truncate">Rexona
                                            Deodorant
                                            (rex-0039948922222222222)</a>

                                        <div class="d-block  text-truncate">
                                            Sisa Stok : 0
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
