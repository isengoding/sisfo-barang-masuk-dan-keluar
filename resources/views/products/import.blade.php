@extends('layouts.app')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none ">
        <div class="container-xl ">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Product
                    </div>
                    <h2 class="page-title">
                        Import Product
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
            <div class="row">
                <div class="col-12 col-lg-8 mx-auto">
                    <x-alert-success />
                    <x-alert-error />
                </div>
            </div>

            <div class="row row-deck row-cards">

                <div class="col-12 col-lg-8 mx-auto">
                    <div class="card card-md">
                        <form action="{{ route('products.import.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-stamp card-stamp-lg">
                                <div class="card-stamp-icon bg-primary">
                                    <i class="ti ti-table-import"></i>

                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <div class="mb-5">

                                            <a href="{{ asset('dist/contoh/contoh.xlsx') }}">Example Format File.</a>
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label required">import product</label>
                                            <input type="file" name="file" value="{{ old('file') }}"
                                                class="form-control @error('file') is-invalid @enderror" placeholder=""
                                                autofocus tabindex="1">
                                            @error('file')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary w-25 ">Cancel</a>
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
