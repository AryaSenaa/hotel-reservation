<?php
include '../koneksi.php';

if (isset($_GET['id_galeri'])) {
  $id_galeri = ($_GET['id_galeri']);
  $query = "SELECT * FROM galeri WHERE id_galeri='$id_galeri'";
  $result = mysqli_query($koneksi, $query);
  if (!$result) {
    die('Query Error: '.mysqli_errno($koneksi)."-".mysqli_error($koneksi));
  }
  $data = mysqli_fetch_assoc($result);
  if(!count($data)) {
    echo"<script>alert('Data tidak ditemukan di database');window.location='galeri.php';</script>";
  }
}else{
  echo "<script>alert('Masukan Data');window.location='galeri.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hotel Hebat</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-dark navbar-black">
    <div class="container">
      <a href="index.php" class="navbar-brand">
        <img src="../assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Hotel Hebat</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="index.php" class="nav-link">Dashboard</a>
          </li>
          <li class="nav-item">
            <a href="kamar.php" class="nav-link">Kamar</a>
          </li>
          <li class="nav-item">
            <a href="fasilitas.php" class="nav-link">Fasilitas Kamar</a>
          </li>
          <li class="nav-item">
            <a href="galeri.php" class="nav-link">Galeri</a>
          </li>
          <li class="nav-item">
            <a href="users.php" class="nav-link">Users</a>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Galeri</small></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="col-md-12">
          <div class="card card-outline card-dark">
            <div class="card-header">
              <h2>Edit Data Galeri</h2>
            </div>
            <div class="card-body">
              <form method="post" action="update_galeri.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Keterangan</label>
                    <input name="id_galeri" value="<?php echo $data['id_galeri']; ?>" hidden>
                    <input type="text" class="form-control" name="keterangan" value="<?php echo $data['keterangan']; ?>" placeholder="Keterangan">
                  </div>
                  <div class="form-group">
                    <label>Gambar</label>
                    <img class="d-block" src="gambar/<?php echo $data['gambar']; ?>" width="300"><br>
                    <input type="file" class="form-control" name="gambar" placeholder="pilih file">
                  </div>
                  <button type="submit" class="btn btn-dark">Update</button>
              </form>
            </div>
          </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  

  <!-- Main Footer -->
  <footer class="main-footer text-center">
    <!-- Default to the left -->
    <strong>Made with ??? by <a href="https://aryasenaa.github.io/portofolio-tailwindcss/">Arya Sena????</a> using <a href="https://adminlte.io">AdminLTE.io</a></strong>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
</body>
</html>
