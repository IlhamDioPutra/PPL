<nav class="navbar navbar-main navbar-expand-lg mx-5 px-0 shadow-none rounded" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-1 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Dashboard</a></li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
            </ol>
            <h6 class="font-weight-bold mb-0">Dashboard</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center"></div>
            <div class="mb-0 font-weight-bold breadcrumb-text text-white">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="login" onclick="event.preventDefault(); this.closest('form').submit();">
                        <button class="btn btn-sm btn-white mb-0 me-1" type="submit">Keluar</button>
                    </a>
                </form>
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
                            <li class="dropdown">
                                <a class="dropdown-item border-radius-md" href="javascript:;" id="toggleDarkMode" onclick="toggleDarkMode()">
                                    <i class="fa fa-moon opacity-6 me-1"></i>
                                    Ganti Mode
                                </a>
                                <div class="d-flex">
                                    <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-slate-900" onclick="sidebarType(this)">Dark</button>
                                    <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
                                </div>
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
        document.getElementById('toggleDarkMode').addEventListener('click', function() {
            toggleDarkMode();
        });

        // Cek apakah mode terang/gelap tersimpan di localStorage
        const savedMode = localStorage.getItem('themeMode');
        const body = document.body;

        if (savedMode) {
            // Terapkan mode yang tersimpan saat halaman dimuat
            body.classList.add(savedMode);
        } else {
            // Jika tidak ada status mode, tentukan mode default (misalnya, terang)
            body.classList.add('light-mode');
        }
    });

    function toggleDarkMode() {
        // Tambahkan logika untuk mengganti mode terang/gelap di sini
        const body = document.body;
        body.classList.toggle('dark-mode');
        body.classList.toggle('light-mode');

        // Simpan status mode ke localStorage
        const isDarkMode = body.classList.contains('dark-mode');
        localStorage.setItem('themeMode', isDarkMode ? 'dark-mode' : 'light-mode');
    }
</script>