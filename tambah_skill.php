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
$stmt = $koneksi->prepare("SELECT * FROM tb_skill WHERE id_cv = ?");
$stmt->execute([$cvId]);
$skill = $stmt->fetchAll();

if (isset($_POST['save_skill'])) {
  include "koneksi.php";
 
  $cvNama = $_POST['nama_skill'];
 

  $stmt = $koneksi->prepare("INSERT INTO tb_skill (id_cv, nama_skill) VALUES (?, ?)");
  $stmt->execute([$cvId, $cvNama]);

  $orId = $koneksi->lastInsertId();
  header('Location: ' . $_SERVER['REQUEST_URI']);
}

?>

<div class="container mt-5">
  <h2>Data skill</h2>
  <?php if (count($skill) > 0): ?>
    <div class="table-responsive">
    <table class="table table-bordered table-hover">
      <thead class="thead-light">
        <tr>
          <th>Nama skill</th>  
        </tr>
      </thead>
      <tbody>
        <?php foreach ($skill as $row): ?>
        <tr>
          <td><?= htmlspecialchars($row['nama_skill']) ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    </div>
  <?php else: ?>
    <div class="alert alert-warning" role="alert">
    Tidak ada data Skill.
    </div>
  <?php endif; ?>

        <h2 class="mt-5">Tambah Data Skill</h2>
        <form method="POST" action="" enctype="multipart/form-data">
            <input type="hidden" name="id_cv" value="<?php echo $cvId; ?>">

            <div class="form-row">
               
                <div class="form-group col-md-12">
                    <label for="nama_skill">Nama Skill</label>
                    <input type="text" class="form-control" id="nama_skill" name="nama_skill" required>
                </div>
              
            </div>
            <div class="form-group " style="display: grid; place-items: end;">
            <button type="submit" name="save_skill" class="btn btn-primary d-flex">tambah</button>
            </div>
        </form>
    </div>

                    
                 
                 