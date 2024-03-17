<?php include "heder.php"; ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data CV</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">

              <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                  <h4 class="card-title">Data CV</h4>
                    <a href="tambah_cv.php" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah CV</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No.Hp</th>
                    <th>Email</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  	<?php
                        $sql = "SELECT * FROM tb_cv";
                        $row = $koneksi->prepare($sql);
                        $row->execute();
                        $hasil = $row->fetchAll();
                        $no = 0;
                        foreach($hasil as $isi){
                        $no++;
                      ?>
                  <tr>
                    <td><?= $no?></td>
                    <td><?= $isi['cv_nama']?></td>
                    <td><?= $isi['cv_alamat']?></td>
                    <td><?= $isi['cv_hp']?></td>
                    <td><?= $isi['cv_email']?></td>
                    <td>
                      <a href="#" data-toggle="modal" data-target="#ubah<?= $isi['cv_id'];?>" class="d-sm-inline-block btn btn-sm btn-warning shadow-sm">
                        <i class="nav-icon fas fa-edit"></i> Ubah</a>
                      <a href="#" data-toggle="modal" data-target="#hapus<?= $isi['cv_id'];?>" class="d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                        <i class="nav-icon fas fa-trash"></i> Hapus</a>
                    </td>
                  </tr>
                  	<?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No.Hp</th>
                    <th>Email</th>
                    <th>Aksi</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<?php include "footer.php"; ?>