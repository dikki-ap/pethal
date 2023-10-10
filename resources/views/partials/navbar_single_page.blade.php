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
    <!-- Navbar End --->