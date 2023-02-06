<?php
include 'koneksi.php'
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
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-dark navbar-black">
    <div class="container">
      <a href="login.php" target="_blank" class="navbar-brand">
        <img src="assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Hotel Hebat</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="index.php" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="kamar.php" class="nav-link">Kamar</a>
          </li>
          <li class="nav-item">
            <a href="fasilitas.php" class="nav-link">Fasilitas</a>
          </li>
          <li class="nav-item">
            <a href="login.php" class="nav-link">Login</a>
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
            <h1 class="m-0">Kamar<small> Hotel Hebat</small></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <?php
          $query = "SELECT * FROM kamar ORDER BY id_kamar ASC";
          $result = mysqli_query($koneksi, $query);
          if (!$result) {
            die("Query Error: ".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
          }

          $no = 1;

          while ($row = mysqli_fetch_assoc($result)) {
        ?>

        <div class="col-md-12">
          <div class="card card-outline card-dark">
            <div class="card-body">
              <div class="row">
                <div class="col-md-4">
                  <div class="card-body">
                    <table>
                      <tr>
                        <td><b>Tipe : </b><?php echo $row['tipe']; ?></td>
                      </tr>
                      <tr>
                        <td>
                          <b>Fasilitas : </b>
                          <?php
                          $fasilitas_kamar = mysqli_query($koneksi, "select * from fasilitas_kamar");
                          while($a = mysqli_fetch_array($fasilitas_kamar)) {
                            if($a['id_kamar'] == $row['id_kamar']) { ?>
                            <?php echo $a['fasilitas']; ?>
                            <?php
                            }
                          }
                          ?>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <img class="d-block w-100" src="admin/gambar/<?php echo $row['gambar']; ?>" height="300">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php $no++; } ?>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <div class="container">
      <div class="col-md-12">
        <div class="row">

          <div class="col-md-8 text-dark">
            <h3><b>Hubungi Kami</b></h3><br>
            <p>
              Jl. Veteran, Bugul Lor, Kec. Panggungrejo, Kota Pasuruan, Jawa Timur 67122<br>
              Telp : (0343) 421380<br>
              www.hotel-hebat.com<br>
              Email: info@hotel-hebat.com
            </p>
          </div>

            <div class="col-md-4 text-dark">
              <h3 class="mb-4"><b>Stay Social</b></h3>
              <div class="flex items-center">

                <!-- instagram -->
                <a href="#" class="w-9 h-9 mr-3">
                <svg role="img" width="38" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Instagram</title><path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/></svg>
                </a>

                <!-- youtube -->
                <a href="#" class="w-9 h-9 mr-3">
                <svg role="img" width="48" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>YouTube</title><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                </a>

                <!-- gmail -->
                <a href="#" class="w-9 h-9 mr-3">
                <svg role="img" width="40" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Gmail</title><path d="M24 5.457v13.909c0 .904-.732 1.636-1.636 1.636h-3.819V11.73L12 16.64l-6.545-4.91v9.273H1.636A1.636 1.636 0 0 1 0 19.366V5.457c0-2.023 2.309-3.178 3.927-1.964L5.455 4.64 12 9.548l6.545-4.91 1.528-1.145C21.69 2.28 24 3.434 24 5.457z"/></svg>
                </a>
                
              </div>
            </div>
        </div>
      </div>

      <hr class="my-0 bg-secondary mb-2">

      <div class="text-center">
        <!-- Default to the left -->
        <strong>Made with ❤ by <a href="https://aryasenaa.github.io/portofolio-tailwindcss/">Arya Sena🤙</a> using <a href="https://adminlte.io">AdminLTE.io</a></strong>
      </div>
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
</body>
</html>
