<body class="bg-login">
  <div class="container centered">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="flashdatadanger" data-flashdatadanger="<?= $this->session->flashdata('danger') ?>"></div>
      <div class="flashdatasuccess" data-flashdatasuccess="<?= $this->session->flashdata('success') ?>"></div>

      <div class="col-xl-7 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">              
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class=" text-primary-900 mb-4">Daftar Akun Mu Sekarang.</h1>
                  </div>
              <form class="user" method="post" action="">
                <div class="form-group row">
                  <div class="col mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="nama"  placeholder="Nama Lengkap"
                    value="<?= set_value('nama') ?>">
                    <?= form_error('nama', '<small class="text-danger ml-2">', '</small>'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="email" placeholder="Masukan Email Disini..." value="<?= set_value('email') ?>">
                  <?= form_error('email', '<small class="text-danger ml-2">', '</small>'); ?>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                    <?= form_error('password', '<small class="text-danger ml-2">', '</small>'); ?>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" name="confirm_password" id="exampleRepeatPassword" placeholder="Ulang Password">
                    <?= form_error('confirm_password', '<small class="text-danger ml-2">', '</small>'); ?>
                  </div>                  
                </div>
                <button name="submit" type="submit" class="btn btn-primary btn-user btn-block">
                  Daftar Akun
                </button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="<?= base_url('auth/index'); ?>">Sudah Punya Akun? Login.</a>
              </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
