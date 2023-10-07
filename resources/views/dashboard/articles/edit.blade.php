@extends('dashboard.layouts.main')

@section('container')

    <div class="row mt-5" style="color: #4dab6e">
        <div class="col">
            <h1 class="fw-bold">Edit Article</h1>
        </div>
    </div>
        {{-- action akan otomatis ke /dashboard/materials digabung dengan POST akan otomatis menjalankan update() di Resource Controller --}}
        {{-- Form Edit Material --}}
        <form action="/admin/article/{{ $article->id }}" method="POST" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="row justify-content-center my-5">
                <div class="col-8">

                    {{-- Title --}}
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control @error('title')
                            is-invalid
                        @enderror" id="title" autofocus required value="{{ old('title', $article->title) }}">
                        @error('title')
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
                        <input id="description" type="hidden" name="description" required value="{{ old('description', $article->description) }}">
                        <trix-editor input="description"></trix-editor>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col">
                    {{-- Button Create --}}
                    <button type="submit" class="btn btn-primary border-0" style="background-color: #4dab6e; border-color: #FEF5ED">Edit Article</button>
                </div>
            </div>
        </form>
    </div>

@endsection