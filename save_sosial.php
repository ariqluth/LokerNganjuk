<?php
require_once "koneksi.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_cv = $_SESSION['id_cv'];

    // Loop through the submitted data
    foreach ($_POST['jenis_sosial_media'] as $key => $value) {
        $jenis_sosial_media = $_POST['jenis_sosial_media'][$key];
        $nama_sosial_media = $_POST['nama_sosial_media'][$key];

        // Insert data into the database
        $sql = "INSERT INTO tb_sosial_media (id_cv,jenis_sosial_media , nama_sosial_media) VALUES (:id_cv, :jenis_sosial_media, :nama_sosial_media)";
        $stmt = $koneksi->prepare($sql);
        $stmt->bindParam(':id_cv', $id_cv);
        $stmt->bindParam(':jenis_sosial_media', $jenis_sosial_media);
        $stmt->bindParam(':nama_sosial_media', $nama_sosial_media);
        
        try {
            $stmt->execute();
            echo '<script>alert("Berhasil Tambah Data");window.location=""</script>';
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

?>