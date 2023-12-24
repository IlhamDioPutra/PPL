<nav class="navbar navbar-main navbar-expand-lg mx-5 px-0 shadow-none rounded" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-2">
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center"></div>
            <div class="mb-0 font-weight-bold breadcrumb-text text-white">
                
            </div>
            <ul class="navbar-nav justify-content-end">
                <!-- ... Bagian lain dari navbar ... -->
                <li class="nav-item dropdown pe-2 d-flex align-items-center">
                    <div class="position-relative" style="z-index: 2;">
                        <a href="javascript:;" class="nav-link text-body p-0" id="profileDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="../../../../assets/img/Admin-icon.png" class="avatar avatar-sm" alt="avatar" />
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4"
                            aria-labelledby="profileDropdown">
                            <!-- Tambahkan menu untuk setting profil dan mode terang/gelap -->
                            <li class="mb-2">
                                {{-- <a class="dropdown-item border-radius-md" href="{{ route('users.profile') }}" id="profileSettings"> --}}
                                    <i class="fa fa-cog opacity-6 me-1"></i>
                                    Pengaturan Profil
                                </a>
                            </li>
                            <li class="mb-2 d-flex" >
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="login" onclick="event.preventDefault(); this.closest('form').submit();">
                                        <button class="btn btn-sm btn-white mb-0 me-1" type="submit">
                                        Keluar
                                        <i class="fa fa-sign-out me-1"></i></button>
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
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

        // Fungsi untuk menangani klik pada ikon mode terang/gelap
    });

</script>