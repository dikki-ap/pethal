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
        <a href="#" class="btn btn-outline-dark" role="button">Lets Start!</a>
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

        <!-- Consult Section-->
        {{-- <div class="col-lg-5" data-aos="fade">
            <form action="#" method="post" class="php-email-form">
            <h3>Tell us more about your pet </h3>
            <p>You can even upload photos and medical documents if you desire. You can even upload photos and medical documents if you desire.</p>
            <div class="row gy-3">

                <div class="col-md-12">
                <input type="text" name="name" class="form-control" placeholder="Name">
                </div>

                <div class="col-md-12 ">
                <input type="email" class="form-control" name="email" placeholder="Email">
                </div>

                <div class="col-md-12">
                <input type="text" class="form-control" name="phone" placeholder="Phone">
                </div>

                <div class="col-md-12">
                <textarea class="form-control" name="message" rows="6" placeholder="Message"></textarea>
                </div>

                <div class="col-md-12 text-center">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your quote request has been sent successfully. Thank you!</div>

                <button type="submit">Tell Us</button>
                </div>
            </div>
            </form>
        </div> --}}
        <!-- End Consult Section-->
        </div>
    </div>
@endsection

@section('container-3')
<p class="b-titles d-flex justify-content-center">It's Articles!</p>
<p class="s-titles d-flex justify-content-center">Find your news here..</p>
<div class="row justify-content-center p-5 mx-5">
<div class="col">
    <div class="card">
    <img src="/img/card_1.jpg" class="card-img-top" alt="">
    <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Error libero reiciendis ipsum natus voluptas eligendi accusamus enim hic quae temporibus? Nam obcaecati laudantium velit ut molestiae unde ullam animi quod.</p>
    </div>
    </div>
</div>
<div class="col">
    <div class="card">
    <a href="./articles/kardus-tempat-favorit.html">
        <img src="/img/card_2.jpg" class="card-img-top" alt="">
    </a>
    <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat consequatur alias odio perferendis deserunt eveniet laborum quia doloribus magnam, amet sequi, aspernatur velit, temporibus repellat pariatur nemo nihil consequuntur? Molestiae?</p>            
    </div>
    </div>
</div>
<div class="col">
    <div class="card">
    <img src="/img/card_3.jpg" class="card-img-top" alt="">
    <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis inventore error at reiciendis dolorem ab maiores illum repudiandae, suscipit dolores voluptatum unde, explicabo laborum commodi accusantium doloremque? Excepturi, repellat nostrum!</p>
    </div>
    </div>
</div>
</div>
@endsection