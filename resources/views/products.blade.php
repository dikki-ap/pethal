<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    {{-- Boostrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    {{-- Swiper JS --}}
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
    />

    {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sen&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet" />

    {{-- Custom CSS --}}
    <link href="{{ asset('../../css/style.css') }}" rel="stylesheet" type="text/css" >

    {{-- Favicon --}}
    <link rel="shortcut icon" href="/img/favicon.png" type="image/png">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Sundanese:wght@400;500&display=swap');
        .col-lg-6 .tombol {
          padding: 6px 13px;
        }
    </style>

    <title>PetHal | {{ $title }}</title>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg p-2">
        <div class="container">
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarScroll"
            aria-controls="navbarScroll"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul
            class="navbar-nav my-2 my-lg-0 navbar-nav-scroll">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../products">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../services"
                >Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../articles">Articles</a>
            </li>
            </ul>
            <a href="../" class="mx-auto"><img src="../img/navbar_icon.jpg" class="img-fluid" width="143" alt="Logo" /></a>
            <ul
            class="navbar-nav my-2 my-lg-0 navbar-nav-scroll">
            @if (Auth::guard()->check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" style="margin-top: 4px;" data-bs-toggle="dropdown" aria-expanded="false">
                            <span>
                                <i class="bi bi-person-fill"></i> &nbsp;
                                {{ Auth::user()->name }}
                            </span>
                            
                        </a>
                        <ul class="dropdown-menu">
                            @if (Auth::user()->role == 'Admin')
                            <li><a class="dropdown-item" href="/admin/product"><i class="bi bi-clipboard2-data-fill"></i></i>&nbsp; Dashboard</a></li>
                            @endif
                            <li><a class="dropdown-item" href="/user/payments"><i class="bi bi-gear"></i>&nbsp; Setting</a></li>
                            <li>
                                <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item" style="color: #a52b2a"><i class="bi bi-box-arrow-right"></i>&nbsp; Logout</button>
                            </li>
                        {{-- <li><a class="dropdown-item" href="/logout" style="color: crimson;"><i class="bi bi-box-arrow-left"></i>&nbsp; Logout</a></li> --}}
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="btn btn-light tombolsign" aria-current="page" href="/register">Sign Up</a>
                    </li>
            @endif
            
            </ul>
        </div>
        </div>
    </nav>

{{-- End of Pagination --}}
<!-- Navbar End --->
        @if ($productCount > 0)
            <div class="container mt-5">
                <div class="row">
                    @foreach ($products as $product)
                    <div class="col d-flex justify-content-start my-5">
                        <div class="card">
                            @if ($product->galleries->isNotEmpty())
                                @php $firstImageUrl = $product->galleries->first()->url; @endphp
                                <a href="/products/{{ $product->id }}" class="text-center"><img src="{{ $firstImageUrl }}" alt="Image" class="img-fluid" width="300"></a> 
                                
                            @endif
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <h6 class="card-text"><i class="bi bi-box"></i></i> &nbsp; Category: {{ $product->product_type->name }}</h6>
                                <h6 class="card-text"><i class="bi bi-tags-fill"></i> &nbsp; Rp. {{ $product->price }}</h6>
                                <a href="/products/{{ $product->id }}" class="btn btn-primary" style="background-color: #4dab6e; border-color: #FEF5ED">Read More</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{-- Pagination --}}
                <div class="container">
                    <div class="d-flex justify-content-start">
                        {{ $products->links( ) }}
                    </div>
                </div>
            
            </div>
        @else
            <div class="container mt-5">
                <h1>Currently there's no product</h1>
            </div>
        @endif
    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    {{-- Feather Icons --}}
    <script src="https://unpkg.com/feather-icons"></script>

    {{-- Swiper JS --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <script>
        function confirmAndSubmit(event) {
            if (confirm('Are you sure you want to delete this image?')) {
                event.preventDefault(); // Prevent the default form submission
                event.target.closest('form').submit(); // Manually submit the form
            }
        }
        
        document.addEventListener('trix-file-accept', function (e){
            e.preventDefault();
        })

		feather.replace()

        const swiper = new Swiper('.swiper', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // And if we need scrollbar
            scrollbar: {
                el: '.swiper-scrollbar',
            },
        });
    </script>
  </body>
</html>