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
$stmt = $koneksi->prepare("SELECT * FROM tb_organisasi WHERE id_cv = ?");
$stmt->execute([$cvId]);
$organisasi = $stmt->fetchAll();

if (isset($_POST['save_organisasi'])) {
  include "koneksi.php";
 
  $cvNama = $_POST['nama_organisasi'];
  $cvJabatan = $_POST['jabatan_organisasi'];
  $cvTahun = $_POST['tahun_organisasi'];
  
 

  $stmt = $koneksi->prepare("INSERT INTO tb_organisasi (id_cv, nama_organisasi, jabatan_organisasi, tahun_organisasi) VALUES (?, ?, ?, ?)");
  $stmt->execute([$cvId, $cvNama, $cvJabatan, $cvTahun]);

  $orId = $koneksi->lastInsertId();
  header('Location: ' . $_SERVER['REQUEST_URI']);
}

?>

<div class="container mt-5">
  <h2>Data Organisasi</h2>
  <?php if (count($organisasi) > 0): ?>
    <div class="table-responsive">
    <table class="table table-bordered table-hover">
      <thead class="thead-light">
        <tr>
          <th>Nama Organisasi</th>
          <th>Jabatan </th>
          <th>Tahun </th>
          
        </tr>
      </thead>
      <tbody>
        <?php foreach ($organisasi as $row): ?>
        <tr>
          <td><?= htmlspecialchars($row['nama_organisasi']) ?></td>
          <td><?= htmlspecialchars($row['jabatan_organisasi']) ?></td>
          <td><?= htmlspecialchars($row['tahun_organisasi']) ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    </div>
  <?php else: ?>
    <p>Tidak ada data Organisasi.</p>
  <?php endif; ?>

        <h2 class="mt-5">Tambah Data Organisasi</h2>
        <form method="POST" action="" enctype="multipart/form-data">
            <input type="hidden"  name="id_cv" value="<?php echo $cvId; ?>">

            <div class="form-row">
               
                <div class="form-group col-md-5">
                    <label for="nama_organisasi">Nama Organisasi</label>
                    <input type="text" class="form-control" id="nama_organisasi" name="nama_organisasi" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="jabatan_organisasi">Jabatan Organisasi</label>
                    <input type="text" class="form-control" id="jabatan_organisasi" name="jabatan_organisasi" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="tahun_organisasi">Tahun Organisasi</label>
                    <input type="date" class="form-control" id="tahun_organisasi" name="tahun_organisasi" required>
                </div>
              
              
            </div>
            <div class="form-group " style="display: grid; place-items: end;">
            <button type="submit" name="save_organisasi" class="btn btn-primary d-flex">tambah</button>
            </div>
        </form>
    </div>

                    
                 
                 