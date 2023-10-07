@extends('dashboard.layouts.main')

@section('container')

    <div class="row mt-5" style="color: #4dab6e">
        <div class="col">
            <h1 class="fw-bold">{{ $title }}</h1>
        </div>
    </div>
        {{-- action akan otomatis ke /dashboard/products digabung dengan POST akan otomatis menjalankan update() di Resource Controller --}}
        {{-- Form Edit product --}}
        <form action="/admin/doctor/{{ $doctor->id }}" method="POST" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="row justify-content-center my-5">
                <div class="col-8">

                    {{-- Name --}}
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control @error('name')
                            is-invalid
                        @enderror" id="name" autofocus required value="{{ old('name', $doctor->name) }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Specialist --}}
                    <div class="mb-3">
                        <label for="specialist" class="form-label">Specialist</label>
                        <input type="text" name="specialist" class="form-control @error('specialist')
                            is-invalid
                        @enderror" id="specialist" autofocus required value="{{ old('specialist', $doctor->specialist) }}">
                        @error('specialist')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Phone --}}
                    <div class="mb-3">
                        <label for="phone" class="form-label">phone</label>
                        <input type="number" minlength="11" maxlength="13" name="phone" class="form-control @error('phone')
                            is-invalid
                        @enderror" id="phone" autofocus required value="{{ old('phone', $doctor->phone) }}">
                        @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Work Day --}}
                    <div class="mb-3">
                        <label for="days" class="form-label">Work Day</label>
                        <select class="form-select @error('days')
                        is-invalid
                    @enderror" name="days" required>
                    @error('days')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                    @enderror
                    @foreach ($days as $day)

                            {{-- Kondisi untuk SELECT OPTION jika salah, dan otomatis terisi ke value sebelumnya --}}
                            @if (old('day_id') == $day->id)

                                <option value="{{ $day->id }}" selected>{{ $day->name }}</option>

                            @else

                                <option value="{{ $day->id }}">{{ $day->name }}</option>

                            @endif
                            
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col">
                    {{-- Button Create --}}
                    <button type="submit" class="btn btn-primary border-0" style="background-color: #4dab6e; border-color: #FEF5ED">Edit Doctor</button>
                </div>
            </div>
        </form>
    </div>

@endsection