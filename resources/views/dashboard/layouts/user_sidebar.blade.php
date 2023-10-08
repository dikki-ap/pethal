<!-- Start of Sidebar -->
<div class="col-sm-4 col-md-3 col-lg-2">
    <div class="row">
        <div class="col d-flex justify-content-center p-4">
            <a href="/"><img src="/img/logo.jpg" alt="KostKu Logo" width="200" class="img-fluid" /></a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <button class="navbar-toggler p-3 d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-filter-left me-2"></i>
            </button>
        </div>
    </div>

    <hr />
    <div class="row" id="sidebarMenu">
        <div class="d-flex flex-column">

            {{-- Material --}}
            <ul class="list-unstyled p-2">
                <li>
                    <button id="btnSideBar-Personnel" class="btn btn-toggle mt-3 align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#personnel-collapse" aria-expanded="true">
                        <span data-feather="info"></span>&nbsp; Information &nbsp;<i class="bi bi-caret-down-fill me-3"></i></span>
                    </button>
                    <div id="personnel-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal small">
                            <li>
                                <a href="/user/services" class="sideBar-link" id="{{ Request::is('user/services*') ? 'sideBar-KList' : '' }}">
                                    <span data-feather="git-merge"></span>&nbsp; Services
                                </a>
                            </li>
                            <li>
                                <a href="/user/transactions" class="sideBar-link" id="{{ Request::is('user/transactions*') ? 'sideBar-KList' : '' }}">
                                    <span data-feather="shopping-cart"></span>&nbsp; Transactions
                                </a>
                            </li>
                            <li>
                                <a href="/user/payments" class="sideBar-link" id="{{ Request::is('user/payments*') ? 'sideBar-KList' : '' }}">
                                    <span data-feather="dollar-sign"></span>&nbsp; Payment Type
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            
            {{-- Logout --}}
            <div class="p-2">
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="sideBar-link rounded border-0" id="sideBar-Logout" style="background-color: white"><span data-feather="log-out"></span>&nbsp; Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Sidebar -->