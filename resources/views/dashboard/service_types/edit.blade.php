@extends('dashboard.layouts.main')

@section('container')

    <div class="row mt-5" style="color: #4dab6e">
        <div class="col">
            <h1 class="fw-bold">{{ $title }}</h1>
        </div>
    </div>
        {{-- action akan otomatis ke /dashboard/products digabung dengan POST akan otomatis menjalankan update() di Resource Controller --}}
        {{-- Form Edit product --}}
        <form action="/admin/service-type/{{ $service_type->id }}" method="POST" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="row justify-content-center my-5">
                <div class="col-8">

                    {{-- Name --}}
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control @error('name')
                            is-invalid
                        @enderror" id="name" autofocus required value="{{ old('name', $service_type->name) }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Price --}}
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" min="1" maxlength="7" name="price" class="form-control @error('price')
                            is-invalid
                        @enderror" id="price" autofocus required value="{{ old('price', $service_type->price) }}">
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
                        <input id="description" type="hidden" name="description" required value="{{ old('description', $service_type->description) }}">
                        <trix-editor input="description"></trix-editor>
                    </div>

                    {{-- IsNeedDoctor --}}
                    <div class="mb-3">
                        <label for="isNeedDoctor" class="form-label">Doctor Required</label>
                        <select class="form-select @error('isNeedDoctor')
                        is-invalid
                    @enderror" name="isNeedDoctor" required>
                    @error('isNeedDoctor')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                    @enderror
                    @if (old('isNeedDoctor', $service_type->isNeedDoctor) == 1)
                        <option value="{{ $service_type->isNeedDoctor }}" selected>Yes</option>
                        <option value="0">No</option>
                    @else
                        <option value="{{ $service_type->isNeedDoctor }}" selected>No</option>
                        <option value="1">Yes</option>
                    @endif
                        </select>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col">
                    {{-- Button Create --}}
                    <button type="submit" class="btn btn-primary border-0" style="background-color: #4dab6e; border-color: #FEF5ED">Edit Service Type</button>
                </div>
            </div>
        </form>
    </div>

@endsection