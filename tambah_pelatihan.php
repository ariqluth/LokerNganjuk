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
                <li class="breadcrumb-item">Pengalaman</li>
                <li class="breadcrumb-item">Organisasi</li>
                <li class="breadcrumb-item active">Pelatihan</li>
                <li class="breadcrumb-item">Sertifikasi</li>
                <li class="breadcrumb-item">Skill</li>
                <li class="breadcrumb-item">Sosial Media</li>
            </ol>
            <div class="card card-primary">
              <!-- /.card-header -->
              <div class="card-header">
                <h3 class="card-title">Pelatihan</h3>
              </div>
              <div class="card-body">
                <form action="save_pelatihan.php" method="post">
                  <input type="text" name="id_cv" value="<?= $_SESSION['id_cv'] ?>">
                  <table id="data-table">
                      <tr>
                          <th width="300px">Nama Pelatihan</th>
                          <th width="300px">Lembaga Pelatihan</th>
                          <th width="200px">Tahun</th>
                      </tr>
                      <tr>
                          <td><input type="text" class="form-control" name="nama_pelatihan[]" /></td>
                          <td><input type="text" class="form-control" name="lembaga_pelatihan[]" /></td>
                          <td><input type="text" class="form-control" name="tahun_pelatihan[]" /></td>
                      </tr>
                  </table>
                  <br>
                  <div class="form-group">
                    <button type="button" class="btn btn-primary" onclick="addRow()">Tambah Data Pelatihan</button>
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

            cell1.innerHTML = '<input type="text" class="form-control" name="nama_pelatihan[]" />';
            cell2.innerHTML = '<input type="text" class="form-control" name="lembaga_pelatihan[]" />';
            cell3.innerHTML = '<input type="text" class="form-control" name="tahun_pelatihan[]" />';
            
        }
    </script>

<?php include "footer.php"; ?>