<?php
include "heder.php"; // Pastikan file ini terhubung dengan database
if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $sqlDeleteRelated = "DELETE FROM tb_organisasi WHERE id_cv = :id";
    $stmtDeleteRelated = $koneksi->prepare($sqlDeleteRelated);
    $stmtDeleteRelated->bindParam(':id', $id, PDO::PARAM_INT);
    $stmtDeleteRelated->execute();


    $sqlDeleteRelated1 = "SELECT * FROM tb_pelatihan WHERE id = id";
    $stmtDeleteRelated1 = $koneksi->prepare($sqlDeleteRelated1);
    $stmtDeleteRelated1->execute();

    if ($data = $stmtDeleteRelated1->fetch()) { 
        $value = $data['dokumen_pelatihan'];
        if ($value) {
            $path = $value;
            var_dump($path);
            if (file_exists($path)) {
                unlink($path);
                echo "File deleted successfully: $path";
            } else {
                echo "File not found: $path"; 
            }
        } else {
            echo "No record found with ID: $id"; 
        }
    } else {
        echo "No record found pelatihan ID : $id";
    }
    $sqlDeleteRelated1 = "DELETE FROM tb_pelatihan WHERE id_cv = :id";
    $stmtDeleteRelated1 = $koneksi->prepare($sqlDeleteRelated1);
    $stmtDeleteRelated1->bindParam(':id', $id, PDO::PARAM_INT);
    $stmtDeleteRelated1->execute();


    $sqlDeleteRelated2 = "SELECT * FROM tb_pendidikan WHERE id = id";
    $stmtDeleteRelated2 = $koneksi->prepare($sqlDeleteRelated2);
    $stmtDeleteRelated2->execute();

    if ($data = $stmtDeleteRelated2->fetch()) { 
        $value = $data['dokumen_pendidikan'];
        if ($value) {
            $path = $value;
            var_dump($path);
            if (file_exists($path)) {
                unlink($path);
                echo "File deleted successfully: $path";
            } else {
                echo "File not found: $path"; 
            }
        } else {
            echo "No record found with ID: $id"; 
        }
    } else {
        echo "No record found with ID : $id";
    }



    $sqlDeleteRelated2 = "DELETE FROM tb_pendidikan WHERE id_cv = :id";
    $stmtDeleteRelated2 = $koneksi->prepare($sqlDeleteRelated2);
    $stmtDeleteRelated2->bindParam(':id', $id, PDO::PARAM_INT);
    $stmtDeleteRelated2->execute();

    $sqlDeleteRelated3 = "DELETE FROM tb_pengalaman WHERE id_cv = :id";
    $stmtDeleteRelated3 = $koneksi->prepare($sqlDeleteRelated3);
    $stmtDeleteRelated3->bindParam(':id', $id, PDO::PARAM_INT);
    $stmtDeleteRelated3->execute();

    $sqlDeleteRelated4 = "SELECT * FROM tb_sertifikasi WHERE id = id";
    $stmtDeleteRelated4 = $koneksi->prepare($sqlDeleteRelated4);
    $stmtDeleteRelated4->execute();

    if ($data = $stmtDeleteRelated4->fetch()) { 
        $value = $data['dokumen_sertifikasi'];
        if ($value) {
            $path = $value;
            var_dump($path);
            if (file_exists($path)) {
                unlink($path);
                echo "File deleted successfully: $path";
            } else {
                echo "File not found: $path"; 
            }
        } else {
            echo "No record found with ID: $id"; 
        }
    } else {
        echo "No record found sertifikasi ID : $id";
    }

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


    $sqlDeleteCv = "SELECT * FROM tb_cv WHERE id = :id";
    $stmtDeleteCv = $koneksi->prepare($sqlDeleteCv);
    $stmtDeleteCv->bindParam(':id', $id, PDO::PARAM_INT);
    $stmtDeleteCv->execute();

    if ($data = $stmtDeleteCv->fetch()) { 
        $value = $data['cv_foto'];
        if ($value) {
            $path = $value;
            var_dump($path);
            if (file_exists($path)) {
                unlink($path);
                echo "File deleted successfully: $path";
            } else {
                echo "File not found: $path"; 
            }
        } else {
            echo "No record found with ID: $id"; 
        }
    } else {
        echo "No record found cv foto ID : $id";
    }
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
