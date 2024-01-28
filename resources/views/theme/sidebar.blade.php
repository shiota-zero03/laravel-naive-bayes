<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="{{ route('admin.home') }}" class="app-brand-link">
      <span class="app-brand-logo demo">
        <img src="{{ asset('') }}assets/images/logo.png" alt="" width="50">
      </span>
      <span class="app-brand-text demo menu-text fw-bolder ms-2 text-uppercase">UNSURYA</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <li class="menu-item" id="home-menu">
      <a 
        href="{{ route('admin.home') }}" 
        class="menu-link">
        <i class="menu-icon tf-icons bx bxs-home"></i>
        <div data-i18n="Beranda">Beranda</div>
      </a>
    </li>
    <li class="menu-item" id="dashboard-menu">
      <a 
        href="{{ route('admin.dashboard') }}" 
        class="menu-link">
        <i class="menu-icon tf-icons bx bxs-pie-chart-alt-2"></i>
        <div data-i18n="Dashboard">Dashboard</div>
      </a>
    </li>
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">APPS</span>
    </li>
    <li class="menu-item" id="manajemen-admin">
      <a 
        href="{{ route('admin.management.index') }}" 
        class="menu-link">
        <i class="menu-icon tf-icons bx bxs-user-account"></i>
        <div data-i18n="Manajemen Admin">Manajemen Admin</div>
      </a>
    </li>
    <li class="menu-item" id="dataset">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-data"></i>
        <div data-i18n="Dataset">Dataset</div>
      </a>

      <ul class="menu-sub">
        <li class="menu-item" id="training">
          <a href="{{ route('admin.training.index') }}" class="menu-link">
            <div data-i18n="Data Training">Data Training</div>
          </a>
        </li>
        <li class="menu-item" id="testing">
          <a href="{{ route('admin.testing.index') }}" class="menu-link">
            <div data-i18n="Data Testing">Data Testing</div>
          </a>
        </li>
      </ul>
    </li>
    
    <li class="menu-item" id="naive-bayes">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-bulb"></i>
        <div data-i18n="Naive Bayes">Naive Bayes</div>
      </a>

      <ul class="menu-sub">
        <li class="menu-item" id="probability">
          <a href="{{ route('admin.probability.index') }}" class="menu-link">
            <div data-i18n="Probabilitas">Probabilitas</div>
          </a>
        </li>
        <li class="menu-item" id="classification">
          <a href="{{ route('admin.classification.index') }}" class="menu-link">
            <div data-i18n="Hasil Klasifikasi">Hasil Klasifikasi</div>
          </a>
        </li>
      </ul>
    </li>

    <li class="menu-item" id="perform-menu">
      <a 
        href="{{ route('admin.perform.index') }}" 
        class="menu-link">
        <i class="menu-icon tf-icons bx bx-line-chart"></i>
        <div data-i18n="Performa">Performa</div>
      </a>
    </li>
    
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Profile</span>
    </li>

    <li class="menu-item" id="profil">
      <a 
        href="{{ route('admin.profile.index') }}" 
        class="menu-link">
        <i class="menu-icon tf-icons fas fa-gears"></i>
        <div data-i18n="Profil">{{ auth()->user()->name }}</div>
      </a>
    </li>
    <li class="menu-item" id="logout">
      <a href="{{ route('logout.process') }}" class="menu-link bg-danger text-white">
        <i class="menu-icon tf-icons fas fa-power-off"></i>
        <div data-i18n="logout">Logout</div>
      </a>
    </li>
  </ul>
</aside>