<?php
require_once "koneksi.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_cv = $_SESSION['id_cv'];

    // Loop through the submitted data
    foreach ($_POST['nama_sertifikasi'] as $key => $value) {
        $nama_sertifikasi = $_POST['nama_sertifikasi'][$key];
        $lembaga_sertifikasi = $_POST['lembaga_sertifikasi'][$key];
        $tahun_sertifikasi = $_POST['tahun_sertifikasi'][$key];

        // Insert data into the database
        $sql = "INSERT INTO tb_sertifikasi (id_cv,nama_sertifikasi , lembaga_sertifikasi, tahun_sertifikasi) VALUES (:id_cv, :nama_sertifikasi, :lembaga_sertifikasi, :tahun_sertifikasi)";
        $stmt = $koneksi->prepare($sql);
        $stmt->bindParam(':id_cv', $id_cv);
        $stmt->bindParam(':nama_sertifikasi', $nama_sertifikasi);
        $stmt->bindParam(':lembaga_sertifikasi', $lembaga_sertifikasi);
        $stmt->bindParam(':tahun_sertifikasi', $tahun_sertifikasi);
        
        try {
            $stmt->execute();
            echo '<script>alert("Berhasil Tambah Data");window.location="tambah_skill.php"</script>';
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

?>