@extends('layouts.main')

{{-- Register Successful --}}
@if (session()->has('success'))
<div class="alert alert-success text-center mb-5" role="alert">
    {{ session('success') }}
</div>
@endif

{{-- Login Error --}}
@if (session()->has('loginError'))
    <div class="alert alert-danger text-center mb-5" role="alert">
        {{ session('loginError') }}
    </div>
@endif

@section('container')
    <div class="row align-items-center">
        <div class="col-lg-6 mt-4 ">
        <h1 class="word"> Caring your pet</h1>
        <p class="word leading-relaxed">Here you get easiness</p>
        <a href="/services" class="btn btn-outline-dark" role="button" style="margin-left: 6.7rem">Lets Start!</a>
        </div>
        <div class="col-lg-6">
        <img src="/img/image_1.png" style="width: 378px; margin-left: 180px;" alt="Ilustrasi Kucing">
        </div> 
    </div>
@endsection

@section('container-2')
    <div class="row">
        <div class=" col-lg-6" >
        <img src="/img/image_2.png" style="width: 400px; margin-left: 93px; " alt="" >
        </div>
        <div class="col-lg-6 mt-5" >
        <h1 class="word2"> Connect and Consulting </h1>
        <p class="word2 leading-relaxed"> With Our Certified Expert </p>
        </div> 
    </div>
@endsection

@section('section-get-started')
    <div class="container">

        <div class="row justify-content-center gy-4">

        <div class="col-lg-6 d-flex align-items-center" data-aos="fade-up">
            <div class="content text-center">
            <h3>Mengenal PETHAL Lebih Jauh</h3>
            <p>Hewan juga sama makhluk hidup, sama seperti manusia. Karena itu, mereka juga membutuhkan perawatan dan pengobatan ketika sakit, perhatian lebih agar terlihat indah, dan kasih sayang agar bahagia. PETHAL Mewujudkan impian semua pencinta hewan, menjadi klinik hewan yang memiliki layanan unggulan dengan tenaga profesional dan menjunjung tinggi <i>Animal Welfare</i><br><i>"Because We Care, We Share"</i>
            </div>
        </div>
        </div>
    </div>
@endsection

@section('container-3')
@if ($articleCount > 0)
    <p class="b-titles d-flex justify-content-center">It's Articles!</p>
    <p class="s-titles d-flex justify-content-center">Find your news here..</p>
    <div class="row justify-content-center p-5 mx-5">
        
        <div class="row">
            @foreach ($articles as $article)
            <div class="col d-flex justify-content-around">
                <div class="card">
                    @if ($article->galleries->isNotEmpty())
                        @php $firstImageUrl = $article->galleries->first()->url; @endphp
                        <a href="/articles/{{ $article->id }}" class="text-center"><img src="{{ $firstImageUrl }}" alt="Image" class="img-fluid" width="275"></a>
                        
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->short_title }}</h5>
                        <p class="card-text">{{ $article->excerpt }}</p>     
                        <a href="/articles/{{ $article->id }}" class="btn btn-primary" style="background-color: #4dab6e; border-color: #FEF5ED">Read More</a>      
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endif

@endsection