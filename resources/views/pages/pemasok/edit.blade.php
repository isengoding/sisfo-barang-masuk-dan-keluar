@extends('layouts.app')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none ">
        <div class="container-xl ">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Pemasok
                    </div>
                    <h2 class="page-title">
                        Edit Pemasok
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

            <!-- Alert -->
            {{-- <x-alert-success /> --}}
            <x-alert-error />

            <div class="row row-deck row-cards">

                <div class="col-12 col-lg-8">
                    <div class="card card-md">
                        <form action="{{ route('pemasok.update', $pemasok) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <a href="{{ route('pemasok.index') }}" class="btn btn-icon">
                                    <i class="ti ti-chevrons-left"></i>

                                </a>
                            </div>
                            <div class="card-stamp card-stamp-lg">
                                <div class="card-stamp-icon bg-primary">
                                    <i class="ti ti-address-book"></i>

                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-12">

                                        <div class="mb-3">
                                            <label class="form-label required">Nama Pemasok</label>
                                            <input type="text" name="nama_pemasok"
                                                value="{{ old('nama_pemasok', $pemasok->nama_pemasok) }}"
                                                class="form-control @error('nama_pemasok') is-invalid @enderror"
                                                placeholder="" autofocus>
                                            @error('nama_pemasok')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label required">No. Telp</label>
                                            <input type="text" name="notelp"
                                                value="{{ old('notelp', $pemasok->notelp) }}"
                                                class="form-control @error('notelp') is-invalid @enderror" placeholder=""
                                                autofocus>
                                            @error('notelp')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label required">Email</label>
                                            <input type="email" name="email" value="{{ old('email', $pemasok->email) }}"
                                                class="form-control @error('email') is-invalid @enderror" placeholder=""
                                                autofocus>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="alamat" class="form-label">Alamat</label>
                                            <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="">{{ old('alamat', $pemasok->alamat) }}</textarea>
                                            @error('alamat')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror



                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('pemasok.index') }}" class="btn btn-outline-secondary w-25 ">Cancel</a>
                                <button type="submit" class="btn btn-primary ms-3 w-25 ">Save</button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection

@push('custom_script')
@endpush
