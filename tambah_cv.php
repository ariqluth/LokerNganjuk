<?php

// // Di akhir proses, setelah submit data terakhir



$currentStep = isset($_GET['step']) ? $_GET['step'] : 'data-diri';

$steps = [
    'data-diri' => 'Data diri',
    'tambah_pendidikan' => 'Pendidikan',
    'tambah_pengalaman' => 'Pengalaman',
    'tambah_organisasi' => 'Organisasi',
    'tambah_pelatihan' => 'Pelatihan',
    'tambah_sertifikasi' => 'Sertifikasi',
    'tambah_skill' => 'Skill',
    'tambah_sosial' => 'Sosial Media',
];

function isActive($stepKey, $currentStep) {
  return $stepKey === $currentStep ? 'active' : '';
}

function getNextStepKey($currentStepKey, $steps) {
  $keys = array_keys($steps);
  $currentKeyIndex = array_search($currentStepKey, $keys);
  if ($currentKeyIndex !== false && isset($keys[$currentKeyIndex + 1])) {
    return $keys[$currentKeyIndex + 1];
  }
  return null; 
}

function getPreviousStepKey($currentStepKey, $steps) {
  $keys = array_keys($steps);
  $currentKeyIndex = array_search($currentStepKey, $keys);
  if ($currentKeyIndex !== false && $currentKeyIndex > 0) {
    return $keys[$currentKeyIndex - 1];
  }
  return null; 
}

$nextStep = getNextStepKey($currentStep, $steps);
$previousStep = getPreviousStepKey($currentStep, $steps);


include "heder.php";



if (isset($_POST['btambah'])) {
  header("Location: index.php");

  if (isset($_SESSION['cvId'])) {
    unset($_SESSION['cvId']);
  }
  exit;
}

?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Tambah Data CV</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb">
                        <?php foreach ($steps as $key => $step) : ?>
                            <li class="breadcrumb-item  <?= isActive($key, $currentStep) ?>"><?= $step ?></li>
                        <?php endforeach; ?>
                    </ol>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><?= $steps[$currentStep] ?></h3>
                        </div>

                        <!-- <form method="POST" action="submit.php"> -->

                <?php include "{$currentStep}.php"; ?>
                <div class="card-footer">
                <?php if ($currentStep !== 'data-diri') : ?> 
                 

                  <?php if ($nextStep !== null) : ?>
                    <a href="?step=<?= $nextStep ?>" class="btn btn-primary">Next Step</a>
                  <?php else : ?>
                  <a href="data_cv.php" type="submit" name="btambah" class="btn btn-success text-white">Submit</a>
                  <?php endif; ?>
                 <?php endif; ?>
    
    </div>
                
              <!-- </form> -->

            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


<?php include "footer.php"; ?>