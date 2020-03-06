        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="container">

            <div class="data" data-flashdata="<?= $this->session->flashdata('success') ?>"></div>

            <div class="flashdatadanger" data-flashdatadanger="<?= $this->session->flashdata('danger') ?>"></div>
            <div class="flashdatasuccess" data-flashdatasuccess="<?= $this->session->flashdata('success') ?>"></div>

            <!-- Slide show -->
            <div class="slide w-100">
              <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="<?= BASE_URL('assets/img/slide/slide2.jpg'); ?>" class="d-block w-100" alt="">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- End of slideshow -->

            <!-- Content -->
			
			<!-- category -->
            <div class="list-hotel my-4">
              <div class="card">
                <div class="card-body mx-auto">                 
                </div>
              </div>
            </div>

            <div class="row list-kamar">
            <?php foreach ($data_buku as $buku): ?>

              <div class="card mb-3 m-1" style="max-width: 540px;">
                <div class="row no-gutters">
                  <div class="col-md-4">
                    <img src="<?= BASE_URL('assets/img/buku/') . $buku['image'] ?>" class="card-img">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title"><?= $buku['nama_buku'] ?></h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <?php if ($buku['stok'] == 0): ?>
                        <p class="card-text"><small class="text-danger" style="text-decoration: line-through;">Harga Rp. <?= number_format($buku['harga'],0,",","."); ?></small></p>
                      <?php else: ?>
                        <p class="card-text"><small class="text-danger">Harga Rp. <?= number_format($buku['harga'],0,",","."); ?></small></p>
                      <?php endif ?>

                      <?php if ($buku['stok'] == 0): ?>
                        <a class="btn btn-danger text-light">Stok Habis</a>
                      <?php else: ?>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary detail px-5" data-id="<?= $buku['id'] ?>" data-toggle="modal" data-target="#exampleModal">
                          Detail
                        </button>
                      <?php endif ?>
                      
                      
                      
                      
                    </div>
                  </div>
                </div>
              </div>
              
                
                <?php endforeach ?>
            
            

          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Detail Buku</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <!-- Detail -->
              <div class="row">
                <div class="col-4">
                  <img src="" class="img-fluid border border-dark rounded image w-100" alt="">
                </div>
                <div class="col">
                  <h3><b class="nama-buku"></b></h3>
                  <p class="mt-3"> <hr>
                    <b>Deskripsi : </b>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate aspernatur placeat inventore voluptas eum, quisquam soluta veritatis iste, doloremque quia neque ab animi accusamus maxime praesentium nobis quas, blanditiis odit! <br> 
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur labore quo quos temporibus rerum saepe. Nobis eveniet voluptates velit beatae explicabo libero doloremque repudiandae a nam dolores sed deserunt, repellat!
                  </p>
                  <p>
                    <smalls class="text-danger harga"></smalls>
                  </p>
                  <p>
                    <small class="text-primary stok"></small>
                  </p>
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <?php if ($this->session->userdata('email') && $buku['stok'] == 0): ?>
                  <a class="btn btn-danger text-light">Stok Habis</a>
                <?php endif ?>
                <?php if ($this->session->userdata('email') && $buku['stok'] > 0): ?>
                  <a href="" class="btn btn-primary pesan">Mulai Memesan</a>
                <?php endif ?>
                <?php if (!$this->session->userdata('email') && $buku['stok'] == 0): ?>
                  <a class="btn btn-danger text-light">Stok Habis</a>
                <?php endif ?>
                <?php if (!$this->session->userdata('email') && $buku['stok'] > 0) : ?>
                  <a href="<?= BASE_URL('Auth/index'); ?>" class="btn btn-danger">Login Dulu Sebelum Memesan</a>
                <?php endif ?>
            </div>
          </div>
        </div>
      </div>

      <script>

        $('.detail').click(function() {

          const id = $(this).data('id');

          $.ajax({
            url: 'http://localhost/penjualan-buku/ajax',
            type: 'post',
            dataType: 'json',
            data: {id: id},
            success: function(data) {

              $('.image').attr('src', "<?= BASE_URL('assets/img/buku/') ?>" + data.image);
              $('.nama-buku').html('"' + data.nama_buku + '"');
              $('.harga').html('Rp. ' + data.harga);
              $('.stok').html('Stok Tersisa ' + data.stok);
              $('.pesan').attr('href', '<?= BASE_URL("User/pemesanan/")?>' + data.id);

            }
          })
          

        });
          
          const flashdata = $('.data').data('flashdata');
          const jumlah_buku = $('.data').data('jumlah_buku');

          if (flashdata) {
            Swal.fire({
              icon: 'success',
              title: 'Berhasil',
              html: flashdata,
            });

          }
      </script>
