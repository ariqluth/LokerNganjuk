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
                <li class="breadcrumb-item active">Skill</li>
                <li class="breadcrumb-item">Sosial Media</li>
            </ol>
            <div class="card card-primary">
              <!-- /.card-header -->
              <div class="card-header">
                <h3 class="card-title">Skill</h3>
              </div>
              <div class="card-body">
                <form action="save_skill.php" method="post">
                  <input type="text" name="id_cv" value="<?= $_SESSION['id_cv'] ?>">
                  <table id="data-table">

                          <div class="form-group">
                    <label>Skill</label>
                    <input type="text" class="form-control" name="nama_skill" id="nama_skill" placeholder="Masukkan Skill (Contoh : Ms Word, Excel, PHP, Python dll.)">
                  </div>
                          
                  </table>
                  <br>
                  <div class="form-group">
                    <button type="button" class="btn btn-primary" onclick="addRow()">Tambah Data Skill</button>
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

            cell1.innerHTML = '<input type="text" class="form-control" name="nama_skill[]" />';
        }
    </script>

<?php include "footer.php"; ?>