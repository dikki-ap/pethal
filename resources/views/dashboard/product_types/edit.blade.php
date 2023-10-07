@extends('dashboard.layouts.main')

@section('container')

    <div class="row mt-5" style="color: #4dab6e">
        <div class="col">
            <h1 class="fw-bold">{{ $title }}</h1>
        </div>
    </div>
        {{-- action akan otomatis ke /dashboard/products digabung dengan POST akan otomatis menjalankan update() di Resource Controller --}}
        {{-- Form Edit product --}}
        <form action="/admin/product-type/{{ $product_type->id }}" method="POST" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="row justify-content-center my-5">
                <div class="col-8">

                    {{-- Name --}}
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control @error('name')
                            is-invalid
                        @enderror" id="name" autofocus required value="{{ old('name', $product_type->name) }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col">
                    {{-- Button Create --}}
                    <button type="submit" class="btn btn-primary border-0" style="background-color: #4dab6e; border-color: #FEF5ED">Edit Product Type</button>
                </div>
            </div>
        </form>
    </div>

@endsection