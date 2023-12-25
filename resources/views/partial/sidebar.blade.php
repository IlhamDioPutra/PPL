<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 bg-slate-900 fixed-start " id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand d-flex align-items-center m-0" style="padding-left: 30px;">
            <img src="../../../../assets/img/medical.png" alt="Icon" class="mr-2" />
            <span class="font-weight-bold text-lg">E-Financial FKIK</span>
        </a>
    </div>
    <div class="collapse navbar-collapse px-0 py-0 w-auto h-auto" id="sidenav-collapse-main" style="border-top-style: solid;border-top-width: 0px;margin-top: -40px;">
        <div class="side-bar">
            <div class="menu">
              <div class="item">
                <a href="{{ route('dashboard') }}"><i class="fas fa-desktop"></i>Dashboard</a>
              </div>
              <div class="item">
                <a class="sub-btn"><i class="fas fa-user"></i>Manajemen RBA<i class="fas fa-angle-right dropdown"></i>
                <div class="sub-menu">
                    <a href="{{ route('RBA.DaftarKegiatan.index') }}" class="sub-item">Daftar Kegiatan</a>
                    <a href="{{ route('RBA.RekapAjuanKegiatan.index') }}" class="sub-item">Rencana Kegiatan</a>
                    <a href="{{ route('RBA.RekapitulasiKegiatan.index') }}" class="sub-item">Rekapitulasi Kegiatan</a>
                    <a href="{{ route('RBA.RekapitulasiAkhir.index') }}" class="sub-item">Rekapitulasi Akhir</a>
                  </div>
                </div>
              <div class="item">
                <a class="sub-btn"><i class="fas fa-user"></i>Manajemen TUP<i class="fas fa-angle-right dropdown"></i></a>
                <div class="sub-menu">
                  <a href="{{ route('TUP.SpjBelanjaTup.index') }}" class="sub-item">SPJ Belanja</a>
                  <a href="{{ route('Tup.RincianTup.index') }}" class="sub-item">Daftar Rincian</a>
                </div>
              </div>
              <div class="item">
                <a class="sub-btn"><i class="fas fa-user"></i>Manajemen GUP<i class="fas fa-angle-right dropdown"></i></a>
                <div class="sub-menu">
                  <a href="{{ route('GUP.SpjBelanjaGup.index') }}"  class="sub-item">SPJ Belanja</a>
                  <a href="{{ route('Gup.RekapKinerjaUpk.index') }}" class="sub-item">Rekap Kinerja UPK</a>
                </div>
              </div>
          </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
          //jquery for toggle sub menus
          $(".sub-btn").click(function () {
            $(this).next(".sub-menu").slideToggle();
            $(this).find(".dropdown").toggleClass("rotate");
          });

          $(".side-bar").addClass("active");
        });
      </script>
       <style>
        /* ... (gayakan CSS lainnya) ... */

        .side-bar .menu .item a.active {
            background: #8621f8;
        }
    </style>
</aside>

<style>

    .side-bar.active {
      left: 0;
    }

    .side-bar .menu {
      width: 100%;
      margin-top: 80px;
    }

    .side-bar .menu .item {
      position: relative;
      cursor: pointer;
    }

    .side-bar .menu .item a {
      color: #fff;
      font-size: 16px;
      text-decoration: none;
      display: block;
      padding: 5px 30px;
      line-height: 60px;
    }

    .side-bar .menu .item a:hover {
      background: #8621f8;
      transition: 0.3s ease;
    }

    .side-bar .menu .item i {
      margin-right: 15px;
    }

    .side-bar .menu .item a .dropdown {
      position: absolute;
      right: 0;
      margin: 20px;
      transition: 0.3s ease;
    }

    .side-bar .menu .item .sub-menu {
      background: rgba(255, 255, 255, 0.1);
      display: none;
    }

    .side-bar .menu .item .sub-menu a {
      padding-left: 30px;
    }

    .rotate {
      transform: rotate(90deg);
    }



</style>
