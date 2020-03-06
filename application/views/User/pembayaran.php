	<!-- Begin Page Content -->
    <div class="container-fluid">


		<div class="containers">
			
			<?= message_helper(); ?>

			<div class="card mb-5">
	            <div class="card-header">
	              Pemesanan
	            </div>
	            <div class="card-body">
	              <div class="row">
	                <div class="col-2">
	                  <img src="<?= BASE_URL('assets/img/buku/') . $data_where_pemesanan['image'] ?>" class="img-fluid border border-dark rounded" alt="Responsive image">
	                </div>
	                <div class="col">
	                  <h3><b>"<?= $data_where_pemesanan['nama_buku'] ?>"</b></h3>
	                  <p class="mt-3">
	                    <b>Deskripsi : </b>
	                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate aspernatur placeat inventore voluptas eum, quisquam soluta veritatis iste, doloremque quia neque ab animi accusamus maxime praesentium nobis quas, blanditiis odit! <br> 
	                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur labore quo quos temporibus rerum saepe. Nobis eveniet voluptates velit beatae explicabo libero doloremque repudiandae a nam dolores sed deserunt, repellat!
	                  </p>
	                  <p>
	                  	<smalls class="text-muted"><b>Harga Buku :</b> Rp. <?= number_format($data_where_pemesanan['harga'],0,",","."); ?>.00.-</smalls> <br>
	                  	<smalls class="text-muted"><b>Total Buku Yang Dibeli :</b> <?= $data_where_pemesanan['jumlah_buku'] ?></smalls>
	                  	<br><br>
	                    <smalls class="text-danger">Total Rp. <?= number_format($data_where_pemesanan['harga'] * $data_where_pemesanan['jumlah_buku'],0,",","."); ?>.00.-</smalls>
	                  </p>
	                </div>
	            </div>
	            </div>
	          </div>

			<div class="card">
			  <div class="card-header">
			    Pembayaran
			  </div>
			  <div class="card-body">
			    <h5 class="card-title"><b>Kode Transaksi</b> : <?= $data_where_pemesanan['kode_transaksi'] ?></h5>
			    <div class="form-group mt-4">                    
                    <form action="" method="post" enctype="multipart/form-data">
                    	<input type="hidden" name="pemesanan_id" value="<?= $data_where_pemesanan['pemesanan_id'] ?>">
                    	<label for="image">Kirim Bukti Pembayaran</label>
	                    <div class="input-group">
	                      <div class="custom-file">
	                        <input  type="file" name="image" required class="custom-file-input" id="image" aria-describedby="inputGroupFileAddon01">                    
	                        <label class="custom-file-label" id="label-image" for="image">File Berupa Gambar</label>
	                      </div>
	                    </div>
	                    <button type="submit" class="btn btn-outline-success mt-4">Kirim Bukti</button>
	                </form>
                  </div>
			  </div>
			</div>
		</div>

		<div class="row" style="margin-top: 3rem; margin-bottom: 10rem;">
            <div class="col">
              <div class="card">
                <div class="card-header">
                  Bantuan
                </div>
                <div class="card-body">
                  <h5 class="card-title"><h2><b>Cara Melakukan Pembayaran</b></h2></h5>
                  <div class="row mt-3">
                    <div class="col-8">
                      <ul>
                        <li>Transfer Uang Ke Kode Transaksi Yang Sudah Tertera</li>
                        <li>Kirim Bukti Pembayaran Ke Sistem</li>
                        <li>Tunggu konfirmasi Dari Admin</li>
                      </ul>
                    </div>
                    <div class="col">
                      <img src="<?= BASE_URL('assets/img/pembayaran/bri.jpg'); ?>" width="100">
                      <img src="<?= BASE_URL('assets/img/pembayaran/bni.png'); ?>" width="100">
                      <img src="<?= BASE_URL('assets/img/pembayaran/mandiri.jpg'); ?>" width="100">
                      <img src="<?= BASE_URL('assets/img/pembayaran/codashop.png'); ?>" width="100">
                      <img src="<?= BASE_URL('assets/img/pembayaran/indomaret.png'); ?>" width="100">
                      <img src="<?= BASE_URL('assets/img/pembayaran/alfamart.png'); ?>" width="100">
                      <img src="<?= BASE_URL('assets/img/pembayaran/gopay.jpg'); ?>" width="100">
                      <img src="<?= BASE_URL('assets/img/pembayaran/paypal.png'); ?>" width="100">
                      <img src="<?= BASE_URL('assets/img/pembayaran/loket.png'); ?>" width="100">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

    </div>
    <!-- /.container-fluid -->

      

</div>
<!-- End of Main Content -->