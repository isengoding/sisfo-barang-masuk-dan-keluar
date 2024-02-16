@extends('layouts.app')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none ">
        <div class="container-xl ">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Laporan
                    </div>
                    <h2 class="page-title">
                        Stok Barang
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="#" class="btn btn-secondary d-none d-sm-inline-block" data-bs-toggle="modal"
                            data-bs-target="#modal-report">
                            <i class="ti ti-filter icon"></i>
                            Filter
                        </a>
                        <a href="{{ route('barang.stok.pdf', [
                            'from_date' => request()->query('from_date'),
                            'to_date' => request()->query('to_date'),
                        ]) }}"
                            target="_blank" class="btn btn-primary d-none d-sm-inline-block">
                            <i class="ti ti-file-export icon"></i>
                            PDF
                        </a>
                        <a href="{{ route('barang.stok.excel', [
                            'from_date' => request()->query('from_date'),
                            'to_date' => request()->query('to_date'),
                        ]) }}"
                            target="_blank" class="btn btn-primary d-none d-sm-inline-block">
                            <i class="ti ti-table-export icon"></i>
                            Excel
                        </a>
                        <a href="{{ route('barang.stok.excel') }}" class="btn btn-primary d-sm-none btn-icon"
                            data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">

            <!-- Alert -->
            <x-alert-success />
            <x-alert-error />

            <div class="row">
                <div class="col-12 col-lg-4">
                    <form action="" method="get">
                        <div class="input-icon mb-3">
                            <input type="search" value="{{ request()->query('keyword') }}" class="form-control w-100"
                                name="keyword" placeholder="Search…">
                            <span class="input-icon-addon">
                                <i class="icon ti ti-search"></i>
                            </span>
                        </div>
                    </form>
                    @if (request()->query('from_date'))
                        <div class="mb-3">
                            Filters
                            <span class="badge bg-cyan text-cyan-fg">Dari Tgl {{ request()->query('from_date') }}</span>
                            <span class="badge bg-cyan text-cyan-fg">Sampai {{ request()->query('to_date') }}</span>
                            <a class="ms-2 text-reset text-secondary" href="{{ route('barang-keluar.laporan') }}">Reset</a>
                        </div>
                    @endif

                </div>
            </div>
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            {{-- Total : {{ $barangKeluarDetails->count() }} --}}
                        </div>
                        <div class="table-responsive">
                            <table class="table table-vcenter table-mobile-md card-table">
                                <thead>
                                    <tr>
                                        <th class="w-1">No</th>
                                        <th>Barang</th>
                                        <th class="text-center">Stok</th>
                                        <th class="text-center">Masuk</th>
                                        <th class="text-center">Keluar</th>


                                        {{-- <th class="w-1"></th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($barangs as $row)
                                        <tr>
                                            <td class="text-secondary align-text-top" data-label="No">
                                                {{ $loop->iteration }}
                                            </td>

                                            <td data-label="Barang">
                                                <div class="d-flex align-items-top">
                                                    <a data-fslightbox="gallery"
                                                        href="{{ asset('storage/' . $row->gambar) }}">
                                                        <span class="avatar me-2"
                                                            style="background-image: url({{ asset('storage/' . $row->gambar) }})"></span>

                                                    </a>
                                                    <div class="flex-fill">
                                                        <div class="font-weight-medium">{{ $row->nama_barang }}
                                                        </div>
                                                        <div class="text-secondary"><a href="#"
                                                                class="text-reset">{{ $row->kode }}</a></div>
                                                    </div>
                                                </div>
                                            </td>


                                            <td class="align-text-top text-start text-lg-center" data-label="Stok">
                                                {{ $row->stok }}
                                            </td>
                                            <td class="align-text-top text-start text-lg-center" data-label="Stok">
                                                {{ $row->totalBarangMasuk }}
                                            </td>

                                            <td class="align-text-top text-start text-lg-center" data-label="Stok">
                                                {{ $row->totalBarangKeluar }}
                                            </td>






                                        </tr>

                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">
                                                No data found.
                                            </td>
                                        </tr>
                                    @endforelse


                                </tbody>
                            </table>
                        </div>


                        {{-- <div class="card-footer d-flex justify-content-center align-items-center">
                            test
                        </div> --}}
                    </div>
                </div>


            </div>
        </div>
    </div>

    <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Filter</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="get">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Dari Tanggal</label>
                            <input type="date" class="form-control" name="from_date"
                                value="{{ old('from_date', request()->from_date) }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Sampai Tanggal</label>
                            <input type="date" class="form-control" name="to_date"
                                value="{{ old('to_date', request()->to_date) }}">
                        </div>

                    </div>



                    <div class="modal-footer">
                        <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-secondary ms-auto">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('custom_script')
    <script src="{{ asset('dist/libs/fslightbox/index.js') }}" defer></script>
@endpush
