<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <i class="fas fa-book"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Toko Buku</div>
      </a>

      

      <?php if ($user_data['role_id'] == 1): ?>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <div class="sidebar-heading mb-1">
          Admin Menu
      </div>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= BASE_URL('Admin/index'); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>        
      
  
      <hr class="sidebar-divider">

      <div class="sidebar-heading mb-1">
          Master Data
      </div>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link py-0 mt-3" href="<?= BASE_URL('Data/index'); ?>">
          <i class="fas fa-fw fa-book"></i>
          <span>Data Buku</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link py-0 mt-3" href="<?= BASE_URL('Data/user'); ?>">
          <i class="fas fa-fw fa-user"></i>
          <span>Data User</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="<?= BASE_URL('Data/laporan'); ?>">
          <i class="fas fa-fw fa-bullhorn"></i>
          <span>Laporan</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <div class="sidebar-heading mb-1">
          Info Pemesanan
      </div>

      <!-- Nav Item - Tables -->
      <li class="nav-item py-0">
        <a class="nav-link" href="<?= BASE_URL('info/index'); ?>">
          <i class="fas fa-fw fa-bell"></i>
          <span>Pemesanan Masuk</span></a>
      </li>

      <?php endif; ?>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Nav Item - Tables -->
      <li class="nav-item mb-3">
        <a class="nav-link py-0" href="<?= BASE_URL('User/index'); ?>">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Keluar</span></a>
      </li>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->