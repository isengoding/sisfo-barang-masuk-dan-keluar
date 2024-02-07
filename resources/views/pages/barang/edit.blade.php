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
                        Edit Barang
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    {{-- <div class="btn-list">
                        <span class="d-none d-sm-inline">
                            <a href="#" class="btn">
                                New view
                            </a>
                        </span>
                        <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                            data-bs-target="#modal-report">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg>
                            Save
                        </a>
                        <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                            data-bs-target="#modal-report" aria-label="Create new report">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg>
                        </a>
                    </div> --}}
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

            <div class="row row-deck row-cards">

                <div class="col-12 col-lg-8">
                    <div class="card card-md">
                        <form action="{{ route('barang.update', $barang) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <a href="{{ route('barang.index') }}" class="btn btn-icon">
                                    <i class="ti ti-chevrons-left"></i>

                                </a>
                            </div>
                            <div class="card-stamp card-stamp-lg">
                                <div class="card-stamp-icon bg-primary">
                                    <i class="ti ti-fountain-filled"></i>

                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-12">

                                        <div class="mb-3">
                                            <label class="form-label required">Nama Barang</label>
                                            <input type="text" name="nama_barang"
                                                value="{{ old('nama_barang', $barang->nama_barang) }}"
                                                class="form-control @error('nama_barang') is-invalid @enderror"
                                                placeholder="" autofocus>
                                            @error('nama_barang')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label required">Kode Barang</label>
                                            <input type="text" name="kode" value="{{ old('kode', $barang->kode) }}"
                                                class="form-control @error('kode') is-invalid @enderror" placeholder="">
                                            @error('kode')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label required">Satuan</label>
                                            <select name="satuan_id"
                                                class="form-select @error('satuan_id') is-invalid @enderror" id="satuan_id">
                                                <option value="">Pilih Satuan</option>
                                                @foreach ($satuans as $item)
                                                    <option value="{{ $item->id }}" @selected(old('satuan_id', $barang->satuan_id) == $item->id)>
                                                        {{ $item->nama_satuan }}
                                                    </option>
                                                @endforeach

                                            </select>
                                            @error('satuan_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label required">Kategori</label>
                                            <select name="kategori_id[]"
                                                class="form-select @error('kategori_id') is-invalid @enderror"
                                                id="kategori_id" multiple>
                                                <option value="">Pilih Kategori</option>

                                                @foreach ($kategoris as $item)
                                                    <option value="{{ $item->id }}" @selected(in_array($item->id, old('kategori_id', $barang->kategoris->pluck('id')->toArray())))>
                                                        {{ $item->nama_kategori }}
                                                    </option>
                                                @endforeach

                                            </select>
                                            @error('kategori_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label required">Harga</label>
                                            <input type="number" name="harga" value="{{ old('harga', $barang->harga) }}"
                                                class="form-control @error('harga') is-invalid @enderror" placeholder="">
                                            @error('harga')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label required">Stok</label>
                                            <input type="number" name="stok" value="{{ old('stok', $barang->stok) }}"
                                                class="form-control @error('stok') is-invalid @enderror" placeholder="">
                                            @error('stok')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label required">Min Stok</label>
                                            <input type="number" name="min_stok"
                                                value="{{ old('min_stok', $barang->min_stok) }}"
                                                class="form-control @error('min_stok') is-invalid @enderror" placeholder="">
                                            @error('min_stok')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Gambar</label>
                                            <input type="file" name="gambar" value="{{ old('gambar') }}" id="gambar"
                                                class="form-control @error('gambar') is-invalid @enderror">
                                            @error('gambar')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">
                                                Keterangan
                                            </label>
                                            <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" rows="4"
                                                placeholder="">{{ old('keterangan', $barang->keterangan) }}</textarea>
                                            @error('keterangan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('barang.index') }}" class="btn btn-outline-secondary w-25 ">Cancel</a>
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
    <!-- include jQuery library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <!-- include FilePond library -->
    <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>

    <!-- include FilePond plugins -->
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>

    <!-- include FilePond jQuery adapter -->
    <script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>

    <script>
        $(function() {

            FilePond.registerPlugin(
                FilePondPluginFileValidateType,
                FilePondPluginImagePreview,
                FilePondPluginFileValidateSize
            );

            FilePond.setOptions({
                server: {
                    process: (fieldName, file, metadata, load, error, progress, abort, transfer,
                        options) => {
                        abort();
                    }
                }
            })

            // Turn input element into a pond
            const inputElement = document.querySelector('#gambar');
            const pond = FilePond.create(inputElement, {
                allowFileTypeValidation: true,
                maxFileSize: '3MB',
                allowImagePreview: true,
                allowFileSizeValidation: true,
                acceptedFileTypes: ['image/*'],
                server: {
                    load: (source, load, error, progress, abort, headers) => {
                        const myRequest = new Request(source);
                        fetch(myRequest).then((res) => {
                            return res.blob();
                        }).then(load);
                    },
                    process: '{{ route('filepond.store') }}',
                    revert: '{{ route('filepond.destroy') }}',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                },
                files: [{
                    source: '{{ Storage::disk('public')->url($barang->gambar) }}',
                    options: {
                        type: 'local',
                    },
                }],
            });


        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            new TomSelect(document.getElementById('satuan_id'))
            new TomSelect(document.getElementById('kategori_id'))
        });
    </script>
@endpush
