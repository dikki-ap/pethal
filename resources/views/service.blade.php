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
                        {{-- <li>
                            <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item" style="color: #a52b2a"><i class="bi bi-box-arrow-right"></i>&nbsp; Logout</button>
                        </li> --}}
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
<!-- Navbar End --->
    <div class="container-fluid mt-5">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h2 class="mb-3" style="color: #4dab6e">{{ $service->name }}</h2>
                <h6 class="card-text"><i class="bi bi-tags-fill"></i> &nbsp; Rp. {{ $service->price }}</h6>
                <hr>
    
                {{-- Swiper Galleries --}}
                <div class="swiper text-center">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide">
                        <img src="../img/services.png" class="img-fluid rounded-3 mb-5" width="700">
                    </div>

                    
    
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>
                
                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev" style="color: #4dab6e"></div>
                    <div class="swiper-button-next" style="color: #4dab6e"></div>
                </div>
                {{-- End of Swiper Galleries --}}
    
                <hr>
    
                <h4 class="mb-3" style="color: #4dab6e">Description</h4>
    
                {{-- Menggunakan >> {!!  !!} Dikarenakan bisa saja di dalam artikel terdapat TAG HTML --}}
                {{-- Menggunakan >> {{  }} terdapat htmlspesialchars() untuk menghindari penggunaan TAG HTML di dalamnya --}}
                {{-- SESUAIKAN DENGAN KONDISI --}}
                <article class="my-3 fs-5">
                    <p>{!! $service->description !!}</p>
                </article>
    
                <div class="row text-center mt-5">
                    <div class="col">
                        <a href="/services" class="btn btn-primary border-0" style="background-color: #4dab6e; border-color: #FEF5ED"><span data-feather="chevrons-left"></span>&nbsp; Back</a>
                    </div>
                    @if (Auth::check())
                    <div class="col">
                        <!-- Button Add Image Modal -->
                    <button type="button" class="badge border-0" data-bs-toggle="modal" data-bs-target="#addImage-{{ $service->id }}" style="background-color: #4dab6e; font-size: 1rem">
                            <span data-feather="plus-circle"></span> Book Service
                        </button>

                        <!-- Add Image Modal -->
                        <div class="modal fade" id="addImage-{{ $service->id }}" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Book <span class="fw-bold" style="color: #4dab6e">{{ $service->name }}</span></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <form action="/user/services" method="POST" enctype="multipart/form-data" class="mb-5">
                                                @csrf
                                                <input type="hidden" name="service_id" id="service_id" value="{{ $service->id }}">
                                                <input type="hidden" name="total" id="total" value="{{ $service->price }}">
                                                <input type="hidden" name="service_date" id="service_date" value="{{ $service_date }}">

                                                <div class="mb-3">
                                                    <input type="text" name="service_name" class="form-control" id="service_name" readonly value="{{ $service->name }}">
                                                </div>

                                                {{-- Pet Type --}}
                                                <div class="form-floating">
                                                    <select class="form-select @error('pet_type_id')
                                                    is-invalid
                                                @enderror" name="pet_type_id" required>
                                                @error('pet_type_id')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                @enderror
                                                    {{-- Looping Pet Kategori --}}
                                                    @foreach ($pet_types as $pet_type)
                                                        <option value="{{ $pet_type->id }}">{{ $pet_type->name }}</option>
                                                    @endforeach
                                                </select>
                                                    <label for="name">Pet Type</label>
                                                </div>

                                                @if($service->isNeedDoctor == 1)
                                                    {{-- Doctor --}}
                                                    <div class="form-floating">
                                                        <select class="form-select @error('doctor_id')
                                                        is-invalid
                                                    @enderror" name="doctor_id" required>
                                                    @error('doctor_id')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                    @enderror
                                                        {{-- Looping Pet Kategori --}}
                                                        @foreach ($doctors as $doctor)
                                                            <option value="{{ $doctor->id }}">{{ $doctor->name }} - @foreach($doctor->schedules as $schedule)
                                                                {{ $schedule->day->name }}
                                                            @endforeach</option>
                                                        @endforeach
                                                    </select>
                                                        <label for="name">Doctor</label>
                                                    </div>
                                                @else
                                                <input type="hidden" name="doctor_id" id="doctor_id" value="0">
                                                @endif

                                                

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
                                                    @foreach ($payments as $payment)
                                                        <option value="{{ $payment->payment_type->id }}">{{ $payment->payment_type->name }}</option>
                                                    @endforeach
                                                </select>
                                                    <label for="name">Payment Type</label>
                                                </div>

                                                <div class=" mt-3 text-center">
                                                    <button type="submit" class="btn btn-primary border-0" style="background-color: #4dab6e; border-color: #FEF5ED"><span data-feather="plus-circle"></span>&nbsp; Book Service</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End of Add Image Modal --}}
                    </div>
                    @endif
                </div>
                
            </div>
        </div>
    </div>

    <footer>
        <div class="footer">
          <hr/>
          <p class="text-center">2023 All Rights Reserved by <a href="/" id="footer-credit">PetHal</a></p>
        </div>
      </footer>
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