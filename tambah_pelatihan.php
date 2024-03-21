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
$stmt = $koneksi->prepare("SELECT * FROM tb_pelatihan WHERE id_cv = ?");
$stmt->execute([$cvId]);
$pelatihan = $stmt->fetchAll();

if (isset($_POST['save_pelatihan'])) {
  include "koneksi.php";

  if (isset($_SESSION['tb_pelatihan']) && isset($_SESSION['tb_pelatihan']['dokumen_pelatihan'])) {
    $cvDokumenpelatihan = $_SESSION['tb_pelatihan']['dokumen_pelatihan'];
} else {
    $cvDokumenpelatihan = null; 
}

if (isset($_FILES['dokumen_pelatihan']) && $_FILES['dokumen_pelatihan']['error'] == 0) {
    $allowed = ['pdf'];
    $filename = $_FILES['dokumen_pelatihan']['name'];
    $filetmp = $_FILES['dokumen_pelatihan']['tmp_name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (in_array(strtolower($ext), $allowed)) {
        $destination = 'files/' . uniqid() . '.' . $ext; 
        if (move_uploaded_file($filetmp, $destination)) {
            $cvDokumenpelatihan = $destination;
        } else {
            echo "Gagal mengupload file.";
            exit;
        }
    } else {
        echo "Format file tidak diizinkan.";
        exit;
    }
} else {
    $cvDokumenpelatihan = null;
}
 
  $cvNama = $_POST['nama_pelatihan'];
  $cvLembaga = $_POST['lembaga_pelatihan'];
  $cvTahun = $_POST['tahun_pelatihan'];

 

  $stmt = $koneksi->prepare("INSERT INTO tb_pelatihan (id_cv, nama_pelatihan, lembaga_pelatihan, tahun_pelatihan, dokumen_pelatihan) VALUES (?, ?, ?, ?, ?)");
  $stmt->execute([$cvId, $cvNama, $cvLembaga, $cvTahun, $cvDokumenpelatihan]);

  $pengId = $koneksi->lastInsertId();
  header('Location: ' . $_SERVER['REQUEST_URI']);
}

?>

<div class="container mt-5">
  <h2 class="mb-4">Data Pelatihan</h2>
  <?php if (count($pelatihan) > 0): ?>
    <div class="table-responsive">
    <table class="table table-bordered table-hover">
      <thead class="thead-light">
        <tr>
          <th>Nama Pelatihan</th>
          <th>Lembaga</th>
          <th>Tahun Pelatihan</th>
        
        </tr>
      </thead>
      <tbody>
        <?php foreach ($pelatihan as $row): ?>
        <tr>
          <td><?= htmlspecialchars($row['nama_pelatihan']) ?></td>
          <td><?= htmlspecialchars($row['lembaga_pelatihan']) ?></td>
          <td><?= htmlspecialchars($row['tahun_pelatihan']) ?></td>
         
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    </div>
  <?php else: ?>
    <div class="alert alert-warning" role="alert">
    <p>Tidak ada data Pelatihan.</p>
    </div>
  <?php endif; ?>


        <h2 class="mt-5">Tambah Data Pelatihan</h2>
        <form method="POST" action="" enctype="multipart/form-data">
            <input type="hidden" name="id_cv" value="<?php echo $cvId; ?>">

            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="nama_pelatihan">Nama Pelatihan</label>
                    <input type="text" class="form-control" id="nama_pelatihan" name="nama_pelatihan" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="lembaga_pelatihan">Lembaga </label>
                    <input type="text" class="form-control" id="lembaga_pelatihan" name="lembaga_pelatihan" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="tahun_pelatihan">Tahun Pelatihan</label>
                    <input type="date" class="form-control" id="tahun_pelatihan" name="tahun_pelatihan" required>
                </div>
              
                <div class="form-group">
                    <label for="dokumen_pelatihan">Dokumen Pelatihan</label>
                    <input type="file" class="form-control-file" id="dokumen_pelatihan" name="dokumen_pelatihan" required>
                </div>
            </div>
            <div class="form-group" style="display: grid; place-items: end;">
            <button type="submit" name="save_pelatihan" class="btn btn-primary d-flex">tambah</button>
            <br />
            </div>
        </form>
    </div>

                    
                 
                 