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

    <title>PetHal | {{ $title }}</title>
  </head>
  <body>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#4dab6e" fill-opacity="1" d="M0,128L21.8,149.3C43.6,171,87,213,131,224C174.5,235,218,213,262,186.7C305.5,160,349,128,393,96C436.4,64,480,32,524,21.3C567.3,11,611,21,655,53.3C698.2,85,742,139,785,176C829.1,213,873,235,916,213.3C960,192,1004,128,1047,112C1090.9,96,1135,128,1178,149.3C1221.8,171,1265,181,1309,186.7C1352.7,192,1396,192,1418,192L1440,192L1440,0L1418.2,0C1396.4,0,1353,0,1309,0C1265.5,0,1222,0,1178,0C1134.5,0,1091,0,1047,0C1003.6,0,960,0,916,0C872.7,0,829,0,785,0C741.8,0,698,0,655,0C610.9,0,567,0,524,0C480,0,436,0,393,0C349.1,0,305,0,262,0C218.2,0,175,0,131,0C87.3,0,44,0,22,0L0,0Z"></path></svg>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card rounded-3 shadow p-3">
                    <a href="/"><img src="/img/logo.jpg" class="img-fluid mx-auto d-block" width="200" alt="PetHal Logo"></a>
                    <div class="card-body">
                      <h3 class="card-title text-center mb-5" style="color: #4dab6e">{{ $title }}</h3>

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

                        {{-- Form Login --}}
                      <form action="/login" method="POST">
                        @csrf

                        {{-- E-mail --}}
                        <div class="form-floating">
                            <input type="email" name="email" class="form-control @error('email')
                                is-invalid
                            @enderror" id="email" placeholder="email@example.com" autofocus required value="{{ old('email') }}">
                            <label for="email">E-mail</label>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div class="form-floating">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                            <label for="password">Password</label>
                        </div>
                    
                        <button class="w-100 btn btn-lg btn-primary border-0 mt-3" type="submit" style="background-color: #4dab6e"><span data-feather="log-in"></span>&nbsp; Login</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#4dab6e" fill-opacity="1" d="M0,64L21.8,58.7C43.6,53,87,43,131,85.3C174.5,128,218,224,262,266.7C305.5,309,349,299,393,256C436.4,213,480,139,524,138.7C567.3,139,611,213,655,202.7C698.2,192,742,96,785,90.7C829.1,85,873,171,916,218.7C960,267,1004,277,1047,245.3C1090.9,213,1135,139,1178,117.3C1221.8,96,1265,128,1309,117.3C1352.7,107,1396,53,1418,26.7L1440,0L1440,320L1418.2,320C1396.4,320,1353,320,1309,320C1265.5,320,1222,320,1178,320C1134.5,320,1091,320,1047,320C1003.6,320,960,320,916,320C872.7,320,829,320,785,320C741.8,320,698,320,655,320C610.9,320,567,320,524,320C480,320,436,320,393,320C349.1,320,305,320,262,320C218.2,320,175,320,131,320C87.3,320,44,320,22,320L0,320Z"></path></svg>

    {{-- Feather Icons --}}
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        feather.replace()
    </script>
    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>