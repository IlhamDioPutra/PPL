<nav class="navbar navbar-main navbar-expand-lg mx-5 px-0 shadow-none rounded" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-2">
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-left">
                <span class="navbar-text ms-2" style="color: #888; margin-right: 1380px;">@yield('pageTitle', 'Dashboard')</span>
            </div>
            <ul class="navbar-nav justify-content-end">
                <!-- ... Bagian lain dari navbar ... -->
                <li class="nav-item dropdown pe-2 d-flex align-items-center">
                    <div class="position-relative d-flex flex-column align-items-center" style="z-index: 2;">
                        <a href="javascript:;" class="nav-link text-body p-0" id="profileDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="avatar avatar-sm rounded-circle border">
                                <img src="../../../../assets/img/Admin-icon.png" class="avatar-img" alt="avatar" />
                            </div>
                        </a>
                        <span class="text-center mt-1 small">Admin</span>
                        <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4"
                            aria-labelledby="profileDropdown">
                            <li class="mb-2">
                                <a class="dropdown-item border-radius-md" href="{{ route('users.profile') }}" id="profileSettings" style="padding-left: 4px;">
                                <i class="fa fa-cog opacity-6 me-1"></i>
                                Pengaturan Profil
                            </a>
                            </li>
                            <li class="mb-2">
                                <form method="POST" action="{{ route('logout') }}" id="logoutForm">
                                    @csrf
                                    <a class="dropdown-item border-radius-md" href="#" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();" style="padding-left: 4px;">
                                        <i class="fa fa-sign-out opacity-6 me-1"></i>
                                        Keluar
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Fungsi untuk menangani klik pada ikon profil
        document.getElementById('profileSettings').addEventListener('click', function() {
            // Ganti dengan logika yang sesuai untuk menampilkan pengaturan profil
            console.log('Pengaturan Profil diklik');
        });

    });
</script>
