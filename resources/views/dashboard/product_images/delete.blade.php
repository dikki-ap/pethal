@extends('dashboard.layouts.main')

@section('container')

    <div class="row mt-5" style="color: #4dab6e">
        <div class="col">
            <h1 class="fw-bold">Delete Image for
                @foreach ($product_name as $name)
                    {{ $name }}
                @endforeach
            </h1>
        </div>
    </div>
    
    <div class="row text-center mt-3">
        <div class="col">
            <!-- Slider main container -->
            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                <!-- Slides -->
                    {{-- Looping Semua Galleries --}}
                    @foreach ($images as $image)
                    <div class="swiper-slide">
                        <img src="{{ asset('storage/' . $image->url) }}" alt="{{ $image->url }}" class="img-fluid" width="700">

                        <div class="row">
                            <div class="col">
                                {{-- Otomatis menjalankan method destroy() di DashboardGalleriesController dikarenakan menggunakan method('delete') --}}
                                <form action="/admin/product-image/{{ $image->id }}" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf

                                    <input type="hidden" name="product_id" value="{{ $image->product_id }}">
                                    <input type="hidden" name="image_id" value="{{ $image->id }}">
                                    <input type="hidden" name="image_url" value="{{ $image->url }}">
        
                                    <button class="btn btn-danger border-0 mt-5" onclick="confirmAndSubmit(event)">Delete Image</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination mb-5"></div>
            
                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev" style="color: #4dab6e"></div>
                <div class="swiper-button-next" style="color: #4dab6e"></div>
            </div>
        </div>
    </div>
@endsection