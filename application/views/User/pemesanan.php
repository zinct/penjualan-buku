<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-5">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
          </div>

          <div class="data" data-flashdata="<?= $this->session->flashdata('success') ?>" data-jumlah="<?= $this->session->flashdata('jumlah_buku'); ?>"></div>
        
          <div class="card">
            <div class="card-header">
              Pemesanan
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-2">
                  <img src="<?= BASE_URL('assets/img/buku/') . $data_buku['image'] ?>" class="img-fluid border border-dark rounded" alt="Responsive image">
                </div>
                <div class="col">
                  <h3><b>"<?= $data_buku['nama_buku'] ?>"</b></h3>
                  <p class="mt-3">
                    <b>Deskripsi : </b>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate aspernatur placeat inventore voluptas eum, quisquam soluta veritatis iste, doloremque quia neque ab animi accusamus maxime praesentium nobis quas, blanditiis odit! <br> 
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur labore quo quos temporibus rerum saepe. Nobis eveniet voluptates velit beatae explicabo libero doloremque repudiandae a nam dolores sed deserunt, repellat!
                  </p>
                  <p>
                    <smalls class="text-danger">Harga Rp. <?= number_format($data_buku['harga'],0,",","."); ?></smalls>
                  </p>
                  <p>
                    <small class="text-primary">Stok Tersisa <?= $data_buku['stok']; ?></small>
                  </p>
                </div>
            </div>
            </div>
          </div>

          <div class="row" style="margin-top: 2rem; ">
            <div class="col">
              <form action="" method="post" enctype="multipart/form-data">
              <div class="card">
                <div class="card-header">
                  Identitas
                </div>
                <div class="card-body">
                    <input type="hidden" name="user_id" value="<?= $user_data['id'] ?>">
                    <input type="hidden" name="kode_transaksi" value="<?= $user_data['id'].strtoupper(uniqid()); ?>">
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Lengkap</label>
                      <input type="text" name="nama_pelanggan" class="form-control" id="exampleInputEmail1"  value="<?= set_value('nama_pelanggan') ?>">
                      <?= form_error('nama_pelanggan', '<small class="text-danger ml-2">', '</small>'); ?>
                    </div>
                    <div class="row">
                      <div class="col-8">
                        <div class="form-group">
                          <label for="exampleInputPassword1">No Telp</label>
                          <input type="text" name="telp" class="form-control" id="exampleInputPassword1"  value="<?= set_value('telp') ?>">
                          <?= form_error('telp', '<small class="text-danger ml-2">', '</small>'); ?>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="exampleInputPassword1">Kode Pos</label>
                          <input type="text" name="kode_pos" class="form-control" id="exampleInputPassword1"  value="<?= set_value('kode_pos') ?>">
                          <?= form_error('kode_pos', '<small class="text-danger ml-2">', '</small>'); ?>
                        </div>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="alamat">Alamat Lengkap</label>
                      <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= set_value('alamat') ?></textarea>
                      <?= form_error('alamat', '<small class="text-danger ml-2">', '</small>'); ?>
                    </div>                    
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-header">
                  Pemesanan
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jumlah Buku Yang Di Pesan</label>
                    <input type="number" min="1" max="<?= $data_buku['stok'] ?>" name="jumlah_buku" class="form-control" id="exampleInputEmail1" value="<?= set_value('jumlah_buku') ?>">
                    <?= form_error('jumlah_buku', '<small class="text-danger ml-2">', '</small>'); ?>
                  </div>
                  
                  <button type="submit" class="btn btn-primary px-5 mt-4">Beli</button>                   
                </div>
              </div>
              </form>
            </div>
          </div>
  
          
          

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      