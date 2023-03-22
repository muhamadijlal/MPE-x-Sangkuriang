<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      @if (Auth::user()->role == 'admin')
      <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('admin.dashboard.index')}}">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      @else
      <li class="nav-item {{ request()->routeIs('user.dashboard') ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('user.dashboard.index')}}">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      @endif
      <li class="nav-item {{ request()->routeIs('admin.sparepart.*') || request()->routeIs('admin.transaksi.*') || request()->routeIs('admin.jasa.*') || request()->routeIs('admin.role.*') || request()->routeIs('admin.karyawan.*') ? 'active' : ''}}">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="icon-layout menu-icon"></i>
          <span class="menu-title">Master</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse {{ request()->routeIs('admin.sparepart.*') || request()->routeIs('admin.transaksi.*') || request()->routeIs('admin.jasa.*') || request()->routeIs('admin.role.*') || request()->routeIs('admin.karyawan.*') ? 'show' : ''}}" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ Auth::user()->role == 'admin' ? route('admin.transaksi.index') : route('user.transaksi.index') }}">Transaksi</a></li>
            @if(Auth::user()->role == 'admin')
            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.sparepart.index') }}">Sparepart</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.jasa.index') }}">Jasa</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.role.index') }}">Role</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.karyawan.index') }}">Karyawan</a></li>
            {{-- <li class="nav-item"> <a class="nav-link" href="{{ route('admin.operasional.index') }}">Operasional</a></li> --}}
            @endif
          </ul>
        </div>
      </li>
      @if (Auth::user()->role == 'admin')
      <li class="nav-item {{ request()->routeIs('admin.laporan.*') ? 'active' : ''}}">
        <a class="nav-link" href="#laporan" data-toggle="collapse" aria-expanded="false" aria-controls="laporan">
          <i class="icon-paper menu-icon"></i>
          <span class="menu-title">Laporan</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse {{ request()->routeIs('admin.laporan.*') ? 'show' : ''}}" id="laporan">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.laporan.laporan') }}">Laporan</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.laporan.hari') }}">Laporan Hari Ini</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.laporan.bulan') }}">Laporan Bulan Ini</a></li>
          </ul>
        </div>
      </li>
      @endif
    </ul>
  </nav>