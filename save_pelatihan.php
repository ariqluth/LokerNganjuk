<?php
require_once "koneksi.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_cv = $_SESSION['id_cv'];

    // Loop through the submitted data
    foreach ($_POST['nama_pelatihan'] as $key => $value) {
        $nama_pelatihan = $_POST['nama_pelatihan'][$key];
        $lembaga_pelatihan = $_POST['lembaga_pelatihan'][$key];
        $tahun_pelatihan = $_POST['tahun_pelatihan'][$key];

        // Insert data into the database
        $sql = "INSERT INTO tb_pelatihan (id_cv,nama_pelatihan , lembaga_pelatihan, tahun_pelatihan) VALUES (:id_cv, :nama_pelatihan, :lembaga_pelatihan, :tahun_pelatihan)";
        $stmt = $koneksi->prepare($sql);
        $stmt->bindParam(':id_cv', $id_cv);
        $stmt->bindParam(':nama_pelatihan', $nama_pelatihan);
        $stmt->bindParam(':lembaga_pelatihan', $lembaga_pelatihan);
        $stmt->bindParam(':tahun_pelatihan', $tahun_pelatihan);
        
        try {
            $stmt->execute();
            echo '<script>alert("Berhasil Tambah Data");window.location="tambah_sertifikasi.php"</script>';
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

?>