<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="btn-insert" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-file-pdf fa-fx mr-2 text-white-50"></i> Simpan Sebagai PDF</a>
          </div>

          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

          <div class="flashdata" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>



          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>User_ID</th>
                      <th>Nama Pelanggan</th>
                      <th>Telp</th>
                      <th>Cash</th>
                      <th>Nama Buku</th>
                      <th>Jumlah Buku Yang Dibeli</th>
                      <th>Bukti Pembayaran</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <?php $i = 1; ?>
                    <?php foreach ($all_data_pemesanan as $pemesanan ): ?>

                      <?php if ($pemesanan['is_success'] == 1): ?>
                        <tr class="text-info">
                      <?php elseif ($pemesanan['is_success'] == 4) : ?>
                        <tr class="text-danger">
                      <?php else: ?>
                        <tr>
                      <?php endif ?>
                      
                        <td><?= $i++ ?></td>
                        <td><?= $pemesanan['user_id'] ?></td>
                        <td><?= $pemesanan['nama_pelanggan'] ?></td>
                        <td><?= $pemesanan['telp'] ?></td>
                        <td>Rp. <?= number_format($pemesanan['harga'] * $pemesanan['jumlah_buku'],0,",","."); ?></td>
                        <td><?= $pemesanan['nama_buku'] ?></td>
                        <td><?= $pemesanan['jumlah_buku'] ?></td>
                        <?php if (!$pemesanan['bukti_pembayaran']): ?>
                          <td class="text-danger">Belum Ada Bukti Pembayaran</td>
                        <?php else: ?>
                           <td><img src="<?= BASE_URL('assets/img/bukti/') . $pemesanan['bukti_pembayaran'] ?>" width="100"></td> 
                        <?php endif ?>                        
                        <td> 

                          <?php if ($pemesanan['is_success'] != 1 && $pemesanan['is_success'] != 4): ?>
                            <a href="" data-id="<?= $pemesanan['pemesanan_id'] ?>" data-pendapatan="<?= $pemesanan['harga'] * $pemesanan['jumlah_buku']?>" data-jumlah="<?= $pemesanan['jumlah_buku'] ?>" data-buku="<?= $pemesanan['id'] ?>" class="badge badge-success konfirmasi" data-toggle="modal" data-target="#konfirmasi">
                            Konfirmasi</a>
                            <a href="" data-id="<?= $pemesanan['pemesanan_id'] ?>" class="badge badge-dark gagalkan" data-toggle="modal" data-target="#gagalkan">Gagalkan</a>
                          <?php endif ?>                       
                          
                          <?php if ($pemesanan['is_success'] == 1): ?>
                          <a href="<?= BASE_URL('Info/laporanPemesanan'); ?>" data-id="<?= $pemesanan['pemesanan_id'] ?>" class="badge badge-primary pdf">Buat Nota</a> 
                          <?php endif ?>

                          <a href="" data-id="<?= $pemesanan['pemesanan_id'] ?>" class="badge badge-danger delete-pemesanan">Delete</a>
                        </td>
                      </tr>
                    <?php endforeach ?>
                    
                  </tbody>
                </table>
              </div>
              <div class="pagination float-right mt-3">
                <nav aria-label="Page navigation example">
                  <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Prev</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Modal Konfirmasi-->
      <div class="modal fade" id="konfirmasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><b>Konfirmasi Pesanan</b></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="" method="post">
                <input type="hidden" class="input-id" name="pesanan_id" value="">
                <input type="hidden" class="input-pendapatan" name="pendapatan" value="">
                <input type="hidden" class="input-jumlah" name="jumlah_buku" value="">
                <input type="hidden" class="input-buku" name="buku_id" value="">

                Pilih "Konfirmasi" Jika Ingin <teks class="text-success">Mengkonfirmasi</teks> Pesanan Pelanggan.            
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" name="konfirmasi" class="btn btn-primary" id="submit-insert">Konfirmasi</button>
            </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal Gagalkan-->
      <div class="modal fade" id="gagalkan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><b>Konfirmasi Pesanan</b></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="" method="post">
                <input type="hidden" class="input-gagal-id" name="pesanan_id" value="">

                Pilih "Konfirmasi" Jika Ingin <teks class="text-danger">Menggagalkan</teks> Pesanan Pelanggan.            
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" name="gagalkan" class="btn btn-primary" id="submit-insert">Konfirmasi</button>
            </form>
            </div>
          </div>
        </div>
      </div>

