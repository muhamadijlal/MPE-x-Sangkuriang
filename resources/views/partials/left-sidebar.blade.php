<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="icon-layout menu-icon"></i>
          <span class="menu-title">Master</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.sparepart.index') }}">Sparepart</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.transaksi.index') }}">Transaksi</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.jasa.index') }}">Jasa</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.role.index') }}">Role</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.karyawan.index') }}">Karyawan</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="icon-paper menu-icon"></i>
          <span class="menu-title">Laporan / Pembukuan</span>
        </a>
      </li>
    </ul>
  </nav>