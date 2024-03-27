<?php
require_once "koneksi.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_cv = $_SESSION['id_cv'];

    // Loop through the submitted data
    foreach ($_POST['pendidikan_nama'] as $key => $value) {
        $pendidikan_nama = $_POST['pendidikan_nama'][$key];
        $pendidikan_jurusan = $_POST['pendidikan_jurusan'][$key];
        $tahun_lulus = $_POST['tahun_lulus'][$key];

        // Insert data into the database
        $sql = "INSERT INTO tb_pendidikan (id_cv, pendidikan_nama, pendidikan_jurusan, tahun_lulus) VALUES (:id_cv, :pendidikan_nama, :pendidikan_jurusan, :tahun_lulus)";
        $stmt = $koneksi->prepare($sql);
        $stmt->bindParam(':id_cv', $id_cv);
        $stmt->bindParam(':pendidikan_nama', $pendidikan_nama);
        $stmt->bindParam(':pendidikan_jurusan', $pendidikan_jurusan);
        $stmt->bindParam(':tahun_lulus', $tahun_lulus);
        
        try {
            $stmt->execute();
            echo '<script>alert("Berhasil Tambah Data");window.location="tambah_pengalaman.php"</script>';
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

?>