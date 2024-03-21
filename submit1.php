<?php
session_start();
include 'koneksi.php';

try {
    $koneksi->beginTransaction();
    if (isset($_SESSION['cv'])) {
        $cvId = $_SESSION['cv_id'];

        if (isset($_SESSION['organisasi']) && !empty($_SESSION['organisasi'])) {
            foreach ($_SESSION['organisasi'] as $organisasi) {
                $stmt = $koneksi->prepare("INSERT INTO tb_organisasi (cv_id, nama_organisasi, jabatan_organisasi, tahun_organisasi) VALUES (?, ?, ?, ?)");
                $stmt->execute([$cvId, $organisasi['nama_organisasi'], $organisasi['jabatan_organisasi'], $organisasi['tahun_organisasi']]);
            }
        }

        if (isset($_SESSION['pelatihan']) && !empty($_SESSION['pelatihan'])) {
            foreach ($_SESSION['pelatihan'] as $pelatihan) {

                $stmt = $koneksi->prepare("INSERT INTO tb_pelatihan (id_cv, nama_pelatihan, lembaga_pelatihan, tahun_pelatihan, dokumen_pelatihan) VALUES (?, ?, ?, ?, ?)");
                $stmt->execute([$cvId, $pelatihan['nama_pelatihan'], $pelatihan['lembaga_pelatihan'], $pelatihan['tahun_pelatihan'], $pelatihan['dokumen_pelatihan']]);
            }
        }

        if (isset($_SESSION['pendidikan']) && !empty($_SESSION['pendidikan'])) {
            foreach ($_SESSION['pendidikan'] as $pendidikan) {

                $stmt = $koneksi->prepare("INSERT INTO tb_pendidikan (id_cv, nama_pendidikan, jurusan_pendidikan, tahun_lulus, dokumen_pendidikan) VALUES (?, ?, ?, ?, ?)");
                $stmt->execute([$cvId, $pendidikan['nama_pendidikan'], $pendidikan['jurusan_pendidikan'], $pendidikan['tahun_lulus'], $pendidikan['dokumen_pendidikan']]);
            }
        }

        if (isset($_SESSION['pengalaman']) && !empty($_SESSION['pengalaman'])) {
            foreach ($_SESSION['pengalaman'] as $pengalaman) {

                $stmt = $koneksi->prepare("INSERT INTO tb_pengalaman (id_cv, tahun_mulai_pengalaman, tahun_selesai_pengalaman, tempat_pengalaman, deskripsi_pengalaman) VALUES (?, ?, ?, ?, ?)");
                $stmt->execute([$cvId, $pengalaman['tahun_mulai_pengalaman'], $pengalaman['tahun_selesai_pengalaman'], $pengalaman['tempat_pengalaman'], $pengalaman['deskripsi_pengalaman']]);
            }
        }

        if (isset($_SESSION['sertifikasi']) && !empty($_SESSION['sertifikasi'])) {
            foreach ($_SESSION['sertifikasi'] as $sertifikasi) {

                $stmt = $koneksi->prepare("INSERT INTO tb_sertifikasi (id_cv, nama_sertifikasi, lembaga_sertifikasi, tahun_sertifikasi, dokumen_sertifikasi) VALUES (?, ?, ?, ?, ?)");
                $stmt->execute([$cvId, $sertifikasi['nama_sertifikasi'], $sertifikasi['lembaga_sertifikasi'], $sertifikasi['tahun_sertifikasi'], $sertifikasi['dokumen_sertifikasi']]);
            }
        }
        if (isset($_SESSION['skill']) && !empty($_SESSION['skill'])) {
            foreach ($_SESSION['skill'] as $skill) {

                $stmt = $koneksi->prepare("INSERT INTO tb_skill (id_cv, nama_skill) VALUES (?, ?)");
                $stmt->execute([$cvId, $skill['nama_skill']]);
            }
        }
        if (isset($_SESSION['media']) && !empty($_SESSION['media'])) {
            foreach ($_SESSION['media'] as $media) {
                $stmt = $koneksi->prepare("INSERT INTO tb_sosial_media (id_cv, jenis_sosial_media, nama_sosial_media) VALUES (?, ?, ?)");
                $stmt->execute([$cvId, $media['jenis_sosial_media'], $media['nama_sosial_media']]);
            }
        }
        $koneksi->commit();
        session_unset();

        echo "Data berhasil disimpan.";
        // Atau gunakan header("Location: success.php");
    } else {
        echo "Data tidak lengkap.";
        $koneksi->rollBack();
    }
} catch (\Exception $e) {
    // Jika terjadi error
    $koneksi->rollBack();
    echo "Error: " . $e->getMessage();
}
