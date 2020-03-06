<!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">



          <!-- Sidebar Toggle (Topbar) -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center ml-5">
              <div class="sidebar-brand-icon">
                <i class="fas fa-book"></i>
              </div>
              <div class="sidebar-brand-text mx-2">Toko Buku Bandung</div>
            </a>

          
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            

           <!-- Nav Item - Messages -->
            <?php if (!$this->session->userdata('email')): ?>

              <li class="nav-item dropdown no-arrow mx-1">
                <a href="<?= BASE_URL('Auth/Register'); ?>" class="btn btn-outline-primary">Buat akun</a>
                <a href="<?= BASE_URL('Auth/index'); ?>" class="btn btn-outline-success ml-2">Masuk</a>
              </li>

            <?php else: ?>

              <!-- Nav Item - Messages -->
              <?php if (!$num_pemesanan): ?>
                <li class="nav-item dropdown no-arrow mx-2">
                  <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-shopping-cart"></i>
                  </a>
                  <!-- Dropdown - Messages -->
                  <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                    <h6 class="dropdown-header">
                      Pesanan
                    </h6>
                    <a class="dropdown-item d-flex align-items-center" href="">
                      Tidak Ada Pesanan
                    <a class="dropdown-item text-center small text-gray-500">Close</a>
                  </div>
                </li>
              <?php else: ?>
                <li class="nav-item dropdown no-arrow mx-1">
                  <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-shopping-cart"></i>
                    <!-- Counter - Messages -->
                    <span class="badge badge-danger badge-counter"><?= $num_pemesanan ?></span>
                  </a>
                  <!-- Dropdown - Messages -->
                  <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                    <h6 class="dropdown-header">
                      Pesanan
                    </h6>
                    <?php $i = 1; ?>
                    <?php foreach ($data_pemesanan as $pemesanan): ?>
                      <a class="dropdown-item d-flex align-items-center pl-3" href="<?= BASE_URL('User/pembayaran/') . $pemesanan['pemesanan_id'] ?>">
                        <div class="dropdown-list-image mr-3">
                          <img class="" src="<?= BASE_URL('assets/img/buku/') . $pemesanan['image'] ?>" alt="">
                          <div class="status-indicator bg-success"></div>
                        </div>
                        <div class="font-weight-bold">
                          <div class="text-truncate"><?= $pemesanan['nama_buku'] ?>.</div>
                          <div class="small text-gray-500 ">
                            <?php if ($pemesanan['is_success'] == 3 ): ?>
                              Belum Dibayar
                            <?php elseif ($pemesanan['is_success'] == 2) : ?>
                              Sedang Menunggu Konfirmasi Dari Admin
                            <?php elseif ($pemesanan['is_success'] == 1) : ?>
                              Pembayaran Selesai, Pesanan Akan Datang
                            <?php elseif ($pemesanan['is_success'] == 4) : ?>
                              Pembayaran Gagal, Harap Hubungi Admin
                            <?php endif; ?>
                          </div>
                        </div>
                      </a>
                    <?php endforeach ?>
                    
                    <a class="dropdown-item text-center small text-gray-500">Close</a>
                  </div>
                </li>
              <?php endif ?>
            

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

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user_data['nama_user'] ?> (<?= $user_data['role_name'] ?>)</span>
                <img class="img-profile rounded-circle" src="<?= BASE_URL('assets/img/profile/default.png'); ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                <?php if ($user_data['role_id'] == 1 && $this->uri->segment(1) != 'Data'): ?>
                  <a class="dropdown-item" href="<?= BASE_URL('Admin/index'); ?>">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Admin Menu
                  </a>
                  
                  <div class="dropdown-divider"></div>
                <?php endif ?>
                
                
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          <?php endif; ?>

          </ul>

        </nav>
        <!-- End of Topbar -->