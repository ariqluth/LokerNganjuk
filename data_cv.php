<?php
include "heder.php"; // Asumsi bahwa koneksi database ada di dalam file ini atau file lain yang di-include di sini

if (isset($_SESSION['message'])) {
  echo '<div class="alert alert-success">' . $_SESSION['message'] . '</div>';
  unset($_SESSION['message']);
}
if (isset($_SESSION['error'])) {
  echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
  unset($_SESSION['error']);
}

$search = isset($_GET['search']) ? "%" . $_GET['search'] . "%" : "%%";
$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

$sql = "SELECT * FROM tb_cv WHERE cv_nama LIKE ? OR cv_tempat_lahir LIKE ? LIMIT ?, ?";
$stmt = $koneksi->prepare($sql);
$stmt->bindParam(1, $search);
$stmt->bindParam(2, $search);
$stmt->bindParam(3, $start, PDO::PARAM_INT);
$stmt->bindParam(4, $limit, PDO::PARAM_INT);
$stmt->execute();
$hasil = $stmt->fetchAll();

  $no = 1;

$sqlCount = "SELECT COUNT(*) AS jumlah FROM tb_cv WHERE cv_nama LIKE ? OR cv_tempat_lahir LIKE ?";
$stmtCount = $koneksi->prepare($sqlCount);
$stmtCount->execute([$search, $search]);
$rowCount = $stmtCount->fetch();
$totalPages = ceil($rowCount['jumlah'] / $limit);
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data CV</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">

            <div class="card-header">
              <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h4 class="card-title">Data CV</h4>
                <form class="form-inline" action="" method="GET">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
                <a href="tambah_cv.php" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah CV</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered">
                <tbody>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Tinggi Badan</th>
                    <th>Berat Badan</th>
                    <th>Alamat</th>
                    <th>No.Hp</th>
                    <th>Status</th>
                    <th>Email</th>
                    <th>Aksi</th>
                  </tr>
                  <?php
               
                  foreach ($hasil as $row) {
                    $idCv = htmlspecialchars($row['id']);
                    echo "<tr>
                                                <td>" . $no++ . "</td>
                                                <td>" . htmlspecialchars($row['cv_nama']) . "</td>
                                                <td>" . htmlspecialchars($row['cv_tempat_lahir']) . "</td>
                                                <td>" . htmlspecialchars($row['cv_tanggal_lahir']) . "</td>
                                                <td>" . htmlspecialchars($row['cv_jenis_kelamin']) . "</td>
                                                <td>" . htmlspecialchars($row['cv_tinggi_badan']) . "</td>
                                                <td>" . htmlspecialchars($row['cv_berat_badan']) . "</td>
                                                <td>" . htmlspecialchars($row['cv_alamat']) . "</td>
                                                <td>" . htmlspecialchars($row['cv_hp']) . "</td>
                                                <td>" . htmlspecialchars($row['cv_status']) . "</td>
                                                <td>" . htmlspecialchars($row['cv_email']) . "</td>
                                                <td>
                                             
                                                <a href='detail_cv.php?id={$row['id']}' class='btn btn-warning btn-sm'>Lihat</a>
                                                <a href='hapus_cv.php?id= {$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm('Apakah Anda yakin ingin menghapus data ini?');'>Hapus</a>

                                                </td>
                                            </tr>";
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <div class="col-12">
    <ul class="pagination">
        <?php for($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?php echo ($page == $i) ? 'active' : ''; ?>">
                <a class="page-link" href="?page=<?php echo $i; ?>&search=<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>"><?php echo $i; ?></a>
            </li>
        <?php endfor; ?>
    </ul>
</div>
            <!-- /.card-body -->
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


<?php include "footer.php"; ?>