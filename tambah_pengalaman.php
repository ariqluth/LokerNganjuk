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
$stmt = $koneksi->prepare("SELECT * FROM tb_pengalaman WHERE id_cv = ?");
$stmt->execute([$cvId]);
$pendidikan = $stmt->fetchAll();

if (isset($_POST['save_pengalaman'])) {
  include "koneksi.php";
 
  $cvTempat = $_POST['tempat_pengalaman'];
  $cvTahunMulai = $_POST['tahun_mulai_pengalaman'];
  $cvTahunSelesai = $_POST['tahun_selesai_pengalaman'];
  $cvDeskripsi = $_POST['deskripsi_pengalaman'];
 

  $stmt = $koneksi->prepare("INSERT INTO tb_pengalaman (id_cv , tahun_mulai_pengalaman, tahun_selesai_pengalaman, tempat_pengalaman, deskripsi_pengalaman) VALUES (?, ?, ?, ?, ?)");
  $stmt->execute([$cvId, $cvTahunMulai, $cvTahunSelesai, $cvTempat, $cvDeskripsi]);

  $pengId = $koneksi->lastInsertId();
  header('Location: ' . $_SERVER['REQUEST_URI']);
}

?>

<div class="container mt-5">
  <h2>Data Pengalaman</h2>
  <?php if (count($pendidikan) > 0): ?>
    <div class="table-responsive">
    <table class="table table-bordered table-hover">
      <thead class="thead-light">
        <tr>
          <th>Tempat Pengalaman</th>
          <th>Tahun Mulai</th>
          <th>Tahun Selesai</th>
          <th>Deskripsi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($pendidikan as $row): ?>
        <tr>
          <td><?= htmlspecialchars($row['tempat_pengalaman']) ?></td>
          <td><?= htmlspecialchars($row['tahun_mulai_pengalaman']) ?></td>
          <td><?= htmlspecialchars($row['tahun_selesai_pengalaman']) ?></td>
          <td><?= htmlspecialchars($row['deskripsi_pengalaman']) ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    </div>
  <?php else: ?>
    <div class="alert alert-warning" role="alert">
    Tidak ada data pengalaman.
    </div>
  <?php endif; ?>


  <h2 class="mt-5">Tambah Data Pengalaman</h2>
        <form method="POST" action="" enctype="multipart/form-data">
            <input type="hidden" name="id_cv" value="<?php echo $cvId; ?>">
            <div class="form-row">
               
                <div class="form-group col-md-5">
                    <label for="tempat_pengalaman">Tempat Pengalaman</label>
                    <input type="text" class="form-control" id="tempat_pengalaman" name="tempat_pengalaman" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="tahun_mulai_pengalaman">Tahun Mulai</label>
                    <input type="date" class="form-control" id="tahun_mulai_pengalaman" name="tahun_mulai_pengalaman" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="tahun_selesai_pengalaman">Tahun Selesai</label>
                    <input type="date" class="form-control" id="tahun_selesai_pengalaman" name="tahun_selesai_pengalaman" required>
                </div>
              
                <div class="form-group col-md-12 ">
                    <label for="deskripsi_pengalaman">Deskripsi Pengalaman</label>
                    <textarea  name="deskripsi_pengalaman" cols="30" rows="5" class="form-control"></textarea>
                </div>
            </div>
            <div class="form-group " style="display: grid; place-items: end;">
            <button type="submit" name="save_pengalaman" class="btn btn-primary d-flex">tambah</button>
            </div>
            <br />
        </form>
    </div>

                    
                 
                 