@extends('layouts.app')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none ">
        <div class="container-xl ">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Barang Keluar
                    </div>
                    <h2 class="page-title">
                        {{ $barangKeluar->no_transaksi }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <button type="button" class="btn btn-primary" onclick="javascript:window.print();">
                            <!-- Download SVG icon from http://tabler-icons.io/i/printer -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2">
                                </path>
                                <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4"></path>
                                <path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z">
                                </path>
                            </svg>
                            Print
                        </button>
                        <a href="{{ route('barang-keluar.edit', $barangKeluar) }}"
                            class="btn btn-primary d-none d-sm-inline-block">
                            <i class="ti ti-edit icon me-2"></i>
                            Edit
                        </a>
                        <a href="#" class="btn btn-danger d-none d-sm-inline-block"
                            onclick="handleDelete(`{{ route('barang-keluar.destroy', $barangKeluar->id) }}`)">
                            <i class="ti ti-trash icon me-2"></i>
                            Hapus
                        </a>
                        <a href="{{ route('barang-keluar.create') }}" class="btn btn-primary d-sm-none btn-icon"
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
            {{-- <x-alert-success /> --}}
            <x-alert-error />

            <div class="row">
                <div class="col-12">
                    <div class="card card-lg">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <p class="h3">Perusahaan</p>
                                    <address>
                                        Street Address<br>
                                        State, City<br>
                                        Region, Postal Code<br>
                                        ltd@example.com
                                    </address>
                                </div>
                                <div class="col-6 text-end">
                                    <p class="h3">Pelanggan</p>
                                    <address>
                                        {{ $barangKeluar->pelanggan->nama_pelanggan }}<br>
                                        {{ $barangKeluar->pelanggan->alamat }}<br>
                                        {{ $barangKeluar->pelanggan->notelp }}<br>
                                        {{ $barangKeluar->pelanggan->email }}
                                    </address>
                                </div>
                                <div class="col-12 my-5">
                                    <div class="fs-2">{{ $barangKeluar->no_transaksi }}</div>
                                    <div>{{ \Carbon\Carbon::parse($barangKeluar->tgl_keluar)->format('d M Y') }}</div>
                                </div>
                            </div>
                            <table class="table table-transparent table-responsive">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 1%"></th>
                                        <th>Barang</th>
                                        <th class="text-center" style="width: 1%">Satuan</th>
                                        <th class="text-center" style="width: 1%">Jumlah</th>
                                        <th class="text-end" style="width: 1%">Harga</th>
                                        <th class="text-end" style="width: 1%">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barangKeluar->barangKeluarDetails as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>
                                                <p class="strong mb-1">{{ $item->barang->nama_barang }}</p>
                                                <div class="text-secondary">{{ $item->barang->kode }}</div>
                                            </td>
                                            <td class="text-center">
                                                {{ $item->barang->satuan->nama_satuan }}
                                            </td>
                                            <td class="text-center">
                                                {{ $item->qty }}
                                            </td>
                                            <td class="text-end text-nowrap">Rp. {{ number_format($item->harga) }}</td>
                                            <td class="text-end text-nowrap">Rp. {{ number_format($item->total_harga) }}
                                            </td>
                                        </tr>
                                    @endforeach


                                    <tr>
                                        <td colspan="5" class="font-weight-bold text-uppercase text-end">Total

                                        </td>
                                        <td class="font-weight-bold text-end text-nowrap">Rp.
                                            {{ number_format($barangKeluar->total_harga) }}</td>
                                    </tr>
                                </tbody>
                            </table>

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

    @if (session()->has('success'))
        <script>
            toastr["success"]("{{ session()->get('success') }}", "Success")
        </script>
    @endif
    <script>
        function handleDelete(route) {
            let form = document.getElementById('deleteForm')
            form.action = route
            console.log(form.action)
            var modalConfirm = new bootstrap.Modal(document.getElementById('modal-danger'));
            modalConfirm.show();
        }

        // window.print();
    </script>
@endpush
