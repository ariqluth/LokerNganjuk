<?php
include "heder.php"; // Asumsi bahwa koneksi database ada di dalam file ini atau file lain yang di-include di sini
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
                  $sql = "SELECT * FROM tb_cv";
                  $stmt = $koneksi->prepare($sql);
                  $stmt->execute();
                  $hasil = $stmt->fetchAll();
                  $no = 1;
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
                                              <a href='#' data-id_cv='{$idCv}' class='btn btn-primary btn-sm show-org'>Klik</a>
                                                    <a href='detail_cv.php?id={$idCv}' class='btn btn-warning btn-sm'>Lihat</a>
                                                    <a href='#' class='btn btn-danger btn-sm' onclick='confirmDeletion({$idCv});'>Hapus</a>
                                                </td>
                                            </tr>";
                  }
                  ?>

                  <?php
                  $sql = "SELECT * FROM tb_organisasi";
                  $stmt = $koneksi->prepare($sql);
                  $stmt->execute();
                  $hasil = $stmt->fetchAll();
                  foreach ($hasil as $row) {
                    $idCv = htmlspecialchars($row['id_cv']);
                    echo "<tr id='example1' class='org-row' data-cv_id='{$idCv}' style='display:none;'>";
                  }
                  ?>
                  <td colspan="12">
                    <h4>Organisasi</h4>
                    <table id="example1" class="table table-bordered">
                      <tr>
                        <th>No</th>
                        <th colspan=" 2">Nama Organisasi</th>
                        <th colspan="2">Jabatan Organisasi</th>
                        <th colspan="2">Tahun Organisasi</th>
                      </tr>
                      <?php
                      $sql = "SELECT * FROM tb_organisasi";
                      $stmt = $koneksi->prepare($sql);
                      $stmt->execute();
                      $hasil = $stmt->fetchAll();
                      $no = 1;
                      foreach ($hasil as $row) {
                        echo "<tr  >
                                                <td>" . $no++ . "</td>
                                                <td colspan='2'>" . htmlspecialchars($row['nama_organisasi']) . "</td>
                                                <td colspan='2'>" . htmlspecialchars($row['jabatan_organisasi']) . "</td>
                                                <td colspan='2'>" . htmlspecialchars($row['tahun_organisasi']) . "</td>
                                             
                                            </tr>";
                      }
                      ?>
                    </table>



                    <table>
                      <tr colspan="6">

                        <h4>Pelatihan</h4>

                      </tr>

                      <tbody>
                        <tr>
                          <th>No</th>
                          <th>Nama Pelatihan</th>
                          <th colspan="2">Lembaga Pelatihan</th>
                          <th>Tahun Pelatihan</th>
                          <th>Dokumen Pelatihan</th>
                        </tr>



                        <?php
                        $sql = "SELECT * FROM tb_pelatihan";
                        $stmt = $koneksi->prepare($sql);
                        $stmt->execute();
                        $hasil = $stmt->fetchAll();
                        $no = 1;
                        foreach ($hasil as $row) {
                          echo "<tr  >
                                                <td>" . $no++ . "</td>
                                                <td>" . htmlspecialchars($row['nama_pelatihan']) . "</td>
                                                <td colspan='2'>" . htmlspecialchars($row['lembaga_pelatihan']) . "</td>
                                                <td>" . htmlspecialchars($row['tahun_pelatihan']) . "</td>
                                                <td>" . htmlspecialchars($row['dokumen_pelatihan']) . "</td>
                                             
                                            </tr>";
                        }
                        ?>


                      </tbody>
                    </table>
                    <br />
                    <!--  -->
                    <table>
                      <tr colspan="6">

                        <h4>Pendidikan</h4>

                      </tr>

                      <tbody>
                        <tr>
                          <th>No</th>
                          <th>Nama Pendidikan</th>
                          <th colspan="2">Lembaga Pendidikan</th>
                          <th>Tahun Lulus</th>
                          <th>Dokumen Pendidikan</th>
                        </tr>



                        <?php
                        $sql = "SELECT * FROM tb_pendidikan";
                        $stmt = $koneksi->prepare($sql);
                        $stmt->execute();
                        $hasil = $stmt->fetchAll();
                        $no = 1;
                        foreach ($hasil as $row) {
                          echo "<tr  >
                                                <td>" . $no++ . "</td>
                                                <td>" . htmlspecialchars($row['nama_pendidikan']) . "</td>
                                                <td colspan='2'>" . htmlspecialchars($row['jurusan_pendidikan']) . "</td>
                                                <td>" . htmlspecialchars($row['tahun_lulus']) . "</td>
                                                <td>" . htmlspecialchars($row['dokumen_pendidikan']) . "</td>
                                             
                                            </tr>";
                        }
                        ?>
                      </tbody>
                    </table>

                    <table>
                      <tr colspan="6">

                        <h4>Pengalaman</h4>

                      </tr>

                      <tbody>
                        <tr>
                          <th>No</th>
                          <th>Tahun Mulai Pengalaman</th>
                          <th colspan="2">Tahun Selesai Pengalaman</th>
                          <th>Tempat Pengalaman</th>
                          <th>Deskripsi Pengalaman</th>
                        </tr>



                        <?php
                        $sql = "SELECT * FROM tb_pengalaman";
                        $stmt = $koneksi->prepare($sql);
                        $stmt->execute();
                        $hasil = $stmt->fetchAll();
                        $no = 1;
                        foreach ($hasil as $row) {
                          echo "<tr  >
                                                <td>" . $no++ . "</td>
                                                <td>" . htmlspecialchars($row['tahun_mulai_pengalaman']) . "</td>
                                                <td colspan='2'>" . htmlspecialchars($row['tahun_selesai_pengalaman']) . "</td>
                                                <td>" . htmlspecialchars($row['tempat_pengalaman']) . "</td>
                                                <td>" . htmlspecialchars($row['deskripsi_pengalaman']) . "</td>
                                             
                                            </tr>";
                        }
                        ?>


                      </tbody>
                    </table>
                    <table>
                      <tr colspan="6">

                        <h4>Sertifikasi</h4>

                      </tr>

                      <tbody>
                        <tr>
                          <th>No</th>
                          <th>Nama Sertifikasi</th>
                          <th colspan="2">Lembaga Sertifikasi</th>
                          <th>Tahun Sertifikasi</th>
                          <th>Dokumen Sertifikasi</th>
                        </tr>



                        <?php
                        $sql = "SELECT * FROM tb_sertifikasi";
                        $stmt = $koneksi->prepare($sql);
                        $stmt->execute();
                        $hasil = $stmt->fetchAll();
                        $no = 1;
                        foreach ($hasil as $row) {
                          echo "<tr  >
                                                <td>" . $no++ . "</td>
                                                <td>" . htmlspecialchars($row['nama_sertifikasi']) . "</td>
                                                <td colspan='2'>" . htmlspecialchars($row['lembaga_sertifikasi']) . "</td>
                                                <td>" . htmlspecialchars($row['tahun_sertifikasi']) . "</td>
                                                <td>" . htmlspecialchars($row['dokumen_sertifikasi']) . "</td>
                                             
                                            </tr>";
                        }
                        ?>
                      </tbody>
                    </table>
                    <table>
                      <tr colspan="6">
                        <h4>Skill</h4>
                      </tr>
                      <tbody>
                        <tr>
                          <th>No</th>
                          <th colspan="5">Nama Skill</th>
                        </tr>
                        <?php
                        $sql = "SELECT * FROM tb_skill";
                        $stmt = $koneksi->prepare($sql);
                        $stmt->execute();
                        $hasil = $stmt->fetchAll();
                        $no = 1;
                        foreach ($hasil as $row) {
                          echo "<tr  >
                                                <td>" . $no++ . "</td>
                                                <td colspan='5'>" . htmlspecialchars($row['nama_skill']) . "</td>
                                               
                                             
                                            </tr>";
                        }
                        ?>

                      </tbody>
                    </table>
                    <table>
                      <tr colspan="6">

                        <h4>Media Sosial</h4>

                      </tr>

                      <tbody>
                        <tr>
                          <th>No</th>
                          <th colspan="2">Jenis Sosial Media</th>
                          <th colspan="3">Nama Sosial Media</th>

                        </tr>

                        <?php
                        $sql = "SELECT * FROM tb_sosial_media";
                        $stmt = $koneksi->prepare($sql);
                        $stmt->execute();
                        $hasil = $stmt->fetchAll();
                        $no = 1;
                        foreach ($hasil as $row) {
                          echo "<tr  >
                                                <td>" . $no++ . "</td>
                                                <td colspan='2'>" . htmlspecialchars($row['jenis_sosial_media']) . "</td>
                                                <td colspan='3'>" . htmlspecialchars($row['nama_sosial_media']) . "</td>
                                               
                                             
                                            </tr>";
                        }
                        ?>

                      </tbody>
                    </table>
                  </td>
                  </tr>
                </tbody>
              </table>
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

<script>
  document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll('.show-org').forEach(function(button) {
      button.addEventListener('click', function(e) {
        e.preventDefault();
        var idCv = this.getAttribute('data-id_cv');
        document.querySelectorAll(".org-row[data-cv_id='" + idCv + "']").forEach(function(row) {
          if (row.style.display === 'none') {
            row.style.display = '';
          } else {
            row.style.display = 'none';
          }
        });
      });
    });
  });
</script>

<script>
  function confirmDeletion(id) {
    var confirmDelete = confirm("Apakah Anda yakin ingin menghapus data ini?");
    if (confirmDelete) {

      window.location.href = 'hapus_cv.php?id=' + id;
    }
  }
</script>


<?php include "footer.php"; ?>