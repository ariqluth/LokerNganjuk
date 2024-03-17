<?php include "heder.php"; ?>

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
                <li class="breadcrumb-item active">Data diri</li>
                <li class="breadcrumb-item">Pendidikan</li>
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
                <h3 class="card-title">Data Diri</h3>
              </div>

              <form method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="Nama" class="form-control" name="cv_nama" placeholder="Masukkan Nama Lengkap">
                  </div>
                  <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" class="form-control" name="cv_tempat_lahir" placeholder="Masukkan Tempat Lahir">
                  </div>
                  <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" class="form-control" name="cv_tanggal_lahir" placeholder="Masukkan Tanggal Lahir">
                  </div>
                  <div class="form-group">
                    <label>Jenis Kelamin</label><br>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="cv_jenis_kelamin" value="laki-laki">
                          <label class="form-check-label">Laki-laki</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="cv_jenis_kelamin" value="perempuan">
                          <label class="form-check-label">Perempuan</label>
                        </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Tinggi Badan</label>
                        <input type="text" class="form-control" name="cv_tinggi_badan" placeholder="Masukkan tinggi Badan dalam satuan cm">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Berat Badan</label>
                        <input type="text" class="form-control" name="cv_berat_badan" placeholder="Masukkan berat badan dalam satuan kg">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control" name="cv_alamat" placeholder="Masukkan Alamat">
                  </div>
                  <div class="form-group">
                    <label>Nomor Hp</label>
                    <input type="text" class="form-control" name="cv_hp" placeholder="Masukkan Nomor HP yang Bisa Dihubungi">
                  </div>
                  <div class="form-group">
                    <label>Status</label><br>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="cv_status" value="Menikah">
                          <label class="form-check-label">Menikah</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="cv_status" value="Belum Menikah">
                          <label class="form-check-label">Belum Menikah</label>
                        </div>
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="cv_email" placeholder="Masukkan Email">
                  </div>
                  
                  <div class="form-group">
                    <label>Deskripsi Diri</label>
                    <textarea name="cv_deskripsi_diri" cols="30" rows="5" class="form-control"></textarea>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" name="btambah" value="Tambah" class="btn btn-primary">
                </div>
              </form>

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

<?php
// berikut script untuk proses tambah ke database 
if(isset($_POST['btambah'])){
    // menangkap data post 
    $id_cv = str_replace('.', '', uniqid(rand(100,999),true));
    $cv_nama = $_POST['cv_nama'];
    $cv_tempat_lahir = $_POST['cv_tempat_lahir'];
    $cv_tanggal_lahir = $_POST['cv_tanggal_lahir'];
    $cv_jenis_kelamin = $_POST['cv_jenis_kelamin'];
    $cv_tinggi_badan = $_POST['cv_tinggi_badan'];
    $cv_berat_badan = $_POST['cv_berat_badan'];
    $cv_alamat = $_POST['cv_alamat'];
    $cv_hp = $_POST['cv_hp'];
    $cv_status = $_POST['cv_status'];
    $cv_email = $_POST['cv_email'];
    $cv_deskripsi_diri = $_POST['cv_deskripsi_diri'];

    $sql = "INSERT INTO tb_cv VALUES (:id_cv, :cv_nama, :cv_tempat_lahir, :cv_tanggal_lahir, :cv_jenis_kelamin, :cv_tinggi_badan, :cv_berat_badan, :cv_alamat, :cv_hp, :cv_status, :cv_email, :cv_deskripsi_diri)";

    $stmt = $koneksi->prepare($sql);

    $stmt->bindParam(':id_cv', $id_cv);
    $stmt->bindParam(':cv_nama', $cv_nama);
    $stmt->bindParam(':cv_tempat_lahir', $cv_tempat_lahir);
    $stmt->bindParam(':cv_tanggal_lahir', $cv_tanggal_lahir);
    $stmt->bindParam(':cv_jenis_kelamin', $cv_jenis_kelamin);
    $stmt->bindParam(':cv_tinggi_badan', $cv_tinggi_badan);
    $stmt->bindParam(':cv_berat_badan', $cv_berat_badan);
    $stmt->bindParam(':cv_alamat', $cv_alamat);
    $stmt->bindParam(':cv_hp', $cv_hp);
    $stmt->bindParam(':cv_status', $cv_status);
    $stmt->bindParam(':cv_email', $cv_email);
    $stmt->bindParam(':cv_deskripsi_diri', $cv_deskripsi_diri);

    try {
        $stmt->execute();
        $_SESSION['id_cv'] = $id_cv;

        echo '<script>alert("Berhasil Tambah Data");window.location="tambah_pendidikan.php"</script>';
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
                        
  }                        
?>

<?php include "footer.php"; ?>