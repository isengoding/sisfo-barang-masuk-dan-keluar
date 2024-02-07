@extends('layouts.app')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none ">
        <div class="container-xl ">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Barang
                    </div>
                    <h2 class="page-title">
                        List Barang
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('barang.import.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <i class="ti ti-table-import icon"></i>
                            Import
                        </a>
                        <a href="{{ route('barang.pdf') }}" target="_blank"
                            class="btn btn-primary d-none d-sm-inline-block">
                            <i class="ti ti-file-export icon"></i>
                            PDF
                        </a>
                        <a href="{{ route('barang.excel') }}" target="_blank"
                            class="btn btn-primary d-none d-sm-inline-block">
                            <i class="ti ti-table-export icon"></i>
                            Excel
                        </a>
                        <a href="{{ route('barang.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg>
                            Tambah Barang
                        </a>
                        {{-- <span class="dropdown"> --}}
                        <button class="btn btn-icon d-sm-none" data-bs-toggle="dropdown" aria-expanded="true">
                            <i class="ti ti-dots icon"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" data-popper-placement="bottom-end">
                            <a class="dropdown-item" href="{{ route('barang.import.create') }}">
                                <i class="ti ti-table-import icon text-secondary me-2"></i>
                                Import
                            </a>
                            <a class="dropdown-item" href="{{ route('barang.excel') }}">
                                <i class="ti ti-table-export icon text-secondary me-2"></i>
                                Excel
                            </a>
                            <a class="dropdown-item" href="{{ route('barang.pdf') }}">
                                <i class="ti ti-file-export icon text-secondary me-2"></i>
                                PDF
                            </a>
                        </div>
                        {{-- </span> --}}
                        <a href="{{ route('barang.create') }}" class="btn btn-primary d-sm-none btn-icon">
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
                <div class="col-12 col-lg-3">
                    <form action="" method="get">
                        <div class="input-icon mb-3">
                            <input type="search" value="{{ request()->query('keyword') }}" class="form-control w-100"
                                name="keyword" placeholder="Search…">
                            <span class="input-icon-addon">
                                <i class="icon ti ti-search"></i>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-vcenter table-mobile-md card-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        {{-- <th>Gambar</th>
                                        <th>Kode</th> --}}
                                        <th>Barang</th>
                                        <th>Satuan</th>
                                        <th>Kategori</th>
                                        <th class="text-center">Stok</th>
                                        <th class="text-end">Harga</th>
                                        <th>Keterangan</th>
                                        <th class="w-1"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($barangs as $row)
                                        <tr>
                                            <td class="text-secondary align-text-top" data-label="No">
                                                {{ $loop->iteration + $barangs->firstItem() - 1 }}
                                            </td>
                                            <td data-label="Barang">
                                                <div class="d-flex py-1 align-items-top">
                                                    <a data-fslightbox="gallery"
                                                        href="{{ asset('storage/' . $row->gambar) }}">
                                                        <span class="avatar me-2"
                                                            style="background-image: url({{ asset('storage/' . $row->gambar) }})"></span>

                                                    </a>
                                                    <div class="flex-fill">
                                                        <div class="font-weight-medium">{{ $row->nama_barang }}</div>
                                                        <div class="text-secondary"><a href="#"
                                                                class="text-reset">{{ $row->kode }}</a></div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="align-text-top" data-label="Satuan">
                                                {{ $row->satuan->nama_satuan }}
                                            </td>
                                            <td class="align-text-top" data-label="Kategori">
                                                @forelse ($row->kategoris as $item)
                                                    <span
                                                        class="badge badge-outline text-cyan">{{ $item->nama_kategori }}</span>

                                                @empty
                                                    -
                                                @endforelse
                                            </td>

                                            <td class="align-text-top text-start text-lg-center" data-label="Stok">
                                                {{ $row->stok }}
                                            </td>
                                            <td class="align-text-top text-start text-lg-end" data-label="Harga">
                                                Rp. {{ number_format($row->harga) }}
                                            </td>
                                            <td class="align-text-top" data-label="Keterangan">
                                                {{ $row->keterangan }}
                                            </td>
                                            <td class="align-text-top">
                                                <a href="#" class="link-underline link-underline-opacity-0"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ti ti-dots icon"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end" style="">
                                                    <a class="dropdown-item" href="{{ route('barang.edit', $row->id) }}">
                                                        <i class="ti ti-edit icon text-secondary me-2"></i>
                                                        Edit
                                                    </a>
                                                    <a class="dropdown-item text-danger" href="#"
                                                        onclick="handleDelete(`{{ route('barang.destroy', $row->id) }}`)">
                                                        <i class="ti ti-trash icon me-2 opacity-50"></i>
                                                        Delete
                                                    </a>
                                                </div>

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

                        <div class="card-footer d-flex justify-content-center align-items-center">
                            {{ $barangs->onEachSide(1)->withQueryString()->withPath(request()->fullUrl())->links() }}
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <div class="modal modal-blur fade" id="modal-danger" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <form action="" method="POST" id="deleteForm">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-status bg-danger"></div>
                    <div class="modal-body text-center py-4">
                        <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" />
                            <path d="M12 9v4" />
                            <path d="M12 17h.01" />
                        </svg>
                        <h3>Are you sure?</h3>
                        <div class="text-secondary">Do you really want to remove this data? What you've done cannot be
                            undone.</div>
                    </div>
                    <div class="modal-footer">
                        <div class="w-100">
                            <div class="row">
                                <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                                        Cancel
                                    </a></div>
                                <div class="col"><button type="submit" class="btn btn-danger w-100"
                                        data-bs-dismiss="modal">
                                        Yes, Delete
                                    </button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('custom_script')
    <script src="{{ asset('dist/libs/fslightbox/index.js') }}" defer></script>

    <script>
        function handleDelete(route) {
            let form = document.getElementById('deleteForm')
            form.action = route
            console.log(form.action)
            var modalConfirm = new bootstrap.Modal(document.getElementById('modal-danger'));
            modalConfirm.show();
        }
    </script>
@endpush
