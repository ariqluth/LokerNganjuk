<?php include "heder.php"; 
if(!isset($_SESSION["user"])){
  header("Location: index.php");
  exit;
}

if($_SESSION["level"] !== 'admin') {
  header("Location: index.php"); 
  exit;
}
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data User</h1>
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
                <h3 class="card-title">Data User</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>No HP</th>
                    <th>Email</th>
                    <th>Level</th>
                  </tr>
                  </thead>
                  <tbody>
                  	<?php
                        $sql = "SELECT * FROM tb_user";
                        $row = $koneksi->prepare($sql);
                        $row->execute();
                        $hasil = $row->fetchAll();
                        $no = 0;
                        foreach($hasil as $isi){
                        $no++;
                      ?>
                  <tr>
                    <td><?= $no?></td>
                    <td><?= $isi['user_nama']?></td>
                    <td><?= $isi['user_hp']?></td>
                    <td><?= $isi['user_email']?></td>
                    <td><?= $isi['user_level']?></td>
                  </tr>
                  <?php } ?>
                  </tbody>
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