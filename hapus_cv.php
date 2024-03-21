<?php
include "heder.php"; // Pastikan file ini terhubung dengan database
if (isset($_GET['id'])) {
    $id = $_GET['id'];

   
    $sqlDeleteRelated = "DELETE FROM tb_organisasi WHERE id_cv = :id";
    $stmtDeleteRelated = $koneksi->prepare($sqlDeleteRelated);
    $stmtDeleteRelated->bindParam(':id', $id, PDO::PARAM_INT);
    $stmtDeleteRelated->execute();

    $sqlDeleteRelated1 = "DELETE FROM tb_pelatihan WHERE id_cv = :id";
    $stmtDeleteRelated1 = $koneksi->prepare($sqlDeleteRelated1);
    $stmtDeleteRelated1->bindParam(':id', $id, PDO::PARAM_INT);
    $stmtDeleteRelated1->execute();

    $sqlDeleteRelated2 = "DELETE FROM tb_pendidikan WHERE id_cv = :id";
    $stmtDeleteRelated2 = $koneksi->prepare($sqlDeleteRelated2);
    $stmtDeleteRelated2->bindParam(':id', $id, PDO::PARAM_INT);
    $stmtDeleteRelated2->execute();

    $sqlDeleteRelated3 = "DELETE FROM tb_pengalaman WHERE id_cv = :id";
    $stmtDeleteRelated3 = $koneksi->prepare($sqlDeleteRelated3);
    $stmtDeleteRelated3->bindParam(':id', $id, PDO::PARAM_INT);
    $stmtDeleteRelated3->execute();

    $sqlDeleteRelated4 = "DELETE FROM tb_sertifikasi WHERE id_cv = :id";
    $stmtDeleteRelated4 = $koneksi->prepare($sqlDeleteRelated4);
    $stmtDeleteRelated4->bindParam(':id', $id, PDO::PARAM_INT);
    $stmtDeleteRelated4->execute();

    $sqlDeleteRelated5 = "DELETE FROM tb_skill WHERE id_cv = :id";
    $stmtDeleteRelated5 = $koneksi->prepare($sqlDeleteRelated5);
    $stmtDeleteRelated5->bindParam(':id', $id, PDO::PARAM_INT);
    $stmtDeleteRelated5->execute();

    $sqlDeleteRelated6 = "DELETE FROM tb_sosial_media WHERE id_cv = :id";
    $stmtDeleteRelated6 = $koneksi->prepare($sqlDeleteRelated6);
    $stmtDeleteRelated6->bindParam(':id', $id, PDO::PARAM_INT);
    $stmtDeleteRelated6->execute();

    

    $sqlDeleteCv = "DELETE FROM tb_cv WHERE id = :id";
    $stmtDeleteCv = $koneksi->prepare($sqlDeleteCv);
    $stmtDeleteCv->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmtDeleteCv->execute()) {
        $_SESSION['message'] = 'Data berhasil dihapus.';
    } else {
        $_SESSION['error'] = 'Data gagal dihapus.';
    }
    header('Location: data_cv.php');
    exit();
}

