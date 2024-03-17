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
                <li class="breadcrumb-item">Pelatihan</li>
                <li class="breadcrumb-item">Sertifikasi</li>
                <li class="breadcrumb-item">Skill</li>
                <li class="breadcrumb-item active">Sosial Media</li>
            </ol>
            <div class="card card-primary">
              <!-- /.card-header -->
              <div class="card-header">
                <h3 class="card-title">Media Sosial</h3>
              </div>
              <div class="card-body">
                <form action="save_sosial.php" method="post">
                  <input type="hidden" name="id_cv" value="<?= $_SESSION['id_cv'] ?>">
                  <table id="data-table">
                      <tr>
                          <th width="250px">Media Sosial</th>
                          <th width="600px">Nama / Link Media Sosial</th>
                      </tr>
                      <tr>
                          <td>
                            <select class="form-control" name="jenis_sosial_media[]">
                              <option value="">Pilih Media Sosial</option>
                      <option value="Facebook">Facebook</option>
                      <option value="Instagram">Instagram</option>
                      <option value="Twitter">Twitter</option>
                      <option value="LinkedIn">LinkedIn</option>
                      <option value="Youtube">Youtube</option>
                            </select>
                          </td>
                          <td><input type="text" class="form-control" name="nama_sosial_media[]" /></td>
                      </tr>
                  </table>
                  <br>
                  <div class="form-group">
                    <button type="button" class="btn btn-primary" onclick="addRow()">Tambah Media Sosial</button>
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
            cell1.innerHTML = '<select class="form-control" name="pendidikan_nama[]"><option value="Pilih Media Sosial">Pilih Media Sosial</option><option value="Facebook">Facebook</option><option value="Instagram">Instagram</option><option value="Twitter">Twitter</option><option value="LinkedIn">LinkedIn</option><option value="Youtube">Youtube</option></select>';
            cell2.innerHTML = '<input type="text" class="form-control" name="nama_sosial_media[]" />';
        }
    </script>

<?php include "footer.php"; ?>