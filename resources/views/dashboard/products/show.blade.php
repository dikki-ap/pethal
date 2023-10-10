@extends('dashboard.layouts.main')

@section('container')

    <div class="row my-5" style="color: #4dab6e">
        <div class="col">
            <h1 class="fw-bold">Product Details</h1>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col">
                <h2 class="mb-3" style="color: #4dab6e">{{ $product->name }}</h2>
                <h5><i class="bi bi-diagram-3-fill"></i> &nbsp; {{ $product->product_type->name }}</h5>
                <h6><i class="bi bi-tags-fill"></i> &nbsp; Rp. {{ $product->price }}</h6>
                <hr>
    
                <div class="swiper text-center">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                    <!-- Slides -->
                    @foreach ($images as $image)
                    <div class="swiper-slide">
                        <img src="{{ asset('storage/' . $image->url) }}" alt="{{ $image->url }}" class="img-fluid rounded-3 mb-5" width="700">
                    </div>
                    @endforeach
  
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>
                
                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev" style="color: #4dab6e"></div>
                    <div class="swiper-button-next" style="color: #4dab6e"></div>
                </div>

                <hr>

                <h4 class="mb-3" style="color: #4dab6e">Description</h4>
    
                {{-- Menggunakan >> {!!  !!} Dikarenakan bisa saja di dalam artikel terdapat TAG HTML --}}
                {{-- Menggunakan >> {{  }} terdapat htmlspesialchars() untuk menghindari penggunaan TAG HTML di dalamnya --}}
                {{-- SESUAIKAN DENGAN KONDISI --}}
                <article class="my-3 fs-5">
                    <p>{!! $product->description !!}</p>
                </article>

                
                <div class="row text-center">
                    <div class="col">
                        <a href="/admin/product" class="btn btn-primary border-0 text-center mt-5" style="background-color: #4dab6e; border-color: #FEF5ED"><span data-feather="chevrons-left"></span>&nbsp; Back to Product List</a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection