<?php 
if (session_status() === PHP_SESSION_NONE) 
    session_start();
$menu = 'mahasiswa'; 

include_once('model/m_kategori_model.php');
include_once('model/t_jawaban_mahasiswa_model.php');
include_once('model/t_jawaban_dosen_model.php');
include_once('model/t_jawaban_tendik_model.php');
include_once('model/t_jawaban_ortu_model.php');
include_once('model/t_jawaban_alumni_model.php');
include_once('model/t_jawaban_industri_model.php');

$status = isset($_GET['status']) ? strtolower($_GET['status']) : null;
$message = isset($_GET['message']) ? strtolower($_GET['message']) : null;

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Jawaban Survey</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <?php include_once('layouts/admin/header.php'); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include_once('layouts/admin/sidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Jawaban Survey</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Responden Mahasiswa</a></li>
              <li class="breadcrumb-item active">Jawaban</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <?php 
      $show = isset($_GET['show']) ? $_GET['show'] : '';

      if ($show == 'mahasiswa') {
        $id = $_GET['id'];
        $mahasiswa = new t_jawaban_mahasiswa();
        $name = $mahasiswa->getNamebyId($id);
    ?>
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b><?php echo $name ? $name : 'Nama tidak ditemukan'?></b></h3>
        </div>
        <div class="card-body">
          <table class="table table-sm table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Mahasiswa Id</th>
                <th>Soal Id</th>
                <th>Jawaban</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $list = $mahasiswa->getDataById($id);
                $i = 1;
                while($row = $list->fetch_assoc()){
                  echo '<tr>
                      <td>'.$i.'</td>
                      <td>'.$row['responden_mahasiswa_id'].'</td>
                      <td>'.$row['soal_id'].'</td>
                      <td>'.$row['jawaban'].'</td>
                    </tr>';
                    $i++;
                }
              ?>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
    <?php } else if ($show == 'dosen') {
        $id = $_GET['id'];
        $dosen = new t_jawaban_dosen();
        $name = $dosen->getNamebyId($id);
    ?>
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b><?php echo $name?></b></h3>
        </div>
        <div class="card-body">
          <table class="table table-sm table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Dosen Id</th>
                <th>Soal Id</th>
                <th>Jawaban</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $list = $dosen->getDataById($id);
                $i = 1;
                while($row = $list->fetch_assoc()){
                  echo '<tr>
                      <td>'.$i.'</td>
                      <td>'.$row['responden_dosen_id'].'</td>
                      <td>'.$row['soal_id'].'</td>
                      <td>'.$row['jawaban'].'</td>
                    </tr>';
                    $i++;
                }
              ?>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
    <?php } else if ($show == 'tendik') {
        $id = $_GET['id'];
        $tendik = new t_jawaban_tendik();
        $name = $tendik->getNamebyId($id);
    ?>
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b><?php echo $name?></b></h3>
        </div>
        <div class="card-body">
          <table class="table table-sm table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Tendik Id</th>
                <th>Soal Id</th>
                <th>Jawaban</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $list = $tendik->getDataById($id);
                $i = 1;
                while($row = $list->fetch_assoc()){
                  echo '<tr>
                      <td>'.$i.'</td>
                      <td>'.$row['responden_tendik_id'].'</td>
                      <td>'.$row['soal_id'].'</td>
                      <td>'.$row['jawaban'].'</td>
                    </tr>';
                    $i++;
                }
              ?>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
    <?php } else if ($show == 'ortu') {
        $id = $_GET['id'];
        $ortu = new t_jawaban_ortu();
        $name = $ortu->getNamebyId($id);
    ?>
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b><?php echo $name?></b></h3>
        </div>
        <div class="card-body">
          <table class="table table-sm table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Orang Tua Id</th>
                <th>Soal Id</th>
                <th>Jawaban</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $list = $ortu->getDataById($id);
                $i = 1;
                while($row = $list->fetch_assoc()){
                  echo '<tr>
                      <td>'.$i.'</td>
                      <td>'.$row['responden_ortu_id'].'</td>
                      <td>'.$row['soal_id'].'</td>
                      <td>'.$row['jawaban'].'</td>
                    </tr>';
                    $i++;
                }
              ?>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
    <?php } else if ($show == 'alumni') {
        $id = $_GET['id'];
        $alumni = new t_jawaban_alumni();
        $name = $alumni->getNamebyId($id);
    ?>
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b><?php echo $name?></b></h3>
        </div>
        <div class="card-body">
          <table class="table table-sm table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Alumni Id</th>
                <th>Soal Id</th>
                <th>Jawaban</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $list = $alumni->getDataById($id);
                $i = 1;
                while($row = $list->fetch_assoc()){
                  echo '<tr>
                      <td>'.$i.'</td>
                      <td>'.$row['responden_alumni_id'].'</td>
                      <td>'.$row['soal_id'].'</td>
                      <td>'.$row['jawaban'].'</td>
                    </tr>';
                    $i++;
                }
              ?>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
    <?php } else if ($show == 'industri') {
        $id = $_GET['id'];
        $industri = new t_jawaban_industri();
        $name = $industri->getNamebyId($id);
    ?>
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b><?php echo $name?></b></h3>
        </div>
        <div class="card-body">
          <table class="table table-sm table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Industri Id</th>
                <th>Soal Id</th>
                <th>Jawaban</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $list = $industri->getDataById($id);
                $i = 1;
                while($row = $list->fetch_assoc()){
                  echo '<tr>
                      <td>'.$i.'</td>
                      <td>'.$row['responden_industri_id'].'</td>
                      <td>'.$row['soal_id'].'</td>
                      <td>'.$row['jawaban'].'</td>
                    </tr>';
                    $i++;
                }
              ?>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
    <?php }?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include_once('layouts/admin/footer.php'); ?>
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>

</body>
</html>
