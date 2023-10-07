<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    {{-- Boostrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sen&display=swap" rel="stylesheet">

    {{-- Custom CSS --}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >

    {{-- Favicon --}}
    <link rel="shortcut icon" href="/img/favicon.png" type="image/png">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Sundanese:wght@400;500&display=swap');
        
        #container-1  {
          height: 630px;
          background-image: url('img/wave.png');
          background-size: cover;
        }
        .col-lg-6 .tombol {
          padding: 6px 13px;
        }
    </style>

    <title>PetHal | {{ $title }}</title>
  </head>
  <body>
    @include('partials.navbar')

    <div class="container-fluid" id="container-1">
        {{-- Menentukan dengan nama 'container' untuk digunakan di child view yang lainnya dengan @section('') --}}
        @yield('container')
    </div>

    <div class="container-fluid">
        {{-- Menentukan dengan nama 'container' untuk digunakan di child view yang lainnya dengan @section('') --}}
        @yield('container-2')
    </div>

    <section id="about" class="get-started section-bg">
        @yield('section-get-started')
    </section>

    <div class="container-fluid">
        {{-- Menentukan dengan nama 'container' untuk digunakan di child view yang lainnya dengan @section('') --}}
        @yield('container-3')
    </div>

    <footer>
        <div class="footer">
          <hr/>
          <p class="text-center">2023 All Rights Reserved by <a href="/" id="footer-credit">PetHal</a></p>
        </div>
      </footer>
    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>