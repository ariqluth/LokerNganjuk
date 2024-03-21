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
              <table class="table table-bordered table-hover">
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
                  $sql = "SELECT cv.*, org.id AS org_id, org.nama_organisasi, org.jabatan_organisasi, org.tahun_organisasi, pel.id AS pel_id, pel.nama_pelatihan, pel.lembaga_pelatihan, pel.tahun_pelatihan,dokumen_pelatihan
                  FROM tb_cv AS cv
                  LEFT JOIN tb_organisasi AS org ON cv.id = org.id_cv
                  LEFT JOIN tb_pelatihan AS pel ON cv.id = pel.id_cv
                  ORDER BY cv.id, org.id, pel.id";
                  try {
                    $stmt = $koneksi->prepare($sql);
                    $stmt->execute();
                    $hasil = $stmt->fetchAll();
                  } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                  }
                  // Siapkan struktur untuk menyimpan data organisasi per CV
                  $cvOrganisasi = [];
                  $cvPelatihan = [];
                  $no = 1;
                  $nog = 1;
                  $currentCvId = 0;
                  foreach ($hasil as $row) {
                    $idCv = htmlspecialchars($row['id']);
                    if ($currentCvId != $idCv) {
                      
                      
                      echo "<tr data-widget='expandable-table' aria-expanded='true'>
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
                                            <a href='#' data-id_cv='{$row['id']}' class='btn btn-primary btn-sm show-org'>Klik</a>
                                             <a href='detail_cv.php?id={$row['id']}' class='btn btn-warning btn-sm'>Lihat</a>
                                             <a href='#' class='btn btn-danger btn-sm' onclick='confirmDeletion({$row['id']});'>Hapus</a>
                                                </td>
                                            </tr>";
                      $currentCvId = $idCv;
                      
                    }
                    // Kumpulkan data organisasi per CV
                    if (!empty($row['org_id'])) {
                      $cvOrganisasiData[$idCv][] = $row;
                    }

                    if (!empty($row['pel_id'])) {
                      $cvPelatihan[$idCv][] = $row;
                    }
               
                  // Sekarang, tampilkan data organisasi yang terkumpul untuk setiap CV
                  foreach ($cvOrganisasiData as $idCv => $organisasiRows) {
                    echo "<tr class='expandable-body org-row' data-cv_id='{$idCv}' style='display:none;'>
            <td colspan='12'>
              <table class='table table-bordered table-hover'>
                  <tr colspan='6'><th><h4>Organisasi</h4></th></tr>
                  <tr>
                
                    <th>Nama Organisasi</th>
                    <th>Jabatan</th>
                    <th>Tahun</th>
                  </tr>
            
               ";

                    foreach ($organisasiRows as $orgRow) {
                      echo "<tr>
              
                <td>" . htmlspecialchars($orgRow['nama_organisasi']) . "</td>
                <td>" . htmlspecialchars($orgRow['jabatan_organisasi']) . "</td>
                <td>" . htmlspecialchars($orgRow['tahun_organisasi']) . "</td>
              </tr>";
                    }
                    echo "
              </table>
                  
          ";
                  }
                  foreach ($cvPelatihan as $idCv => $pelatihanRow) {
                    echo "
           
              <table class='table table-bordered table-hover'>
                  <tr colspan='12'><th><h4>Pelatihan</h4></th></tr>
                  <tr>
                
                    <th>Nama Pelatihan</th>
                    <th colspan='2'>Lembaga Pelatihan</th>
                    <th>Tahun Pelatihan</th>
                    <th>Dokumen Pelatihan</th>
                  </tr>
               ";
                    foreach ($pelatihanRow as $pelRow) {
                      echo "<tr >
                                 
                                                <td>" . htmlspecialchars($pelRow['nama_pelatihan']) . "</td>
                                                <td colspan='2'>" . htmlspecialchars($pelRow['lembaga_pelatihan']) . "</td>
                                                <td>" . htmlspecialchars($pelRow['tahun_pelatihan']) . "</td>
                                                <td>" . htmlspecialchars($pelRow['dokumen_pelatihan']) . "</td>
                                            </tr>";
                    }
                    echo "  
              </table>
            </td>
          </tr>";
                  
                }
              }
                  ?>
              
                
                  <!--  -->
                  <!-- <table>
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
              </table> -->
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
    // Mendengarkan klik pada setiap tombol yang menunjukkan organisasi
    document.querySelectorAll('.show-org').forEach(function(button) {
      button.addEventListener('click', function(e) {
        e.preventDefault();
        var idCv = this.getAttribute('data-id_cv');

        // Tutup semua row yang terbuka
        document.querySelectorAll(".org-row").forEach(function(row) {
          if (row.getAttribute('data-cv_id') !== idCv) {
            row.style.display = 'none';
          }
        });

        // Toggle display row yang terkait dengan tombol yang diklik
        var relatedOrgRow = document.querySelector(".org-row[data-cv_id='" + idCv + "']");
        if (relatedOrgRow) {
          relatedOrgRow.style.display = relatedOrgRow.style.display === 'none' ? '' : 'none';
        }
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