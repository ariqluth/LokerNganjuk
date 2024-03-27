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
$stmt = $koneksi->prepare("SELECT * FROM tb_sosial_media WHERE id_cv = ?");
$stmt->execute([$cvId]);
$sosial = $stmt->fetchAll();

if (isset($_POST['save_sosial'])) {
  include "koneksi.php";

  $cvJenis = $_POST['jenis_sosial_media'];
  $cvSosial = $_POST['nama_sosial_media'];

 


  $stmt = $koneksi->prepare("INSERT INTO tb_sosial_media (id_cv , jenis_sosial_media, nama_sosial_media) VALUES (?, ?, ?)");
  $stmt->execute([$cvId, $cvJenis, $cvSosial]);

  $pendId = $koneksi->lastInsertId();
  header('Location: ' . $_SERVER['REQUEST_URI']);
}

?>

<div class="container mt-5">
  <h2 class="mb-4">Data sosial</h2>
  <?php if (count($sosial) > 0): ?>
    <div class="table-responsive">
    <table class="table table-bordered table-hover">
      <thead class="thead-light">
        <tr>      
          <th>Jenis Sosial</th>
          <th>Nama Media</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($sosial as $row): ?>
        <tr>
          <td><?= htmlspecialchars($row['jenis_sosial_media']) ?></td>
          <td><?= htmlspecialchars($row['nama_sosial_media']) ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    </div>
  <?php else: ?>
    <div class="alert alert-warning" role="alert">
    <p>Tidak ada data sosial.</p>
    </div>
  <?php endif; ?>


        <h2>Tambah Data sosial</h2>
        <form method="POST" action="" enctype="multipart/form-data">
            <input type="hidden" name="id_cv" value="<?php echo $cvId; ?>">

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="jenis_sosial_media">Jenis Sosial Media</label>
                    <select id="jenis_sosial_media" class="form-control" name="jenis_sosial_media">
                        <option value="Instagram">Instagram</option>
                        <option value="Facebook">Facebook</option>
                        <option value="Twitter">Twitter</option>
                        <option value="tidak punya">tidak punya</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="nama_sosial_media">Nama Media Sosial</label>
                    <input type="text" class="form-control" id="nama_sosial_media" name="nama_sosial_media" required>
                </div>
              
            </div>
            <div class="form-group " style="display: grid; place-items: end;">
            <button type="submit" name="save_sosial" class="btn btn-primary d-flex">tambah</button>
            </div>
        </form>
    </div>

                    
                 
                 