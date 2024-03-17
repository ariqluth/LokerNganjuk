<?php include "heder.php"; 

if(isset($_SESSION['id_cv'])) {
    $id_cv = $_SESSION['id_cv'];
} else {
    echo "No last inserted ID found.";
}
?>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Data CV</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-8">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Data diri</li>
                <li class="breadcrumb-item">Pendidikan</li>
                <li class="breadcrumb-item active">Pengalaman</li>
                <li class="breadcrumb-item">Organisasi</li>
                <li class="breadcrumb-item">Pelatihan</li>
                <li class="breadcrumb-item">Sertifikasi</li>
                <li class="breadcrumb-item">Skill</li>
                <li class="breadcrumb-item">Sosial Media</li>
            </ol>
            <div class="card card-primary">
              <!-- /.card-header -->
              <div class="card-header">
                <h3 class="card-title">Pengalaman</h3>
              </div>
              <div class="card-body">
                <form action="save_pengalaman.php" method="post">
                  <input type="text" name="id_cv" value="<?= $_SESSION['id_cv'] ?>">
                  <table id="data-table">
                      <tr>
                          <th width="200px">Tahun Mulai</th>
                          <th width="200px">Tahun Selesai</th>
                          <th width="400px">Tempat</th>
                          <th width="400px">Deskripsi Kerja</th>
                      </tr>
                      <tr>
                          <td><input type="text" class="form-control" name="tahun_mulai_pengalaman[]" /></td>
                          <td><input type="text" class="form-control" name="tahun_selesai_pengalaman[]" /></td>
                          <td><input type="text" class="form-control" name="tempat_pengalaman[]" /></td>
                          <td><input type="text" class="form-control" name="deskripsi_pengalaman[]" /></td>
                      </tr>
                  </table>
                  <br>
                  <div class="form-group">
                    <button type="button" class="btn btn-primary" onclick="addRow()">Tambah Data Pengalaman</button>
                    <button type="submit" class="btn btn-success" name="btambah">Simpan</button>
                  </div>
                  
              </form>
              </div>

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

<script>
        function addRow() {
            var table = document.getElementById("data-table");
            var row = table.insertRow();
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);

            cell1.innerHTML = '<input type="text" class="form-control" name="tahun_mulai_pengalaman[]" />';
            cell2.innerHTML = '<input type="text" class="form-control" name="tahun_selesai_pengalaman[]" />';
            cell3.innerHTML = '<input type="text" class="form-control" name="tempat_pengalaman[]" />';
            cell4.innerHTML = '<input type="text" class="form-control" name="deskripsi_pengalaman[]" />';
        }
    </script>

<?php include "footer.php"; ?>