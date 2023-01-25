<?php
include '../koneksi.php';

$tipe = $_POST['tipe'];
$gambar = $_FILES['gambar']['name'];

if ($gambar !="") {
  $extensi_diperbolehkan = array('png','jpg','jpeg');
  $x = explode('.', $gambar);
  $extensi = strtolower(end($x));
  $file_tmp = $_FILES['gambar']['tmp_name'];
  $angka_acak = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$gambar;
  if(in_array($extensi, $extensi_diperbolehkan) === true) {
    move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru);
    $query = "INSERT INTO kamar (tipe, gambar) VALUES ('$tipe','$nama_gambar_baru')";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Query gagal dijalankan : ".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
    }else{
        echo "<script>alert('data berhasil ditambahkan.');window.location='kamar.php';</script>";
    }
  }else{
    echo "<script>alert('ekstensi gambar tidak sesuai.');window.location='kamar.php';</script>";
  }
}else{
  $query = "INSERT INTO kamar (tipe, gambar) VALUES ('$tipe',null)";
  $result = mysqli_query($koneksi, $query);

  if (!$result) {
    die("Query gagal dijalankan : ".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
  }else{
    echo "<script>alert('Data berhasil ditambah.');window.location='kamar.php';</script>";
  }
}
?>