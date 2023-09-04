<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-gradient-dark text-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <form action="{{ route("select_date.process") }}" method="POST" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        @csrf
        <div class="input-group">
            <input type="hidden" name="url" value="{{ url()->current() }}" readonly>
            <input type="date" class="form-control bg-danger text-white border-0 small" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2" value="{{ session("date") }}" name="date" onchange="this.form.submit()" required>
        </div>
    </form>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
    <li class="nav-item dropdown no-arrow d-sm-none">
        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-search fa-fw"></i>
        </a>

        <!-- Dropdown - Messages -->
        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
            <form class="form-inline mr-auto w-100 navbar-search">
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
            </form>
        </div>
    </li>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-white">{{ Auth()->user()->name }} ({{ Auth()->user()->role->name }})</span>
                <img class="img-profile rounded-circle" src="/admin/img/undraw_profile.svg">
        </a>

        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

            @if(Auth()->user()->role_id == 1)

            <a class="dropdown-item" href="{{ route("role.index") }}">
                <i class="fas fa-door-open fa-sm fa-fw mr-2 text-dark"></i> {{ ucfirst("hak Akses") }}
            </a>

            <a class="dropdown-item" href="{{ route("user.index") }}">
                <i class="fas fa-users fa-sm fa-fw mr-2 text-dark"></i> {{ ucfirst("pengguna") }}
            </a>

            @endif

            <a class="dropdown-item" href="{{ route("change_password") }}">
                <i class="fas fa-key fa-sm fa-fw mr-2 text-dark"></i> Ganti Password
            </a>

            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-dark"></i> Logout
            </a>
        </div>
    </li>

    </ul>

</nav>
<!-- End of Topbar -->
