@extends('dashboard.layouts.user_main')

@section('container')

    <div class="row mt-5" style="color: #4dab6e">
        <div class="col">
            <h1 class="fw-bold">{{ $title }}</h1>
        </div>
    </div>
        {{-- action akan otomatis ke /admin/product digabung dengan POST akan otomatis menjalankan store() di Resource Controller --}}
        {{-- Form Add Product --}}
        <form action="/user/payments" method="POST" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center my-5">
                <div class="col-8">

                    {{-- Payment Type --}}
                    <div class="form-floating">
                        <select class="form-select @error('payment_type_id')
                        is-invalid
                    @enderror" name="payment_type_id" required>
                    @error('payment_type_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                    @enderror
                        {{-- Looping Pet Kategori --}}
                        @foreach ($payment_types as $payment_type)
                            <option value="{{ $payment_type->id }}">{{ $payment_type->name }}</option>
                        @endforeach
                    </select>
                        <label for="name">Payment Type</label>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col">
                    {{-- Button Create --}}
                    <button type="submit" class="btn btn-primary border-0" style="background-color: #4dab6e; border-color: #FEF5ED">Add Payment Type</button>
                </div>
            </div>
        </form>
    </div>

@endsection