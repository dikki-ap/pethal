@extends('dashboard.layouts.main')

@section('container')

    <div class="row my-5" style="color: #4dab6e">
        <div class="col">
            <h1 class="fw-bold">Article Details</h1>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col">
                <h2 class="mb-3" style="color: #4dab6e">{{ $article->title }}</h2>
                <p class="text-muted"><i class="bi bi-clock"></i> &nbsp; Published at {{ $article->created_at->diffForHumans() }}</p>
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
                    <p>{!! $article->description !!}</p>
                </article>

                <div class="row text-center">
                    <div class="col">
                        <a href="/admin/article" class="btn btn-primary border-0 text-center mt-5" style="background-color: #4dab6e; border-color: #FEF5ED"><span data-feather="chevrons-left"></span>&nbsp; Back to Article List</a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection