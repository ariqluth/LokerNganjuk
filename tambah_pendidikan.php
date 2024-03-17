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
                <li class="breadcrumb-item active">Pendidikan</li>
                <li class="breadcrumb-item">Pengalaman</li>
                <li class="breadcrumb-item">Organisasi</li>
                <li class="breadcrumb-item">Pelatihan</li>
                <li class="breadcrumb-item">Sertifikasi</li>
                <li class="breadcrumb-item">Skill</li>
                <li class="breadcrumb-item">Sosial Media</li>
            </ol>
            <div class="card card-primary">
              <!-- /.card-header -->
              <div class="card-header">
                <h3 class="card-title">Pendidikan</h3>
              </div>
              <div class="card-body">
                <form action="save_pendidikan.php" method="post">
                  <input type="hidden" name="id_cv" value="<?= $_SESSION['id_cv'] ?>">
                  <table id="data-table">
                      <tr>
                          <th width="200px">Jenjang</th>
                          <th width="400px">Jurusan - Asal Sekolah</th>
                          <th>Tahun Lulus</th>
                      </tr>
                      <tr>
                          <td>
                            <select class="form-control" name="pendidikan_nama[]">
                              <option value="SD">SD</option>
                              <option value="SMP">SMP</option>
                              <option value="SMA">SMA</option>
                              <option value="S1">S1</option>
                              <option value="S2">S2</option>
                              <option value="S3">S3</option>
                            </select>
                          </td>
                          <td><input type="text" class="form-control" name="pendidikan_jurusan[]" /></td>
                          <td><input type="text" class="form-control" name="tahun_lulus[]" /></td>
                      </tr>
                  </table>
                  <br>
                  <div class="form-group">
                    <button type="button" class="btn btn-primary" onclick="addRow()">Tambah Data Pendidikan</button>
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
            cell1.innerHTML = '<select class="form-control" name="pendidikan_nama[]"><option value="SD">SD</option><option value="SMP">SMP</option><option value="SMA">SMA</option><option value="S1">S1</option><option value="S2">S2</option><option value="S3">S3</option></select>';
            cell2.innerHTML = '<input type="text" class="form-control" name="pendidikan_jurusan[]" />';
            cell3.innerHTML = '<input type="text" class="form-control" name="tahun_lulus[]" />';
        }
    </script>

<?php include "footer.php"; ?>