<link rel="stylesheet" href="detail.css">
<?php
include "hedermanager.php"; // Asumsi bahwa koneksi database ada di dalam file ini atau file lain yang di-include di sini

$cvDetail = null;
$organisasiDetails = [];

// Cek apakah ID ada di URL
if (isset($_GET['id'])) {
    $idCv = htmlspecialchars($_GET['id']);

    // Query untuk mengambil data CV berdasarkan ID
    $sqlCv = "SELECT * FROM tb_cv WHERE id = :id";
    $stmtCv = $koneksi->prepare($sqlCv);
    $stmtCv->bindParam(':id', $idCv, PDO::PARAM_INT);
    $stmtCv->execute();
    $cvDetail = $stmtCv->fetch(PDO::FETCH_ASSOC);

    // Query untuk mengambil data organisasi yang terkait berdasarkan ID CV
    $sqlOrg = "SELECT nama_organisasi, jabatan_organisasi, tahun_organisasi
                FROM tb_organisasi
                WHERE id_cv = :id";
    $stmtOrg = $koneksi->prepare($sqlOrg);

    $sqlPel = "SELECT nama_pelatihan, lembaga_pelatihan, tahun_pelatihan, dokumen_pelatihan
                FROM tb_pelatihan
                WHERE id_cv = :id";
    $stmtPel = $koneksi->prepare($sqlPel);

    $sqlPed = "SELECT nama_pendidikan, jurusan_pendidikan, tahun_lulus, dokumen_pendidikan
                FROM tb_pendidikan
                WHERE id_cv = :id";
    $stmtPed = $koneksi->prepare($sqlPed);

    $sqlPeg = "SELECT tahun_mulai_pengalaman, tahun_selesai_pengalaman, tempat_pengalaman, deskripsi_pengalaman
                FROM tb_pengalaman
                WHERE id_cv = :id";
    $stmtPeg = $koneksi->prepare($sqlPeg);

    $sqlSer = "SELECT nama_sertifikasi, lembaga_sertifikasi, tahun_sertifikasi, dokumen_sertifikasi
                FROM tb_sertifikasi
                WHERE id_cv = :id";
    $stmtSer = $koneksi->prepare($sqlSer);


    $sqlSkil = "SELECT nama_skill
                FROM tb_skill
                WHERE id_cv = :id";
    $stmtSkil = $koneksi->prepare($sqlSkil);

    $sqlMed = "SELECT jenis_sosial_media, nama_sosial_media
                FROM tb_sosial_media
                WHERE id_cv = :id";
    $stmtMed = $koneksi->prepare($sqlMed);

    $stmtOrg->bindParam(':id', $idCv, PDO::PARAM_INT);
    $stmtOrg->execute();
    $stmtPel->bindParam(':id', $idCv, PDO::PARAM_INT);
    $stmtPel->execute();
    $stmtPed->bindParam(':id', $idCv, PDO::PARAM_INT);
    $stmtPed->execute();
    $stmtPeg->bindParam(':id', $idCv, PDO::PARAM_INT);
    $stmtPeg->execute();
    $stmtSer->bindParam(':id', $idCv, PDO::PARAM_INT);
    $stmtSer->execute();
    $stmtSkil->bindParam(':id', $idCv, PDO::PARAM_INT);
    $stmtSkil->execute();
    $stmtMed->bindParam(':id', $idCv, PDO::PARAM_INT);
    $stmtMed->execute();
    $organisasiDetails = $stmtOrg->fetchAll(PDO::FETCH_ASSOC);
    $pelatihanDetails = $stmtPel->fetchAll(PDO::FETCH_ASSOC);
    $pendidikanDetails = $stmtPed->fetchAll(PDO::FETCH_ASSOC);
    $pengalamanDetails = $stmtPeg->fetchAll(PDO::FETCH_ASSOC);
    $sertifikasiDetails = $stmtSer->fetchAll(PDO::FETCH_ASSOC);
    $skillDetails = $stmtSkil->fetchAll(PDO::FETCH_ASSOC);
    $sosialMediaDetails = $stmtMed->fetchAll(PDO::FETCH_ASSOC);
}



// HTML dan lainnya...
?>
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row profiles">
                    <!-- Right Column -->
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Tentang Saya</h3>
                            </div>
                            <div class="card-body">
                                <div class="col-md-12">
                                    <!-- Pengalaman Organisasi -->
                                    <div class="card">
                                        <div class="card-body">
                                            <ul>
                                                <li>
                                                    <h4>Organisasi</h4>
                                                </li>
                                            </ul>
                                            <?php foreach ($organisasiDetails as $org) : ?>
                                                <h5>Nama Organisasi : <?php echo htmlspecialchars($org['nama_organisasi']); ?></h5>
                                                <p>Jabatan : <?php echo htmlspecialchars($org['jabatan_organisasi']); ?></p>
                                                <p>Tahun : <?php echo htmlspecialchars($org['tahun_organisasi']); ?></p>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- pemisah -->
                                <div class="col-md-12">
                                    <!-- Pengalaman Pelatihan -->
                                    <div class="card">
                                        <div class="card-body">
                                            <ul>
                                                <li>
                                                    <h4>Pelatihan</h4>
                                                </li>
                                            </ul>
                                            <?php foreach ($pelatihanDetails as $pel) : ?>
                                                <h5>Nama Pelatihan : <?php echo htmlspecialchars($pel['nama_pelatihan']); ?></h5>
                                                <p>Jabatan : <?php echo htmlspecialchars($pel['lembaga_pelatihan']); ?></p>
                                                <p>Tahun : <?php echo htmlspecialchars($pel['tahun_pelatihan']); ?></p>
                                                <a href="<?php echo htmlspecialchars($pel['dokumen_pelatihan']); ?>">klik download dokumen</a>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- pemisah -->

                                <!-- pemisah -->
                                <div class="col-md-12">
                                    <!-- Pengalaman Pengalaman -->
                                    <div class="card">
                                        <div class="card-body">
                                            <ul>
                                                <li>
                                                    <h4>Pengalaman</h4>
                                                </li>
                                            </ul>
                                            <?php foreach ($pengalamanDetails as $peg) : ?>
                                                <h5>Tempat Pengalaman : <?php echo htmlspecialchars($peg['tempat_pengalaman']); ?></h5>
                                                <p>Deskripsi : <?php echo htmlspecialchars($peg['deskripsi_pengalaman']); ?></p>
                                                <div class="row justify-content-around">
                                                    <p>Tahun Mulai : <?php echo htmlspecialchars($peg['tahun_mulai_pengalaman']); ?></p>
                                                    <p>Tahun Selesai : <?php echo htmlspecialchars($peg['tahun_selesai_pengalaman']); ?></p>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- pemisah -->
                                <div class="col-md-12">
                                    <!-- Pengalaman Sertifikasi -->
                                    <div class="card">
                                        <div class="card-body">
                                            <ul>
                                                <li>
                                                    <h4>Sertifikasi</h4>
                                                </li>
                                            </ul>
                                            <?php foreach ($sertifikasiDetails as $ser) : ?>
                                                <h5>Lembaga Sertifikasi : <?php echo htmlspecialchars($ser['lembaga_sertifikasi']); ?></h5>
                                                <p>Nama Sertifikasi : <?php echo htmlspecialchars($ser['nama_sertifikasi']); ?></p>
                                                <p>Tahun Sertifikasi : <?php echo htmlspecialchars($ser['tahun_sertifikasi']); ?></p>
                                                <a href="<?php echo htmlspecialchars($ser['dokumen_sertifikasi']); ?>">klik download dokumen</a>
                        
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Skills Box -->
                        <!-- Repeat for each section like experiences, certifications, etc -->
                    </div>
                    <!-- Left column -->

                    <div class="col-md-4">
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="<?php echo htmlspecialchars($cvDetail['cv_foto']); ?>" alt="User profile picture" style="max-height: 100px; ">
                                </div>

                                <h3 class="profile-username text-center"> <?php echo htmlspecialchars($cvDetail['cv_nama']); ?><br><small>Pelamar</small></h3>

                            </div>
                        </div>
                        <!-- Pendidikan -->
                        <div class="card card-primary">
                            <div class="card-body ">
                                <ul>
                                    <li>
                                        <h4>Pendidikan</h4>
                                    </li>
                                </ul>
                                <?php foreach ($pendidikanDetails as $ped) : ?>
                                    <h5>Nama Pendidikan : <?php echo htmlspecialchars($ped['nama_pendidikan']); ?></h5>
                                    <div class="row  justify-content-around">
                                        <p>Jurusan : <?php echo htmlspecialchars($ped['jurusan_pendidikan']); ?></p>
                                        <p>Tahun Lulus : <?php echo htmlspecialchars($ped['tahun_lulus']); ?></p>
                                        <a href="<?php echo htmlspecialchars($ped['dokumen_pendidikan']); ?>">  klik download dokumen</a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="card-body ">
                                <ul>
                                    <li>
                                        <h4>Skill</h4>
                                    </li>
                                </ul>
                                <?php foreach ($skillDetails as $sil) : ?>
                                    <p>Nama Skill : <?php echo htmlspecialchars($sil['nama_skill']); ?></p>
                                <?php endforeach; ?>

                            </div>
                        </div>
                       

                        <!-- Media Sosial -->
                        <div class="card card-primary card-outline">
                            <div class="card-body ">
                                <ul>
                                    <li>
                                        <h4>Media Sosial</h4>
                                    </li>
                                </ul>
                                <?php foreach ($sosialMediaDetails as $med) : ?>
                                    <p><?php echo htmlspecialchars($med['jenis_sosial_media']); ?> : <?php echo htmlspecialchars($med['nama_sosial_media']); ?></p>
                                    
                                <?php endforeach; ?>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>
    </div>
</div>

<!-- <?php include "footer.php"; ?> -->