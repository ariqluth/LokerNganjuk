<?php
require_once "koneksi.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_cv = $_SESSION['id_cv'];

    // Loop through the submitted data
    foreach ($_POST['tahun_mulai_pengalaman'] as $key => $value) {
        $tahun_mulai_pengalaman = $_POST['tahun_mulai_pengalaman'][$key];
        $tahun_selesai_pengalaman = $_POST['tahun_selesai_pengalaman'][$key];
        $tempat_pengalaman = $_POST['tempat_pengalaman'][$key];
        $deskripsi_pengalaman = $_POST['deskripsi_pengalaman'][$key];

        // Insert data into the database
        $sql = "INSERT INTO tb_pengalaman (id_cv, tahun_mulai_pengalaman, tahun_selesai_pengalaman, tempat_pengalaman, deskripsi_pengalaman) VALUES (:id_cv, :tahun_mulai_pengalaman, :tahun_selesai_pengalaman, :tempat_pengalaman, :deskripsi_pengalaman)";
        $stmt = $koneksi->prepare($sql);
        $stmt->bindParam(':id_cv', $id_cv);
        $stmt->bindParam(':tahun_mulai_pengalaman', $tahun_mulai_pengalaman);
        $stmt->bindParam(':tahun_selesai_pengalaman', $tahun_selesai_pengalaman);
        $stmt->bindParam(':tempat_pengalaman', $tempat_pengalaman);
        $stmt->bindParam(':deskripsi_pengalaman', $deskripsi_pengalaman);
        
        try {
            $stmt->execute();
            echo '<script>alert("Berhasil Tambah Data");window.location="tambah_organisasi.php"</script>';
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

?>