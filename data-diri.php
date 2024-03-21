  
<form method="POST" action="" enctype="multipart/form-data">

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
                    <input type="text" class="form-control" name="cv_status" placeholder="Status saat ini">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="cv_email" placeholder="Masukkan Email">
                  </div>
                  
                  <div class="form-group">
                    <label>Deskripsi Diri</label>
                    <textarea name="cv_deskripsi_diri" cols="30" rows="5" class="form-control"></textarea>
                  </div>

                  <div class="form-group">
                 <label for="cv_foto">Foto</label>
                     <input type="file" class="form-control" name="cv_foto" id="cv_foto">
                </div>
                  
                <div class="card-footer">
  <button type="submit" name="save_cv" class="btn btn-success">Save</button>
</div>
                </div>
</form>


    <?php
if (isset($_POST['save_cv'])) {
    include "koneksi.php";
    if (isset($_SESSION['cv']) && isset($_SESSION['cv']['cv_foto'])) {
        $cvFoto = $_SESSION['cv']['cv_foto'];
    } else {
        $cvFoto = null; 
    }

    if (isset($_FILES['cv_foto']) && $_FILES['cv_foto']['error'] == 0) {
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        $filename = $_FILES['cv_foto']['name'];
        $filetmp = $_FILES['cv_foto']['tmp_name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        if (in_array(strtolower($ext), $allowed)) {
            $destination = 'uploads/' . uniqid() . '.' . $ext; 
            if (move_uploaded_file($filetmp, $destination)) {
                $cvFoto = $destination;
            } else {
                echo "Gagal mengupload file.";
                exit;
            }
        } else {
            echo "Format file tidak diizinkan.";
            exit;
        }
    } else {
        $cvFoto = null;
    }
    // Mengambil data dari form
    $cvNama = $_POST['cv_nama'];
    $cvTempatLahir = $_POST['cv_tempat_lahir'];
    $cvTanggalLahir = $_POST['cv_tanggal_lahir'];
    $cvJenisKelamin = $_POST['cv_jenis_kelamin'];
    $cvTinggiBadan = $_POST['cv_tinggi_badan'];
    $cvBeratBadan = $_POST['cv_berat_badan'];
    $cvAlamat = $_POST['cv_alamat'];
    $cvHp = $_POST['cv_hp'];
    $cvStatus = $_POST['cv_status'];
    $cvEmail = $_POST['cv_email'];
    $cvDeskripsiDiri = $_POST['cv_deskripsi_diri'];


    $stmt = $koneksi->prepare("INSERT INTO tb_cv (cv_nama, cv_tempat_lahir, cv_tanggal_lahir, cv_jenis_kelamin, cv_tinggi_badan, cv_berat_badan, cv_alamat, cv_hp, cv_status, cv_email, cv_deskripsi_diri, cv_foto) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$cvNama, $cvTempatLahir, $cvTanggalLahir, $cvJenisKelamin, $cvTinggiBadan, $cvBeratBadan, $cvAlamat, $cvHp, $cvStatus, $cvEmail, $cvDeskripsiDiri, $cvFoto]);

    $cvId = $koneksi->lastInsertId();
    $_SESSION['cvId'] = $cvId;
   

    header("Location: tambah_cv.php?step=tambah_pendidikan");
    exit;
}



 ?>
                
      