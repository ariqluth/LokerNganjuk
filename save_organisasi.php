<?php
require_once "koneksi.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_cv = $_SESSION['id_cv'];

    // Loop through the submitted data
    foreach ($_POST['nama_organisasi'] as $key => $value) {
        $nama_organisasi = $_POST['nama_organisasi'][$key];
        $jabatan_organisasi = $_POST['jabatan_organisasi'][$key];
        $tahun_organisasi = $_POST['tahun_organisasi'][$key];

        // Insert data into the database
        $sql = "INSERT INTO tb_organisasi (id_cv,nama_organisasi , jabatan_organisasi, tahun_organisasi) VALUES (:id_cv, :nama_organisasi, :jabatan_organisasi, :tahun_organisasi)";
        $stmt = $koneksi->prepare($sql);
        $stmt->bindParam(':id_cv', $id_cv);
        $stmt->bindParam(':nama_organisasi', $nama_organisasi);
        $stmt->bindParam(':jabatan_organisasi', $jabatan_organisasi);
        $stmt->bindParam(':tahun_organisasi', $tahun_organisasi);
        
        try {
            $stmt->execute();
            echo '<script>alert("Berhasil Tambah Data");window.location="tambah_pelatihan.php"</script>';
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

?>