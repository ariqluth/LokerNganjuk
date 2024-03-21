<?php


// Pastikan telah ada cvId di session
if (!isset($_SESSION['cvId'])) {
  header('Location: tambah_cv.php');
  exit;
}

$cvId = $_SESSION['cvId'];

// Sertakan file koneksi database
include "koneksi.php";

// Ambil data pendidikan berdasarkan id_cv dari session
$stmt = $koneksi->prepare("SELECT * FROM tb_sertifikasi WHERE id_cv = ?");
$stmt->execute([$cvId]);
$sertifikasi = $stmt->fetchAll();

if (isset($_POST['save_sertifikasi'])) {
  include "koneksi.php";

  if (isset($_SESSION['tb_sertifikasi']) && isset($_SESSION['tb_sertifikasi']['dokumen_sertifikasi'])) {
    $cvDokumensertifikasi = $_SESSION['tb_sertifikasi']['dokumen_sertifikasi'];
} else {
    $cvDokumensertifikasi = null; 
}

if (isset($_FILES['dokumen_sertifikasi']) && $_FILES['dokumen_sertifikasi']['error'] == 0) {
    $allowed = ['pdf'];
    $filename = $_FILES['dokumen_sertifikasi']['name'];
    $filetmp = $_FILES['dokumen_sertifikasi']['tmp_name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (in_array(strtolower($ext), $allowed)) {
        $destination = 'files/' . uniqid() . '.' . $ext; 
        if (move_uploaded_file($filetmp, $destination)) {
            $cvDokumensertifikasi = $destination;
        } else {
            echo "Gagal mengupload file.";
            exit;
        }
    } else {
        echo "Format file tidak diizinkan.";
        exit;
    }
} else {
    $cvDokumensertifikasi = null;
}
 
  $cvNama = $_POST['nama_sertifikasi'];
  $cvLembaga = $_POST['lembaga_sertifikasi'];
  $cvTahun = $_POST['tahun_sertifikasi'];

 

  $stmt = $koneksi->prepare("INSERT INTO tb_sertifikasi (id_cv, nama_sertifikasi, lembaga_sertifikasi, tahun_sertifikasi, dokumen_sertifikasi) VALUES (?, ?, ?, ?, ?)");
  $stmt->execute([$cvId, $cvNama, $cvLembaga, $cvTahun, $cvDokumensertifikasi]);

  $pengId = $koneksi->lastInsertId();
  header('Location: ' . $_SERVER['REQUEST_URI']);
}

?>

<div class="container mt-5">
  <h2>Data sertifikasi</h2>
  <?php if (count($sertifikasi) > 0): ?>
    <div class="table-responsive">
    <table class="table table-bordered table-hover">
      <thead class="thead-light">
        <tr>
          <th>Nama sertifikasi</th>
          <th>Lembaga</th>
          <th>Tahun sertifikasi</th>
        
        </tr>
      </thead>
      <tbody>
        <?php foreach ($sertifikasi as $row): ?>
        <tr>
          <td><?= htmlspecialchars($row['nama_sertifikasi']) ?></td>
          <td><?= htmlspecialchars($row['lembaga_sertifikasi']) ?></td>
          <td><?= htmlspecialchars($row['tahun_sertifikasi']) ?></td>
         
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    </div>
  <?php else: ?>
    <p>Tidak ada data Sertifikasi.</p>
  <?php endif; ?>


        <h2 class="mt-5">Tambah Data Sertifikasi</h2>
        <form method="POST" action="" enctype="multipart/form-data">
            <input type="hidden"  name="id_cv" value="<?php echo $cvId; ?>">

            <div class="col-md-12 form-row">
               
                <div class="form-group col-md-5">
                    <label for="nama_sertifikasi">Nama Sertifikasi</label>
                    <input type="text" class="form-control" id="nama_sertifikasi" name="nama_sertifikasi" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="lembaga_sertifikasi">Lembaga </label>
                    <input type="text" class="form-control" id="lembaga_sertifikasi" name="lembaga_sertifikasi" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="tahun_sertifikasi">Tahun Sertifikasi</label>
                    <input type="date" class="form-control" id="tahun_sertifikasi" name="tahun_sertifikasi" required>
                </div>
              
                <div class="form-group col-md-12">
                    <label for="dokumen_sertifikasi">Dokumen Sertifikasi</label>
                    <input type="file" class="form-control-file" id="dokumen_sertifikasi" name="dokumen_sertifikasi" required>
                </div>
              </div>
              <div class="form-group " style="display: grid; place-items: end;">
              <button type="submit" name="save_sertifikasi" class="btn btn-primary d-flex">tambah</button>
              </div>
        </form>
    </div>

                    
                 
                 