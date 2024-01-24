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
                        Edit Product, {{ $product->name }}
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
            <x-alert-success />
            <x-alert-error />

            <div class="row row-deck row-cards">

                <div class="col-12 col-lg-8">
                    <div class="card card-md">
                        <form action="{{ route('products.update', $product) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <a href="{{ route('products.index') }}" class="btn btn-icon">
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
                                            <label class="form-label required">Product Name</label>
                                            <input type="text" name="name" value="{{ old('name', $product->name) }}"
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Category Name" autofocus tabindex="1">
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label required">Product Code</label>
                                            <input type="text" name="code" value="{{ old('code', $product->code) }}"
                                                class="form-control @error('code') is-invalid @enderror" placeholder=""
                                                autofocus tabindex="1">
                                            @error('code')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label required">Brand</label>
                                            <select name="brand_id" class="form-select @error('name') is-invalid @enderror"
                                                id="brand_id" value="{{ old('brand_id') }}">
                                                <option value="">Select Brand</option>
                                                @foreach ($brands as $item)
                                                    <option value="{{ $item->id }}" @selected(old('brand_id', $product->brand_id) == $item->id)>
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach

                                            </select>
                                            @error('brand_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        {{-- <div class="mb-3">
                                            <label class="form-label required">Category</label>
                                            <input type="text" name="name" value="{{ old('name') }}"
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Category Name" autofocus tabindex="1">
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div> --}}
                                        <div class="mb-3">
                                            <label class="form-label required">Price</label>
                                            <input type="number" name="price"
                                                value="{{ old('price', $product->price) }}"
                                                class="form-control @error('price') is-invalid @enderror" placeholder="">
                                            @error('price')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label required">Stock</label>
                                            <input type="number" name="stock"
                                                value="{{ old('stock', $product->stock) }}"
                                                class="form-control @error('stock') is-invalid @enderror" placeholder="">
                                            @error('stock')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Image</label>
                                            <input type="file" name="image" value="{{ old('image') }}" id="image"
                                                class="form-control @error('image') is-invalid @enderror">
                                            @error('image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <input type="text" class="form-control" name="path" id="path"
                                                value="{{ $product->image }}" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">
                                                Description
                                            </label>
                                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="4"
                                                placeholder="Product Description">{{ old('description', $product->description) }}</textarea>
                                            @error('description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
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

            const inputElement = document.querySelector('#image');
            const pond = FilePond.create(inputElement, {
                acceptedFileTypes: ['image/*'],
                allowFileTypeValidation: true,
                maxFileSize: '3MB',
                allowImagePreview: true,
                allowFileSizeValidation: true,
                server: {
                    load: (source, load, error, progress, abort, headers) => {
                        const myRequest = new Request(source);
                        fetch(myRequest).then((res) => {
                            return res.blob();
                        }).then(load);
                    },
                    process: '{{ route('images.upload') }}',
                    revert: '{{ route('images.revert') }}',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                },
                files: [{
                    source: '{{ Storage::disk('public')->url($product->image) }}',
                    options: {
                        type: 'local',
                    },
                }],
            });

        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            new TomSelect(document.getElementById('brand_id'))
        });
    </script>
@endpush
