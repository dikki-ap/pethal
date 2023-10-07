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
                        <span data-feather="archive"></span>&nbsp; Product &nbsp;<i class="bi bi-caret-down-fill me-3"></i></span>
                    </button>
                    <div id="personnel-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal small">
                            <li>
                                <a href="/admin/product" class="sideBar-link" id="{{ Request::is('admin/product') ? 'sideBar-KList' : '' }}">
                                    <span data-feather="list"></span>&nbsp; Product List
                                </a>
                            </li>
                            <li>
                                <a href="/admin/product-type" class="sideBar-link" id="{{ Request::is('admin/product-type*') ? 'sideBar-KList' : '' }}">
                                    <span data-feather="grid"></span>&nbsp; Product Type
                                </a>
                            </li>
                            <li>
                                <a href="/admin/product-image" class="sideBar-link" id="{{ Request::is('admin/product-image*') ? 'sideBar-KList' : '' }}">
                                    <span data-feather="image"></span>&nbsp; Product Image
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>

            {{-- Service Type --}}
            <div class="p-2">
                <a href="/admin/service-type" class="sideBar-link" id="{{ Request::is('admin/service-type*') ? 'sideBar-KList' : '' }}">
                    <span data-feather="git-merge"></span>&nbsp; Service Type
                </a>
            </div>

            {{-- Pet Type --}}
            <div class="p-2">
                <a href="/admin/pet-type" class="sideBar-link" id="{{ Request::is('admin/pet-type*') ? 'sideBar-KList' : '' }}">
                    <span data-feather="github"></span>&nbsp; Pet Type
                </a>
            </div>

            {{-- Payment Type --}}
            <div class="p-2">
                <a href="/admin/payment-type" class="sideBar-link" id="{{ Request::is('admin/payment-type*') ? 'sideBar-KList' : '' }}">
                    <span data-feather="dollar-sign"></span>&nbsp; Payment Type
                </a>
            </div>

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