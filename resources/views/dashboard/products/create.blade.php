@extends('dashboard.layouts.main')

@section('container')

    <div class="row mt-5" style="color: #4dab6e">
        <div class="col">
            <h1 class="fw-bold">Add New Product</h1>
        </div>
    </div>
        {{-- action akan otomatis ke /admin/product digabung dengan POST akan otomatis menjalankan store() di Resource Controller --}}
        {{-- Form Add Product --}}
        <form action="/admin/product" method="POST" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center my-5">
                <div class="col-8">

                    {{-- Name --}}
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control @error('name')
                            is-invalid
                        @enderror" id="name" autofocus required value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Category --}}
                    <div class="mb-3">
                        <label for="product_type_id" class="form-label">Product Type</label>
                        <select class="form-select @error('product_type_id')
                        is-invalid
                    @enderror" name="product_type_id" required>
                    @error('product_type_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                    @enderror
                    
                            {{-- Looping Semua Kategori --}}
                            @foreach ($product_types as $product_type)

                            {{-- Kondisi untuk SELECT OPTION jika salah, dan otomatis terisi ke value sebelumnya --}}
                            @if (old('product_type_id') == $product_type->id)

                                <option value="{{ $product_type->id }}" selected>{{ $product_type->name }}</option>

                            @else

                                <option value="{{ $product_type->id }}">{{ $product_type->name }}</option>

                            @endif
                            
                            @endforeach
                        </select>
                    </div>

                    {{-- Price --}}
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" min="1" maxlength="7" name="price" class="form-control @error('price')
                            is-invalid
                        @enderror" id="price" autofocus required value="{{ old('price') }}">
                        @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        @error('description')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <input id="description" type="hidden" name="description" required value="{{ old('description') }}">
                        <trix-editor input="description"></trix-editor>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col">
                    {{-- Button Create --}}
                    <button type="submit" class="btn btn-primary border-0" style="background-color: #4dab6e; border-color: #FEF5ED">Add Product</button>
                </div>
            </div>
        </form>
    </div>

@endsection