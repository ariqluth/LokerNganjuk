<?php
require_once "koneksi.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_cv = $_SESSION['id_cv'];

    // Loop through the submitted data
    foreach ($_POST['nama_skill'] as $key => $value) {
        $nama_skill = $_POST['nama_skill'][$key];
        

        // Insert data into the database
        $sql = "INSERT INTO tb_skill (id_cv,nama_skill) VALUES (:id_cv, :nama_skill)";
        $stmt = $koneksi->prepare($sql);
        $stmt->bindParam(':id_cv', $id_cv);
        $stmt->bindParam(':nama_skill', $nama_skill);
        
        try {
            $stmt->execute();
            echo '<script>alert("Berhasil Tambah Data");window.location="tambah_sosial.php"</script>';
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

?>