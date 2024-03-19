<?php
session_start();

// Tentukan langkah berdasarkan input pengguna atau default ke langkah 1
$currentStep = isset($_POST['step']) ? (int)$_POST['step'] : 1;

// Tentukan aksi berikutnya berdasarkan langkah saat ini
if (isset($_POST['next'])) {
    $currentStep++;
} elseif (isset($_POST['back'])) {
    $currentStep--;
}

// Simpan data ke session
if (!empty($_POST)) {
    $_SESSION['wizardData'][$currentStep] = $_POST;
}

// Cek jika ini submission akhir dan simpan ke database atau tempat lain
if ($currentStep > 3) {
    // Tempat untuk logika penyimpanan data
    // Misal: saveDataToDatabase($_SESSION['wizardData']);
    echo '<p>Data berhasil disimpan!</p>';
    session_destroy(); // Bersihkan session setelah selesai
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Form Wizard</title>
</head>

<body>

    <form action="wizard.php" method="post">
        <input type="hidden" name="step" value="<?= $currentStep; ?>">

        <?php if ($currentStep == 1) : ?>
            <h2>Step 1: Personal Information</h2>
            Nama: <input type="text" name="cv_nama" value="<?= $_SESSION['wizardData'][1]['cv_nama'] ?? ''; ?>"><br>
            Tempat Lahir: <input type="text" name="cv_tempat_lahir" value="<?= $_SESSION['wizardData'][1]['cv_tempat_lahir'] ?? ''; ?>"><br>
        <?php elseif ($currentStep == 2) : ?>
            <h2>Step 2: Education</h2>
            Nama Pendidikan: <input type="text" name="nama_pendidikan" value="<?= $_SESSION['wizardData'][2]['nama_pendidikan'] ?? ''; ?>"><br>
            Jurusan: <input type="text" name="jurusan_pendidikan" value="<?= $_SESSION['wizardData'][2]['jurusan_pendidikan'] ?? ''; ?>"><br>
        <?php elseif ($currentStep == 3) : ?>
            <h2>Step 3: Skills</h2>
            Skill: <input type="text" name="nama_skill" value="<?= $_SESSION['wizardData'][3]['nama_skill'] ?? ''; ?>"><br>
        <?php endif; ?>

        <?php if ($currentStep > 1) : ?>
            <input type="submit" name="back" value="Back">
        <?php endif; ?>
        <input type="submit" name="next" value="<?= $currentStep == 3 ? 'Submit' : 'Next'; ?>">
    </form>

</body>

</html>