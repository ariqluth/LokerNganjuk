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
$stmt = $koneksi->prepare("SELECT * FROM tb_pendidikan WHERE id_cv = ?");
$stmt->execute([$cvId]);
$pendidikan = $stmt->fetchAll();

if (isset($_POST['save_pendidikan'])) {
  include "koneksi.php";
  if (isset($_SESSION['tb_pendidikan']) && isset($_SESSION['tb_pendidikan']['dokumen_pendidikan'])) {
      $cvDokumenPendidikan = $_SESSION['tb_pendidikan']['dokumen_pendidikan'];
  } else {
      $cvDokumenPendidikan = null; 
  }

  if (isset($_FILES['dokumen_pendidikan']) && $_FILES['dokumen_pendidikan']['error'] == 0) {
      $allowed = ['pdf'];
      $filename = $_FILES['dokumen_pendidikan']['name'];
      $filetmp = $_FILES['dokumen_pendidikan']['tmp_name'];
      $ext = pathinfo($filename, PATHINFO_EXTENSION);

      if (in_array(strtolower($ext), $allowed)) {
          $destination = 'files/' . uniqid() . '.' . $ext; 
          if (move_uploaded_file($filetmp, $destination)) {
              $cvDokumenPendidikan = $destination;
          } else {
              echo "Gagal mengupload file.";
              exit;
          }
      } else {
          echo "Format file tidak diizinkan.";
          exit;
      }
  } else {
      $cvDokumenPendidikan = null;
  }
  // Mengambil data dari form
  $cvNamaPendidikan = $_POST['nama_pendidikan'];
  $cvJurusan = $_POST['jurusan_pendidikan'];
  $cvTahun = $_POST['tahun_lulus'];
 


  $stmt = $koneksi->prepare("INSERT INTO tb_pendidikan (id_cv , nama_pendidikan, jurusan_pendidikan, tahun_lulus, dokumen_pendidikan) VALUES (?, ?, ?, ?, ?)");
  $stmt->execute([$cvId, $cvNamaPendidikan, $cvJurusan, $cvTahun, $cvDokumenPendidikan]);

  $pendId = $koneksi->lastInsertId();
  header('Location: ' . $_SERVER['REQUEST_URI']);
}

?>

<div class="container mt-5">
  <h2 class="mb-4">Data Pendidikan</h2>
  
  <?php if (count($pendidikan) > 0): ?>
  <div class="table-responsive">
    <table class="table table-bordered table-hover">
      <thead class="thead-light">
        <tr>
          <th>Jenjang</th>
          <th>Jurusan - Asal Sekolah</th>
          <th>Tahun Lulus</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($pendidikan as $row): ?>
        <tr>
          <td><?= htmlspecialchars($row['nama_pendidikan']) ?></td>
          <td><?= htmlspecialchars($row['jurusan_pendidikan']) ?></td>
          <td><?= htmlspecialchars($row['tahun_lulus']) ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <?php else: ?>
  <div class="alert alert-warning" role="alert">
    Tidak ada data pendidikan.
  </div>
  <?php endif; ?>

  <h2 class="mt-5">Tambah Data Pendidikan</h2>
  <form method="POST" action="" enctype="multipart/form-data">
  <input type="hidden" name="id_cv" value="<?php echo $cvId; ?>">
    <div class="form-row">
      <div class="form-group col-md-3">
        <label for="jenjang">Jenjang</label>
        <select id="jenjang" class="form-control" name="nama_pendidikan">
          <option value="SD">SD</option>
          <option value="SMP">SMP</option>
          <option value="SMA">SMA</option>
          <option value="S1">S1</option>
          <option value="S2">S2</option>
          <option value="S3">S3</option>
        </select>
      </div>
      <div class="form-group col-md-5">
        <label for="jurusan">Jurusan - Asal Sekolah</label>
        <input type="text" class="form-control" id="jurusan_pendidikan" name="jurusan_pendidikan">
      </div>
      <div class="form-group col-md-4">
        <label for="tahunLulus">Tahun Lulus</label>
        <input type="date" class="form-control" id="tahun_lulus" name="tahun_lulus">
      </div>
    </div>

    <div class="form-group">
      <label for="dokumen_pendidikan">Document</label>
      <input type="file" class="form-control-file" id="dokumen_pendidikan" name="dokumen_pendidikan" onchange="validateImageFile(this)" required>
    </div>

    <div class="form-group " style="display: grid; place-items: end;">
    <button type="submit" name="save_pendidikan" class="btn btn-primary d-flex">Tambah</button>
    </div>
  </form>
</div>

<script>
function validateImageFile(inputFile) {
  const file = inputFile.files[0];
  if (!file) {
    alert("Please select an pdf file.");
    return false; 
  }
  const allowedExtensions = ['pdf'];

  const extension = file.name.split('.').pop().toLowerCase();

  if (!allowedExtensions.includes(extension)) {
    alert("Invalid file format. Only " + allowedExtensions.join(', ') + " files are allowed.");
    inputFile.value = ''; 
    return false; 
  }

  return true;
}
</script>
                    
                 
                 