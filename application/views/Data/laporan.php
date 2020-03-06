<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="btn-insert" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-user fa-sm text-white-50"></i> Tambah User</a>
          </div>

          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

          <!-- Message -->
          <?= message_helper(); ?>



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
                      <th>Error</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                      <tr>
                        <td>Under Construction</td>
                      </tr>
                    
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

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="" method="post">
                <div class="form-group">
                  <input type="hidden" name="id" value="" id="id-user">
                  <label for="exampleInputEmail1">Nama user</label>
                  <input type="text" class="form-control" id="nama" placeholder="Input user..." name="nama" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Harga user</label>
                  <input type="number" min="1000" class="form-control" id="harga" placeholder="Input Harga..." name="harga" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Jumlah Stok</label>
                  <input type="number" min="1" class="form-control" id="stok" placeholder="Input Stok..." name="stok" required>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" name="insert" class="btn btn-primary" id="submit-insert">Save changes</button>
            </form>
            </div>
          </div>
        </div>
      </div>